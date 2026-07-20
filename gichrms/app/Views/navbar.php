<?php
use App\Libraries\NavbarNotificationService;

$notificationData = ['count' => 0, 'items' => []];

if (session('user_id')) {
    $notificationData = (new NavbarNotificationService())->forUser(
        (int) session('user_id'),
        (string) session('role')
    );
}

$notificationCount = (int) ($notificationData['count'] ?? 0);
$notificationItems = $notificationData['items'] ?? [];
$hasChatNotifications = !empty(array_filter($notificationItems, static fn($item) => ($item['type'] ?? '') === 'chat'));
$hasApprovalNotifications = !empty(array_filter($notificationItems, static fn($item) => ($item['type'] ?? '') === 'approval'));

$firstSegment = strtolower((string) service('uri')->getSegment(1));
$secondSegment = strtolower((string) service('uri')->getSegment(2));
$pageKey = $secondSegment !== '' ? $secondSegment : ($firstSegment !== '' ? $firstSegment : 'dashboard');

if (in_array($firstSegment, ['chat', 'invoice-details'], true)) {
    $pageKey = $firstSegment;
}

$pageContext = [
    'dashboard' => ['Overview', 'Dashboard'],
    'requisitions' => ['Recruitment', 'Job Requisitions'],
    'jobs' => ['Recruitment', 'Job Openings'],
    'jobs-grid' => ['Recruitment', 'Job Openings'],
    'candidates' => ['Recruitment', 'Candidates'],
    'candidates-grid' => ['Recruitment', 'Candidates'],
    'candidates-kanban' => ['Recruitment', 'Candidates'],
    'applications' => ['Recruitment', 'Candidate Profile'],
    'evaluation' => ['Recruitment', 'Evaluations'],
    'employee-jobs' => ['My Workspace', 'Career Opportunities'],
    'employee-jobs-grid' => ['My Workspace', 'Career Opportunities'],
    'apply-job' => ['My Workspace', 'Apply for Job'],
    'staff' => ['People', 'Staff Directory'],
    'create' => [$firstSegment === 'staff' ? 'People' : 'Workspace', $firstSegment === 'staff' ? 'Add Staff' : 'Create'],
    'edit' => [$firstSegment === 'staff' ? 'People' : 'Workspace', $firstSegment === 'staff' ? 'Edit Staff' : 'Edit'],
    'email' => ['Settings', 'Company Email'],
    'profile' => ['Settings', 'My Profile'],
    'companies' => ['Organization', 'Companies'],
    'subscriptions' => ['Finance & Billing', 'Subscriptions'],
    'purchase_transaction' => ['Finance & Billing', 'Transactions'],
    'packages' => ['Finance & Billing', 'Packages'],
    'package-grid' => ['Finance & Billing', 'Packages'],
    'invoice' => ['Finance & Billing', 'Invoices'],
    'invoice-details' => ['Finance & Billing', 'Invoice Details'],
    'employee_attendance' => ['My Workspace', 'Attendance'],
    'performance_review' => ['My Workspace', 'Performance Reviews'],
    'chat' => ['Support', 'Team Chat'],
    'support_ticket' => ['Support', 'Support Tickets'],
    'expense_report' => ['Analytics', 'Expense Report'],
    'invoice_report' => ['Analytics', 'Invoice Report'],
    'user_report' => ['Analytics', 'User Report'],
    'employee_report' => ['Analytics', 'Employee Report'],
    'payslip_report' => ['Analytics', 'Payslip Report'],
    'attendance_report' => ['Analytics', 'Attendance Report'],
    'leave_report' => ['Analytics', 'Leave Report'],
    'daily_report' => ['Analytics', 'Daily Report'],
];

[$pageSection, $pageTitle] = $pageContext[$pageKey] ?? [
    'Workspace',
    ucwords(str_replace(['-', '_'], ' ', $pageKey)),
];

$userName = trim((string) session('name')) ?: 'User';
$userRole = ucwords(str_replace('_', ' ', (string) session('role')));
$userInitial = strtoupper(substr($userName, 0, 1));
?>

