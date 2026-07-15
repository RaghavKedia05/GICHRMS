<?php
$firstSegment = strtolower((string) service('uri')->getSegment(1));
$secondSegment = strtolower((string) service('uri')->getSegment(2));
$currentPage = $secondSegment !== '' ? $secondSegment : ($firstSegment !== '' ? $firstSegment : 'dashboard');
$role = (string) session('role');

$canManageRecruitment = in_array($role, ['admin', 'hr', 'hiring_manager', 'department_head'], true);
$canManagePeople = in_array($role, ['admin', 'hr'], true);
$canViewReports = in_array($role, ['admin', 'hr'], true);
$isAdmin = $role === 'admin';
$isStaffPage = $firstSegment === 'staff';
$isSettingsPage = $firstSegment === 'settings';
$isReportPage = $firstSegment === 'reports';

$linkClass = static fn(bool $active): string => $active
    ? 'bg-indigo-50 text-indigo-700 ring-1 ring-inset ring-indigo-100'
    : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950';

$sections = [
    [
        'label' => 'Overview',
        'visible' => true,
        'items' => [
            [
                'label' => 'Dashboard',
                'path' => 'dashboard',
                'icon' => 'layout-dashboard',
                'active' => $currentPage === 'dashboard',
            ],
        ],
    ],
    [
        'label' => 'Recruitment',
        'visible' => $canManageRecruitment,
        'items' => [
            [
                'label' => 'Job Requisitions',
                'path' => 'Recruitment/requisitions',
                'icon' => 'file-plus-2',
                'active' => $firstSegment === 'recruitment' && in_array($currentPage, ['requisitions', 'view-job'], true),
            ],
            [
                'label' => 'Job Openings',
                'path' => 'Recruitment/jobs',
                'icon' => 'briefcase-business',
                'active' => $firstSegment === 'recruitment' && in_array($currentPage, ['jobs', 'jobs-grid'], true),
            ],
            ...($canManagePeople ? [[
                'label' => 'External Careers Portal',
                'path' => 'careers',
                'icon' => 'external-link',
                'active' => false,
                'newTab' => true,
            ]] : []),
            [
                'label' => 'Candidates',
                'path' => 'Recruitment/candidates',
                'icon' => 'users-round',
                'active' => $firstSegment === 'recruitment' && in_array($currentPage, ['candidates', 'candidates-grid', 'candidates-kanban', 'applications'], true),
            ],
            [
                'label' => 'Evaluations',
                'path' => 'Recruitment/evaluation',
                'icon' => 'clipboard-check',
                'active' => $firstSegment === 'recruitment' && $currentPage === 'evaluation',
            ],
            [
                'label' => 'Offers & Onboarding',
                'path' => 'Recruitment/offers',
                'icon' => 'handshake',
                'active' => $firstSegment === 'recruitment' && $currentPage === 'offers',
            ],
        ],
    ],
    [
        'label' => 'My Workspace',
        'visible' => true,
        'items' => [
            ...(!$canManageRecruitment ? [[
                'label' => 'My Offers',
                'path' => 'Recruitment/offers',
                'icon' => 'file-signature',
                'active' => $firstSegment === 'recruitment' && $currentPage === 'offers',
            ]] : []),
            [
                'label' => 'Career Opportunities',
                'path' => 'Recruitment/employee-jobs',
                'icon' => 'search-check',
                'active' => $firstSegment === 'recruitment' && in_array($currentPage, ['employee-jobs', 'employee-jobs-grid', 'apply-job'], true),
            ],
            [
                'label' => 'Attendance',
                'path' => 'employee_attendance',
                'icon' => 'calendar-days',
                'active' => $currentPage === 'employee_attendance',
            ],
            ...($canManagePeople ? [[
                'label' => 'Performance Reviews',
                'path' => 'performance_review',
                'icon' => 'chart-no-axes-combined',
                'active' => $currentPage === 'performance_review',
            ]] : []),
        ],
    ],
    [
        'label' => 'People',
        'visible' => $canManagePeople,
        'items' => [
            [
                'label' => 'Staff Directory',
                'path' => 'staff',
                'icon' => 'contact-round',
                'active' => $isStaffPage && $currentPage !== 'create',
            ],
            [
                'label' => 'Add Staff',
                'path' => 'staff/create',
                'icon' => 'user-round-plus',
                'active' => $isStaffPage && $currentPage === 'create',
            ],
            [
                'label' => 'Company Email',
                'path' => 'settings/email',
                'icon' => 'mail',
                'active' => $isSettingsPage && $currentPage === 'email',
            ],
        ],
    ],
    [
        'label' => 'Organization',
        'visible' => $isAdmin,
        'items' => [
            [
                'label' => 'Companies',
                'path' => 'companies',
                'icon' => 'building-2',
                'active' => $currentPage === 'companies',
            ],
        ],
    ],
    [
        'label' => 'Finance & Billing',
        'visible' => $isAdmin,
        'items' => [
            [
                'label' => 'Subscriptions',
                'path' => 'subscriptions',
                'icon' => 'crown',
                'active' => $currentPage === 'subscriptions',
            ],
            [
                'label' => 'Transactions',
                'path' => 'purchase_transaction',
                'icon' => 'credit-card',
                'active' => $currentPage === 'purchase_transaction',
            ],
            [
                'label' => 'Packages',
                'path' => 'packages',
                'icon' => 'package-check',
                'active' => in_array($currentPage, ['packages', 'package-grid'], true),
            ],
            [
                'label' => 'Invoices',
                'path' => 'invoice',
                'icon' => 'receipt-text',
                'active' => in_array($currentPage, ['invoice', 'invoice-details'], true),
            ],
        ],
    ],
];

