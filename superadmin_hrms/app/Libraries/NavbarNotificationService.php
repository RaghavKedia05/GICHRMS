<?php

namespace App\Libraries;

use App\Models\Recruitment\RequisitionModel;
use CodeIgniter\Database\BaseConnection;
use Config\Database;

class NavbarNotificationService
{
    private BaseConnection $db;

    private RequisitionModel $requisitionModel;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->requisitionModel = new RequisitionModel();
    }

    public function forUser(int $userId, string $role): array
    {
        if (!$userId) {
            return [
                'count' => 0,
                'items' => [],
            ];
        }

        $items = array_merge(
            $this->chatNotifications($userId),
            $this->approvalNotifications($role)
        );

        usort($items, static function (array $first, array $second): int {
            return strcmp($second['date'] ?? '', $first['date'] ?? '');
        });

        return [
            'count' => array_sum(array_column($items, 'count')),
            'items' => array_slice($items, 0, 8),
        ];
    }

    private function chatNotifications(int $userId): array
    {
        $rows = $this->db->table('chat_messages cm')
            ->select('cm.sender_id, COUNT(*) AS unread_count, MAX(cm.created_at) AS latest_message_at, users.name AS sender_name')
            ->join('users', 'users.id = cm.sender_id', 'left')
            ->where('cm.receiver_id', $userId)
            ->where('cm.is_read', 0)
            ->groupBy(['cm.sender_id', 'users.name'])
            ->orderBy('latest_message_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        $items = [];

        foreach ($rows as $row) {
            $count = (int) ($row['unread_count'] ?? 0);
            $senderName = $row['sender_name'] ?: 'Team member';

            $items[] = [
                'type' => 'chat',
                'icon' => 'message-circle',
                'title' => $senderName,
                'message' => $count === 1 ? 'sent you a new message' : 'sent you ' . $count . ' new messages',
                'url' => 'chat/' . (int) $row['sender_id'],
                'date' => $row['latest_message_at'] ?? '',
                'count' => $count,
                'tone' => 'bg-indigo-50 text-indigo-600',
            ];
        }

        return $items;
    }

    private function approvalNotifications(string $role): array
    {
        $query = $this->requisitionModel
            ->select('id, requisition_no, job_title, department, status, hod_status, hr_status, submitted_at, updated_at')
            ->orderBy('COALESCE(submitted_at, updated_at)', 'DESC', false)
            ->limit(5);

        if ($role === 'department_head') {
            $query->where('status', 'Pending Approval')
                ->where('hod_status', 'Pending');
        } elseif ($role === 'hr') {
            $query->where('hod_status', 'Approved')
                ->where('hr_status', 'Pending');
        } elseif ($role === 'admin') {
            $query->groupStart()
                    ->where('status', 'Pending Approval')
                    ->where('hod_status', 'Pending')
                ->groupEnd()
                ->orGroupStart()
                    ->where('hod_status', 'Approved')
                    ->where('hr_status', 'Pending')
                ->groupEnd();
        } else {
            return [];
        }

        $rows = $query->findAll();
        $items = [];

        foreach ($rows as $row) {
            $isHrApproval = ($row['hod_status'] ?? '') === 'Approved' && ($row['hr_status'] ?? '') === 'Pending';
            $stage = $isHrApproval ? 'HR publishing approval pending' : 'HOD approval pending';

            $items[] = [
                'type' => 'approval',
                'icon' => $isHrApproval ? 'send' : 'clipboard-check',
                'title' => $row['job_title'] ?: ($row['requisition_no'] ?? 'Job requisition'),
                'message' => $stage . (($row['department'] ?? '') ? ' for ' . $row['department'] : ''),
                'url' => 'Recruitment/requisitions',
                'date' => $row['submitted_at'] ?: ($row['updated_at'] ?? ''),
                'count' => 1,
                'tone' => $isHrApproval ? 'bg-orange-50 text-orange-600' : 'bg-emerald-50 text-emerald-600',
            ];
        }

        return $items;
    }
}