<nav class="relative z-[100] flex h-[72px] min-h-[72px] shrink-0 items-center justify-between overflow-visible border-b border-slate-200 bg-white px-4 sm:px-5 lg:px-7">
    <div class="flex min-w-0 items-center gap-3">
        <button type="button" onclick="toggleSidebar()"
            class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700 lg:hidden"
            aria-label="Open sidebar">
            <i data-lucide="menu" class="h-5 w-5"></i>
        </button>

        <div class="min-w-0">
            <div class="hidden items-center gap-1.5 text-[11px] font-medium text-slate-400 sm:flex">
                <span><?= esc($pageSection) ?></span>
                <i data-lucide="chevron-right" class="h-3 w-3"></i>
                <span class="truncate text-slate-500"><?= esc($pageTitle) ?></span>
            </div>
            <h1 class="truncate text-base font-semibold text-slate-950 sm:mt-0.5 sm:text-lg"><?= esc($pageTitle) ?></h1>
        </div>
    </div>

    <div class="ml-3 flex shrink-0 items-center gap-1.5 sm:gap-2.5">
        <div class="relative z-[110]">
            <button id="notificationButton" type="button" onclick="toggleNotificationMenu()"
                class="relative inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-500 transition hover:bg-slate-100 hover:text-indigo-700"
                aria-label="Open notifications" aria-expanded="false" aria-controls="notificationMenu">
                <i data-lucide="bell" class="h-5 w-5"></i>

                <?php if ($notificationCount > 0): ?>
                    <span class="absolute right-1.5 top-1.5 flex h-4 min-w-4 items-center justify-center rounded-full bg-rose-500 px-1 text-[9px] font-bold text-white ring-2 ring-white">
                        <?= $notificationCount > 99 ? '99+' : $notificationCount ?>
                    </span>
                <?php endif; ?>
            </button>

            <div id="notificationMenu"
                class="absolute right-0 z-[120] mt-3 hidden w-[min(24rem,calc(100vw-2rem))] overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl ring-1 ring-slate-900/5">
                <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                    <div>
                        <p class="text-sm font-semibold text-slate-950">Notifications</p>
                        <p class="mt-0.5 text-xs text-slate-500">
                            <?= $notificationCount > 0 ? $notificationCount . ' item' . ($notificationCount === 1 ? '' : 's') . ' need attention' : 'You are all caught up' ?>
                        </p>
                    </div>
                    <?php if ($notificationCount > 0): ?>
                        <span class="rounded-full bg-rose-50 px-2.5 py-1 text-[11px] font-semibold text-rose-600">New</span>
                    <?php endif; ?>
                </div>

                <div class="max-h-96 overflow-y-auto">
                    <?php if (empty($notificationItems)): ?>
                        <div class="px-6 py-10 text-center">
                            <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                                <i data-lucide="bell-check" class="h-6 w-6"></i>
                            </span>
                            <p class="mt-4 text-sm font-semibold text-slate-900">No new notifications</p>
                            <p class="mt-1 text-xs leading-5 text-slate-500">Approvals, candidate updates, and unread chats will appear here.</p>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($notificationItems as $item): ?>
                        <a href="<?= base_url($item['url']) ?>" class="flex gap-3 border-b border-slate-100 px-4 py-3.5 transition last:border-b-0 hover:bg-slate-50">
                            <span class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl <?= esc($item['tone']) ?>">
                                <i data-lucide="<?= esc($item['icon']) ?>" class="h-4 w-4"></i>
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="flex items-start justify-between gap-3">
                                    <span class="truncate text-sm font-semibold text-slate-900"><?= esc($item['title']) ?></span>
                                    <?php if (!empty($item['date'])): ?>
                                        <span class="shrink-0 text-[10px] font-medium text-slate-400"><?= esc(date('M d', strtotime($item['date']))) ?></span>
                                    <?php endif; ?>
                                </span>
                                <span class="mt-1 block text-xs leading-5 text-slate-500"><?= esc($item['message']) ?></span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <?php if ($notificationCount > 0): ?>
                    <div class="flex items-center justify-end gap-4 border-t border-slate-200 bg-slate-50 px-4 py-3">
                        <?php if ($hasApprovalNotifications): ?>
                            <a href="<?= base_url('Recruitment/requisitions') ?>" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800">View approvals</a>
                        <?php endif; ?>
                        <?php if ($hasChatNotifications): ?>
                            <a href="<?= base_url('chat') ?>" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800">Open chat</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <span class="mx-1 hidden h-8 w-px bg-slate-200 sm:block"></span>

        <div class="hidden items-center gap-3 sm:flex">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700 ring-2 ring-white">
                <?= esc($userInitial) ?>
            </span>
            <div class="hidden min-w-0 text-left md:block">
                <p class="max-w-36 truncate text-sm font-semibold text-slate-900"><?= esc($userName) ?></p>
                <p class="mt-0.5 text-[11px] text-slate-500"><?= esc($userRole) ?></p>
            </div>
        </div>

        <div class="relative z-[110]">
            <button id="settingsButton" type="button" onclick="toggleSettingsMenu()"
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-500 transition hover:bg-slate-100 hover:text-indigo-700"
                aria-label="Open account settings" aria-expanded="false" aria-controls="settingsMenu">
                <i data-lucide="settings" class="h-5 w-5"></i>
            </button>

            <div id="settingsMenu"
                class="absolute right-0 z-[120] mt-3 hidden w-64 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl ring-1 ring-slate-900/5">
                <div class="flex items-center gap-3 border-b border-slate-200 bg-slate-50 px-4 py-4 sm:hidden">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700"><?= esc($userInitial) ?></span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-slate-900"><?= esc($userName) ?></p>
                        <p class="mt-0.5 text-xs text-slate-500"><?= esc($userRole) ?></p>
                    </div>
                </div>

                <div class="p-2">
                    <?php if (in_array(session('role'), ['superadmin', 'admin', 'hr'], true)): ?>
                        <a href="<?= base_url('settings/email') ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-indigo-50 hover:text-indigo-700">
                            <i data-lucide="mail" class="h-4 w-4"></i>
                            Company Email
                        </a>
                    <?php endif; ?>

                    <a href="<?= base_url('settings/profile') ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-950">
                        <i data-lucide="circle-user-round" class="h-4 w-4"></i>
                        Profile
                    </a>

                    <a href="#" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-950">
                        <i data-lucide="shield-keyhole" class="h-4 w-4"></i>
                        Change Password
                    </a>
                </div>

                <div class="border-t border-slate-200 p-2">
                    <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold text-rose-600 hover:bg-rose-50">
                        <i data-lucide="log-out" class="h-4 w-4"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closeNavbarMenus(exceptMenuId = null) {
            const menus = [
                { button: document.getElementById('notificationButton'), menu: document.getElementById('notificationMenu') },
                { button: document.getElementById('settingsButton'), menu: document.getElementById('settingsMenu') }
            ];

            menus.forEach(function (entry) {
                if (!entry.button || !entry.menu || entry.menu.id === exceptMenuId) return;
                entry.menu.classList.add('hidden');
                entry.button.setAttribute('aria-expanded', 'false');
            });
        }

        function toggleSettingsMenu() {
            const button = document.getElementById('settingsButton');
            const menu = document.getElementById('settingsMenu');
            if (!button || !menu) return;

            const isOpening = menu.classList.contains('hidden');
            closeNavbarMenus('settingsMenu');
            menu.classList.toggle('hidden', !isOpening);
            button.setAttribute('aria-expanded', isOpening ? 'true' : 'false');
        }

        function toggleNotificationMenu() {
            const button = document.getElementById('notificationButton');
            const menu = document.getElementById('notificationMenu');
            if (!button || !menu) return;

            const isOpening = menu.classList.contains('hidden');
            closeNavbarMenus('notificationMenu');
            menu.classList.toggle('hidden', !isOpening);
            button.setAttribute('aria-expanded', isOpening ? 'true' : 'false');
        }

        document.addEventListener('click', function (event) {
            const settingsButton = document.getElementById('settingsButton');
            const settingsMenu = document.getElementById('settingsMenu');
            const notificationButton = document.getElementById('notificationButton');
            const notificationMenu = document.getElementById('notificationMenu');

            if (settingsButton && settingsMenu && !settingsButton.contains(event.target) && !settingsMenu.contains(event.target)) {
                settingsMenu.classList.add('hidden');
                settingsButton.setAttribute('aria-expanded', 'false');
            }

            if (notificationButton && notificationMenu && !notificationButton.contains(event.target) && !notificationMenu.contains(event.target)) {
                notificationMenu.classList.add('hidden');
                notificationButton.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeNavbarMenus();
        });
    </script>
</nav>