$reportLinks = [
    ['label' => 'Expense Report', 'path' => 'Reports/expense_report', 'page' => 'expense_report'],
    ['label' => 'Invoice Report', 'path' => 'Reports/invoice_report', 'page' => 'invoice_report'],
    ['label' => 'User Report', 'path' => 'Reports/user_report', 'page' => 'user_report'],
    ['label' => 'Employee Report', 'path' => 'Reports/employee_report', 'page' => 'employee_report'],
    ['label' => 'Payslip Report', 'path' => 'Reports/payslip_report', 'page' => 'payslip_report'],
    ['label' => 'Attendance Report', 'path' => 'Reports/attendance_report', 'page' => 'attendance_report'],
    ['label' => 'Leave Report', 'path' => 'Reports/leave_report', 'page' => 'leave_report'],
    ['label' => 'Daily Report', 'path' => 'Reports/daily_report', 'page' => 'daily_report'],
];
?>

<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex h-screen w-[272px] -translate-x-full flex-col border-r border-slate-200 bg-white shadow-2xl transition-transform duration-300 lg:static lg:w-[248px] lg:translate-x-0 lg:shadow-none">
    <div class="flex h-[72px] shrink-0 items-center justify-between border-b border-slate-200 px-5">
        <a href="<?= base_url('dashboard') ?>" class="flex items-center gap-2" aria-label="GIC HRMS dashboard">
            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-600 text-sm font-bold text-white shadow-sm">G</span>
            <span class="text-xl font-bold tracking-tight text-slate-950">
                GIC<span class="text-indigo-600">HRMS</span>
            </span>
        </a>

        <button type="button" onclick="toggleSidebar()" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 lg:hidden" aria-label="Close sidebar">
            <i data-lucide="x" class="h-5 w-5"></i>
        </button>
    </div>

    <nav class="min-h-0 flex-1 space-y-6 overflow-y-auto px-3 py-5 [scrollbar-width:thin] [scrollbar-color:#cbd5e1_transparent]">
        <?php foreach ($sections as $section): ?>
            <?php if (!$section['visible']) continue; ?>

            <section>
                <h2 class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.14em] text-slate-400">
                    <?= esc($section['label']) ?>
                </h2>

                <div class="space-y-1">
                    <?php foreach ($section['items'] as $item): ?>
                        <a href="<?= base_url($item['path']) ?>"
                            class="group flex min-h-10 items-center gap-3 rounded-xl px-3 py-2.5 text-[13px] font-semibold transition <?= $linkClass((bool) $item['active']) ?>"
                            <?= !empty($item['newTab']) ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                            <?= $item['active'] ? 'aria-current="page"' : '' ?>>
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg <?= $item['active'] ? 'bg-indigo-100 text-indigo-700' : 'text-slate-400 group-hover:bg-white group-hover:text-slate-700' ?>">
                                <i data-lucide="<?= esc($item['icon']) ?>" class="h-4 w-4"></i>
                            </span>
                            <span class="min-w-0 flex-1 truncate"><?= esc($item['label']) ?></span>
                            <?php if (!empty($item['newTab'])): ?>
                                <i data-lucide="arrow-up-right" class="h-3.5 w-3.5 shrink-0 text-slate-400"></i>
                            <?php endif; ?>
                            <?php if ($item['active']): ?>
                                <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-indigo-600"></span>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <?php if ($canViewReports): ?>
            <section>
                <h2 class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.14em] text-slate-400">Analytics</h2>

                <button type="button" onclick="toggleReportMenu()" aria-controls="reportMenu" aria-expanded="<?= $isReportPage ? 'true' : 'false' ?>"
                    class="group flex min-h-10 w-full items-center gap-3 rounded-xl px-3 py-2.5 text-left text-[13px] font-semibold transition <?= $linkClass($isReportPage) ?>">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg <?= $isReportPage ? 'bg-indigo-100 text-indigo-700' : 'text-slate-400 group-hover:bg-white group-hover:text-slate-700' ?>">
                        <i data-lucide="chart-column-big" class="h-4 w-4"></i>
                    </span>
                    <span class="min-w-0 flex-1 truncate">Reports</span>
                    <i id="reportArrow" data-lucide="chevron-down" class="h-4 w-4 shrink-0 transition-transform duration-200 <?= $isReportPage ? 'rotate-180' : '' ?>"></i>
                </button>

                <div id="reportMenu" class="<?= $isReportPage ? '' : 'hidden' ?> ml-6 mt-1 space-y-0.5 border-l border-slate-200 pl-3">
                    <?php foreach ($reportLinks as $report): ?>
                        <?php $reportActive = $isReportPage && $currentPage === $report['page']; ?>
                        <a href="<?= base_url($report['path']) ?>"
                            class="block rounded-lg px-3 py-2 text-xs font-medium transition <?= $reportActive ? 'bg-indigo-50 text-indigo-700' : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900' ?>"
                            <?= $reportActive ? 'aria-current="page"' : '' ?>>
                            <?= esc($report['label']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <section>
            <h2 class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.14em] text-slate-400">Support</h2>
            <div class="space-y-1">
                <a href="<?= base_url('chat') ?>" class="group flex min-h-10 items-center gap-3 rounded-xl px-3 py-2.5 text-[13px] font-semibold transition <?= $linkClass($currentPage === 'chat') ?>">
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg text-slate-400 group-hover:bg-white group-hover:text-slate-700">
                        <i data-lucide="messages-square" class="h-4 w-4"></i>
                    </span>
                    <span class="flex-1">Team Chat</span>
                </a>

                <a href="<?= base_url('support_ticket') ?>" class="group flex min-h-10 items-center gap-3 rounded-xl px-3 py-2.5 text-[13px] font-semibold transition <?= $linkClass($currentPage === 'support_ticket') ?>">
                    <span class="flex h-7 w-7 items-center justify-center rounded-lg text-slate-400 group-hover:bg-white group-hover:text-slate-700">
                        <i data-lucide="life-buoy" class="h-4 w-4"></i>
                    </span>
                    <span class="flex-1">Support Tickets</span>
                </a>
            </div>
        </section>
    </nav>

    <div class="shrink-0 border-t border-slate-200 bg-slate-50 px-4 py-3">
        <div class="flex items-center gap-3">
            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700">
                <?= esc(strtoupper(substr((string) session('name'), 0, 1))) ?>
            </span>
            <div class="min-w-0 flex-1">
                <p class="truncate text-xs font-semibold text-slate-900"><?= esc(session('name')) ?></p>
                <p class="truncate text-[11px] capitalize text-slate-500"><?= esc(str_replace('_', ' ', $role)) ?></p>
            </div>
            <a href="<?= base_url('logout') ?>" class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-slate-400 hover:bg-rose-50 hover:text-rose-600" title="Logout" aria-label="Logout">
                <i data-lucide="log-out" class="h-4 w-4"></i>
            </a>
        </div>
    </div>

    <script>
        function toggleReportMenu() {
            const menu = document.getElementById('reportMenu');
            const arrow = document.getElementById('reportArrow');
            const button = document.querySelector('[aria-controls="reportMenu"]');

            if (!menu || !arrow || !button) return;

            const isOpening = menu.classList.contains('hidden');
            menu.classList.toggle('hidden', !isOpening);
            arrow.classList.toggle('rotate-180', isOpening);
            button.setAttribute('aria-expanded', isOpening ? 'true' : 'false');
            lucide.createIcons();
        }
    </script>
</aside>
