<?php

namespace App\Controllers\Attendance;

use App\Controllers\BaseController;
use App\Models\AttendanceModel;

class AttendanceController extends BaseController
{
    private AttendanceModel $attendance;

    public function __construct()
    {
        $this->attendance = new AttendanceModel();
    }

    public function index()
    {
        [$from, $to] = $this->dateRange();
        $status = (string) $this->request->getGet('status');
        $perPage = max(5, min(50, (int) ($this->request->getGet('per_page') ?: 10)));
        $companyId = (int) session('company_id');
        $userId = (int) session('user_id');

        $query = new AttendanceModel();
        $query->where('company_id', $companyId)->where('user_id', $userId)
            ->where('attendance_date >=', $from)->where('attendance_date <=', $to);
        if (in_array($status, ['Present', 'Late'], true)) $query->where('status', $status);

        $summaryRows = (new AttendanceModel())->where('company_id', $companyId)->where('user_id', $userId)
            ->where('attendance_date >=', date('Y-m-01'))->where('attendance_date <=', date('Y-m-t'))->findAll();
        $today = $this->attendance->forUserDate($companyId, $userId, date('Y-m-d'));

        return view('employee_attendance', [
            'records' => $query->orderBy('attendance_date', 'DESC')->paginate($perPage),
            'pager' => $query->pager,
            'today' => $today,
            'summary' => $this->summary($summaryRows),
            'from' => $from, 'to' => $to, 'statusFilter' => $status, 'perPage' => $perPage,
        ]);
    }

    public function punch()
    {
        $companyId = (int) session('company_id');
        $userId = (int) session('user_id');
        $now = date('Y-m-d H:i:s');
        $today = $this->attendance->forUserDate($companyId, $userId, date('Y-m-d'));

        if (!$today) {
            $lateAfter = strtotime(date('Y-m-d') . ' 09:15:00');
            $this->attendance->insert([
                'company_id' => $companyId, 'user_id' => $userId, 'attendance_date' => date('Y-m-d'),
                'check_in' => $now, 'status' => time() > $lateAfter ? 'Late' : 'Present',
            ]);
            return redirect()->back()->with('success', 'You have punched in successfully.');
        }
        if (!empty($today['check_out'])) return redirect()->back()->with('error', 'Today’s attendance is already closed.');
        if (!empty($today['break_started_at'])) return redirect()->back()->with('error', 'End your active break before punching out.');

        $this->attendance->update($today['id'], ['check_out' => $now]);
        return redirect()->back()->with('success', 'You have punched out successfully.');
    }

    public function toggleBreak()
    {
        $today = $this->attendance->forUserDate((int) session('company_id'), (int) session('user_id'), date('Y-m-d'));
        if (!$today || !empty($today['check_out'])) return redirect()->back()->with('error', 'An open attendance shift is required.');

        if (empty($today['break_started_at'])) {
            $this->attendance->update($today['id'], ['break_started_at' => date('Y-m-d H:i:s')]);
            return redirect()->back()->with('success', 'Break started.');
        }

        $elapsed = max(0, (int) floor((time() - strtotime($today['break_started_at'])) / 60));
        $this->attendance->update($today['id'], [
            'break_minutes' => (int) $today['break_minutes'] + $elapsed,
            'break_started_at' => null,
        ]);
        return redirect()->back()->with('success', 'Break ended.');
    }

    public function export()
    {
        [$from, $to] = $this->dateRange();
        $rows = (new AttendanceModel())->where('company_id', (int) session('company_id'))
            ->where('user_id', (int) session('user_id'))->where('attendance_date >=', $from)
            ->where('attendance_date <=', $to)->orderBy('attendance_date', 'DESC')->findAll();
        $stream = fopen('php://temp', 'w+');
        fputcsv($stream, ['Date', 'Status', 'Check In', 'Check Out', 'Break Minutes', 'Worked Hours', 'Overtime Hours']);
        foreach ($rows as $row) {
            $minutes = $this->workedMinutes($row);
            fputcsv($stream, [$row['attendance_date'], $row['status'], $row['check_in'], $row['check_out'], $row['break_minutes'], round($minutes / 60, 2), round(max(0, $minutes - 480) / 60, 2)]);
        }
        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);
        return $this->response->setHeader('Content-Type', 'text/csv; charset=UTF-8')
            ->setHeader('Content-Disposition', 'attachment; filename="attendance-' . $from . '-to-' . $to . '.csv"')->setBody($csv);
    }

    private function dateRange(): array
    {
        $from = (string) $this->request->getGet('from');
        $to = (string) $this->request->getGet('to');
        if (!$this->validDate($from)) $from = date('Y-m-d', strtotime('-29 days'));
        if (!$this->validDate($to)) $to = date('Y-m-d');
        if ($from > $to) [$from, $to] = [$to, $from];
        return [$from, $to];
    }

    private function validDate(string $date): bool
    {
        $parsed = \DateTimeImmutable::createFromFormat('!Y-m-d', $date);
        return $parsed !== false && $parsed->format('Y-m-d') === $date;
    }

    private function workedMinutes(array $row): int
    {
        if (empty($row['check_in'])) return 0;
        $end = !empty($row['check_out']) ? strtotime($row['check_out']) : time();
        $activeBreak = !empty($row['break_started_at']) ? max(0, (int) floor(($end - strtotime($row['break_started_at'])) / 60)) : 0;
        return max(0, (int) floor(($end - strtotime($row['check_in'])) / 60) - (int) $row['break_minutes'] - $activeBreak);
    }

    private function summary(array $rows): array
    {
        $minutes = 0; $overtime = 0; $present = 0; $late = 0;
        foreach ($rows as $row) {
            $worked = $this->workedMinutes($row); $minutes += $worked;
            $overtime += max(0, $worked - 480); $present++; if ($row['status'] === 'Late') $late++;
        }
        return ['minutes' => $minutes, 'overtime' => $overtime, 'present' => $present, 'late' => $late];
    }
}
