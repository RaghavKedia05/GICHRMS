<?php

namespace App\Controllers;

use App\Models\UserModel;

class PerformanceReviewController extends BaseController
{
    public function performance_review()
    {
        if (!$this->canManageReviews()) return $this->accessDenied();
        $companyId = (int) session('company_id');
        $db = db_connect();
        return view('performance_review', [
            'employees' => (new UserModel())->select('users.*, departments.department_name')->join('departments', 'departments.id = users.department_id', 'left')->where('users.company_id', $companyId)->where('users.is_active', 1)->orderBy('users.name')->findAll(),
            'reviewCount' => $db->table('performance_reviews')->where('company_id', $companyId)->countAllResults(),
            'recentReviews' => $db->table('performance_reviews')->where('company_id', $companyId)->orderBy('created_at', 'DESC')->limit(5)->get()->getResultArray(),
        ]);
    }

    public function save()
    {
        if (!$this->canManageReviews()) return $this->accessDenied();
        try {

            $db = \Config\Database::connect();
            $employeeId = (int) $this->request->getPost('employee_user_id');
            $employee = (new UserModel())->where('company_id', (int) session('company_id'))->where('is_active', 1)->find($employeeId);
            if (!$employee) return redirect()->back()->withInput()->with('error', 'Select a valid employee from your company.');
            $department = !empty($employee['department_id']) ? $db->table('departments')->select('department_name')->where('id', $employee['department_id'])->get()->getRowArray() : null;
            $db->transStart();

            /*
            |--------------------------------------------------------------------------
            | Save Employee Basic Information
            |--------------------------------------------------------------------------
            */

            $reviewData = [
                'company_id' => (int) session('company_id'),
                'employee_user_id' => $employeeId,
                'reviewed_by' => (int) session('user_id'),
                'status' => 'Completed',
                'emp_id' => $employee['employee_id'],
                'name' => $employee['name'],
                'department' => $department['department_name'] ?? '',
                'designation' => $employee['position'],
                'qualification' => $this->request->getPost('qualification'),
                'date_of_join' => $employee['date_of_joining'],
                'date_of_confirmation' => $this->request->getPost('date_of_confirmation'),
                'previous_experience' => $this->request->getPost('previous_experience'),
                'ro_name' => $this->request->getPost('ro_name'),
                'ro_designation' => $this->request->getPost('ro_designation'),
            ];

            $db->table('performance_reviews')->insert($reviewData);

            $reviewId = $db->insertID();

            /*
            |--------------------------------------------------------------------------
            | Get Professional Excellence Arrays
            |--------------------------------------------------------------------------
            */

            $weightages = $this->request->getPost('weightage') ?? [];
            $selfPercentages = $this->request->getPost('self_percentage') ?? [];
            $selfPoints = $this->request->getPost('self_points') ?? [];
            $roPercentages = $this->request->getPost('ro_percentage') ?? [];
            $roPoints = $this->request->getPost('ro_points') ?? [];

            /*
            |--------------------------------------------------------------------------
            | Fixed KRA and KPI Values
            |--------------------------------------------------------------------------
            */

            $kras = [
                'Production',
                'Production',
                'Process Improvement',
                'Team Management',
                'Knowledge Sharing',
                'Reporting and Communication'
            ];

            $kpis = [
                'Quality',
                'TAT (turn around time)',
                'PMS, New Ideas',
                'Team Productivity,dynamics,attendance,attrition',
                'Sharing the knowledge for team productivity',
                'Emails/Calls/Reports and Other Communication'
            ];

            /*
            |--------------------------------------------------------------------------
            | Save Professional Excellence
            |--------------------------------------------------------------------------
            */

            for ($i = 0; $i < count($kras); $i++) {

                $professionalData = [
                    'review_id' => $reviewId,
                    'kra' => $kras[$i],
                    'kpi' => $kpis[$i],
                    'weightage' => $weightages[$i] ?? 0,
                    'self_percentage' => $selfPercentages[$i] ?? 0,
                    'self_points' => $selfPoints[$i] ?? 0,
                    'ro_percentage' => $roPercentages[$i] ?? 0,
                    'ro_points' => $roPoints[$i] ?? 0,
                ];

                $db->table('professional_excellence')
                    ->insert($professionalData);
            }

            /*
            |--------------------------------------------------------------------------
            | Personal Excellence
            |--------------------------------------------------------------------------
            */

            $peWeightages = $this->request->getPost('pe_weightage') ?? [];
            $peSelfPercentages = $this->request->getPost('pe_self_percentage') ?? [];
            $peSelfPoints = $this->request->getPost('pe_self_points') ?? [];
            $peRoPercentages = $this->request->getPost('pe_ro_percentage') ?? [];
            $peRoPoints = $this->request->getPost('pe_ro_points') ?? [];

            $attributes = [
                'Attendance',
                'Attendance',
                'Attitude & Behavior',
                'Attitude & Behavior',
                'Policy & Procedures',
                'Initiatives',
                'Continuous Skill Improvement'
            ];

            $indicators = [
                'Planned or Unplanned Leaves',
                'Time Consciousness',
                'Team Collaboration',
                'Professionalism & Responsiveness',
                'Adherence to policies and procedures',
                'Special Efforts, Suggestions,Ideas,etc.',
                'Preparedness to move to next level & Training utilization'
            ];

            for ($i = 0; $i < count($attributes); $i++) {

                $db->table('personal_excellence')->insert([

                    'review_id' => $reviewId,

                    'attribute_name' => $attributes[$i],
                    'indicator' => $indicators[$i],

                    'weightage' => $peWeightages[$i] ?? 0,

                    'self_percentage' => $peSelfPercentages[$i] ?? 0,
                    'self_points' => $peSelfPoints[$i] ?? 0,

                    'ro_percentage' => $peRoPercentages[$i] ?? 0,
                    'ro_points' => $peRoPoints[$i] ?? 0,
                ]);
            }

            $specialSelf = $this->request->getPost('special_self') ?? [];
            $specialRo = $this->request->getPost('special_ro') ?? [];
            $specialHod = $this->request->getPost('special_hod') ?? [];


            for ($i = 0; $i < count($specialSelf); $i++) {

                if (
                    empty(trim($specialSelf[$i] ?? '')) &&
                    empty(trim($specialRo[$i] ?? '')) &&
                    empty(trim($specialHod[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('special_initiatives')->insert([
                    'review_id' => $reviewId,
                    'self_text' => $specialSelf[$i],
                    'ro_comment' => $specialRo[$i],
                    'hod_comment' => $specialHod[$i],
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Comments On Role
            |--------------------------------------------------------------------------
            */

            $roleStrengths = $this->request->getPost('role_strength') ?? [];
            $roleImprovements = $this->request->getPost('role_improvement') ?? [];


            for ($i = 0; $i < count($roleStrengths); $i++) {

                if (
                    empty(trim($roleStrengths[$i] ?? '')) &&
                    empty(trim($roleImprovements[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('comments_on_role')->insert([
                    'review_id' => $reviewId,
                    'strength' => $roleStrengths[$i] ?? '',
                    'improvement' => $roleImprovements[$i] ?? ''
                ]);
            }

            $roStrengths = $this->request->getPost('ro_strength') ?? [];
            $roImprovements = $this->request->getPost('ro_improvement') ?? [];

            for ($i = 0; $i < count($roStrengths); $i++) {

                if (
                    empty(trim($roStrengths[$i] ?? '')) &&
                    empty(trim($roImprovements[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('ro_strengths')->insert([
                    'review_id' => $reviewId,
                    'strength' => $roStrengths[$i] ?? '',
                    'improvement' => $roImprovements[$i] ?? ''
                ]);
            }

            $hodStrengths = $this->request->getPost('hod_strength') ?? [];
            $hodImprovements = $this->request->getPost('hod_improvement') ?? [];



            for ($i = 0; $i < count($hodStrengths); $i++) {

                if (
                    empty(trim($hodStrengths[$i] ?? '')) &&
                    empty(trim($hodImprovements[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('hod_strengths')->insert([
                    'review_id' => $reviewId,
                    'strength' => $hodStrengths[$i] ?? '',
                    'improvement' => $hodImprovements[$i] ?? ''
                ]);
            }
            /*
            |--------------------------------------------------------------------------
            | Personal Goals
            |--------------------------------------------------------------------------
            */

            $lastYearGoals = $this->request->getPost('last_year_goal') ?? [];
            $currentYearGoals = $this->request->getPost('current_year_goal') ?? [];


            for ($i = 0; $i < count($lastYearGoals); $i++) {

                if (
                    empty(trim($lastYearGoals[$i] ?? '')) &&
                    empty(trim($currentYearGoals[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('personal_goals')->insert([
                    'review_id' => $reviewId,
                    'last_year_goal' => $lastYearGoals[$i] ?? '',
                    'current_year_goal' => $currentYearGoals[$i] ?? ''
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Personal Updates
            |--------------------------------------------------------------------------
            */

            $lastYearAnswers = $this->request->getPost('last_year_answer') ?? [];
            $lastYearDetails = $this->request->getPost('last_year_details') ?? [];

            $currentYearAnswers = $this->request->getPost('current_year_answer') ?? [];
            $currentYearDetails = $this->request->getPost('current_year_details') ?? [];

            $lastYearQuestions = [
                'Married/Engaged?',
                'Higher Studies/Certifications?',
                'Health Issues?',
                'Others'
            ];

            $currentYearQuestions = [
                'Marriage Plans',
                'Plans For Higher Study',
                'Certification Plans',
                'Others'
            ];

            for ($i = 0; $i < 4; $i++) {

                $db->table('personal_updates')->insert([

                    'review_id' => $reviewId,

                    'last_year_question' => $lastYearQuestions[$i],
                    'last_year_answer' => $lastYearAnswers[$i] ?? '',
                    'last_year_details' => $lastYearDetails[$i] ?? '',

                    'current_year_question' => $currentYearQuestions[$i],
                    'current_year_answer' => $currentYearAnswers[$i] ?? '',
                    'current_year_details' => $currentYearDetails[$i] ?? '',
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Professional Goals Achieved for last year
            |--------------------------------------------------------------------------
            */

            $goalLastSelf = $this->request->getPost('goal_last_self') ?? [];
            $goalLastRo = $this->request->getPost('goal_last_ro') ?? [];
            $goalLastHod = $this->request->getPost('goal_last_hod') ?? [];

            for ($i = 0; $i < count($goalLastSelf); $i++) {

                if (
                    empty(trim($goalLastSelf[$i] ?? '')) &&
                    empty(trim($goalLastRo[$i] ?? '')) &&
                    empty(trim($goalLastHod[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('review_comments')->insert([

                    'review_id' => $reviewId,

                    'section_name' => 'Professional Goals Achieved for last year',

                    'self_text' => $goalLastSelf[$i] ?? '',
                    'ro_comment' => $goalLastRo[$i] ?? '',
                    'hod_comment' => $goalLastHod[$i] ?? ''
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Professional Goals for forthcoming year
            |--------------------------------------------------------------------------
            */

            $goalFutureSelf = $this->request->getPost('goal_future_self') ?? [];
            $goalFutureRo = $this->request->getPost('goal_future_ro') ?? [];
            $goalFutureHod = $this->request->getPost('goal_future_hod') ?? [];

            for ($i = 0; $i < count($goalFutureSelf); $i++) {

                if (
                    empty(trim($goalFutureSelf[$i] ?? '')) &&
                    empty(trim($goalFutureRo[$i] ?? '')) &&
                    empty(trim($goalFutureHod[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('review_comments')->insert([

                    'review_id' => $reviewId,

                    'section_name' => 'Professional Goals for forthcoming year',

                    'self_text' => $goalFutureSelf[$i] ?? '',
                    'ro_comment' => $goalFutureRo[$i] ?? '',
                    'hod_comment' => $goalFutureHod[$i] ?? ''
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Training Requirements
            |--------------------------------------------------------------------------
            */

            $trainingSelf = $this->request->getPost('training_self') ?? [];
            $trainingRo = $this->request->getPost('training_ro') ?? [];
            $trainingHod = $this->request->getPost('training_hod') ?? [];

            for ($i = 0; $i < count($trainingSelf); $i++) {

                if (
                    empty(trim($trainingSelf[$i] ?? '')) &&
                    empty(trim($trainingRo[$i] ?? '')) &&
                    empty(trim($trainingHod[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('review_comments')->insert([

                    'review_id' => $reviewId,

                    'section_name' => 'Training Requirements',

                    'self_text' => $trainingSelf[$i] ?? '',
                    'ro_comment' => $trainingRo[$i] ?? '',
                    'hod_comment' => $trainingHod[$i] ?? ''
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Other General Comments
            |--------------------------------------------------------------------------
            */

            $otherSelf = $this->request->getPost('other_comment_self') ?? [];
            $otherRo = $this->request->getPost('other_comment_ro') ?? [];
            $otherHod = $this->request->getPost('other_comment_hod') ?? [];

            for ($i = 0; $i < count($otherSelf); $i++) {

                if (
                    empty(trim($otherSelf[$i] ?? '')) &&
                    empty(trim($otherRo[$i] ?? '')) &&
                    empty(trim($otherHod[$i] ?? ''))
                ) {
                    continue;
                }

                $db->table('review_comments')->insert([

                    'review_id' => $reviewId,

                    'section_name' => 'Other General Comments',

                    'self_text' => $otherSelf[$i] ?? '',
                    'ro_comment' => $otherRo[$i] ?? '',
                    'hod_comment' => $otherHod[$i] ?? ''

                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | RO Use Only
            |--------------------------------------------------------------------------
            */

            $roAnswers = $this->request->getPost('ro_use_answer') ?? [];
            $roDetails = $this->request->getPost('ro_use_details') ?? [];

            $items = [

                'The Team member has Work related Issues',
                'The Team member has Leave Issues',
                'The team member has Stability Issues',
                'The Team member exhibits non-supportive attitude',
                'Any other points in specific to note about the team member',
                'Overall Comment /Performance of the team member'

            ];

            for ($i = 0; $i < count($items); $i++) {

                $db->table('ro_use_only')->insert([

                    'review_id' => $reviewId,

                    'item_name' => $items[$i],

                    'answer' => $roAnswers[$i] ?? '',

                    'details' => $roDetails[$i] ?? ''

                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | HRD Scores
            |--------------------------------------------------------------------------
            */

            $availablePoints = $this->request->getPost('available_points') ?? [];
            $pointsScored = $this->request->getPost('points_scored') ?? [];
            $hrdComments = $this->request->getPost('hrd_ro_comment') ?? [];

            $parameters = [

                'KRAs Target Achievement Points',
                'Professional Skills Scores',
                'Personal Skills Scores',
                'Special Achievements Score',
                'Overall Total Score'

            ];

            for ($i = 0; $i < count($parameters); $i++) {

                $db->table('hrd_scores')->insert([

                    'review_id' => $reviewId,

                    'parameter_name' => $parameters[$i],

                    'available_points' => $availablePoints[$i] ?? 0,

                    'points_scored' => $pointsScored[$i] ?? 0,

                    'ro_comment' => $hrdComments[$i] ?? ''

                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Signatures
            |--------------------------------------------------------------------------
            */

            $signatureData = [

                [
                    'role_name' => 'Employee',
                    'signature' => $this->request->getPost('employee_signature'),
                    'signed_date' => $this->request->getPost('employee_date'),
                ],

                [
                    'role_name' => 'Reporting Officer',
                    'signature' => $this->request->getPost('ro_signature'),
                    'signed_date' => $this->request->getPost('ro_date'),
                ],

                [
                    'role_name' => 'HOD',
                    'signature' => $this->request->getPost('hod_signature'),
                    'signed_date' => $this->request->getPost('hod_date'),
                ],

                [
                    'role_name' => 'HRD',
                    'signature' => $this->request->getPost('hrd_signature'),
                    'signed_date' => $this->request->getPost('hrd_date'),
                ]

            ];

            foreach ($signatureData as $row) {

                $db->table('signatures')->insert([

                    'review_id' => $reviewId,

                    'role_name' => $row['role_name'],

                    'signature' => $row['signature'],

                    'signed_date' => $row['signed_date']

                ]);
            }

            $db->transComplete();
            if (!$db->transStatus()) throw new \RuntimeException('The performance review could not be saved.');

            return redirect()
                ->to('/performance_review')
                ->with('success', 'Performance Review Saved Successfully');
        } catch (\Exception $e) {
            if (isset($db)) $db->transRollback();

            return redirect()
                ->to('/performance_review')
                ->with('error', $e->getMessage());
        }
    }

    private function canManageReviews(): bool
    {
        return in_array(session('role'), ['superadmin', 'admin', 'hr'], true);
    }

    private function accessDenied()
    {
        return redirect()->to('/dashboard')->with('error', 'Only HR and administrators can access performance reviews.');
    }
}
