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
$hasChatNotifications = !empty(array_filter($notificationItems, static fn ($item) => ($item['type'] ?? '') === 'chat'));
$hasApprovalNotifications = !empty(array_filter($notificationItems, static fn ($item) => ($item['type'] ?? '') === 'approval'));
?>

<nav class="min-h-[72px] bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8">

    <div class="flex items-center gap-3">

        <button type="button" onclick="toggleSidebar()" class="text-slate-700" aria-label="Open sidebar">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
    </div>

    <!-- Search Button,Notification, Profile, Settings -->
    <div class="flex items-center gap-3 lg:gap-5 shrink-0">

        <!-- Search -->
        <button type="button" class="hidden sm:block text-slate-600 hover:text-indigo-600 transition" aria-label="Search">
            <i data-lucide="search" class="w-5 h-5"></i>
        </button>

        <!-- Notification -->
        <div class="relative">
            <button
                id="notificationButton"
                type="button"
                onclick="toggleNotificationMenu()"
                class="relative text-slate-600 hover:text-indigo-600 transition"
                aria-label="Open notifications"
                aria-expanded="false"
                aria-controls="notificationMenu">
                <i data-lucide="bell" class="w-5 h-5"></i>

                <?php if ($notificationCount > 0): ?>
                    <span class="absolute -right-2 -top-2 flex h-5 min-w-5 items-center justify-center rounded-full bg-orange-500 px-1 text-[10px] font-semibold text-white ring-2 ring-white">
                        <?= $notificationCount > 99 ? '99+' : $notificationCount ?>
                    </span>
                <?php endif; ?>
            </button>

            <div
                id="notificationMenu"
                class="hidden absolute right-0 z-50 mt-4 w-[min(22rem,calc(100vw-2rem))] overflow-hidden rounded-lg border border-slate-200 bg-white shadow-xl">
                <div class="flex items-center justify-between border-b border-slate-200 px-4 py-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Notifications</p>
                        <p class="text-xs text-slate-500">
                            <?= $notificationCount > 0 ? $notificationCount . ' item' . ($notificationCount === 1 ? '' : 's') . ' need attention' : 'You are all caught up' ?>
                        </p>
                    </div>
                    <?php if ($notificationCount > 0): ?>
                        <span class="rounded-full bg-orange-50 px-2.5 py-1 text-xs font-semibold text-orange-600">
                            New
                        </span>
                    <?php endif; ?>
                </div>

                <div class="max-h-96 overflow-y-auto">
                    <?php if (empty($notificationItems)): ?>
                        <div class="px-5 py-8 text-center">
                            <div class="mx-auto mb-3 flex h-11 w-11 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                                <i data-lucide="bell-check" class="h-5 w-5"></i>
                            </div>
                            <p class="text-sm font-medium text-slate-800">No new notifications</p>
                            <p class="mt-1 text-xs text-slate-500">New approvals and unread chats will appear here.</p>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($notificationItems as $item): ?>
                        <a href="<?= base_url($item['url']) ?>" class="flex gap-3 border-b border-slate-100 px-4 py-3 transition last:border-b-0 hover:bg-slate-50">
                            <span class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-lg <?= esc($item['tone']) ?>">
                                <i data-lucide="<?= esc($item['icon']) ?>" class="h-4 w-4"></i>
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="flex items-start justify-between gap-3">
                                    <span class="truncate text-sm font-semibold text-slate-900">
                                        <?= esc($item['title']) ?>
                                    </span>
                                    <?php if (!empty($item['date'])): ?>
                                        <span class="shrink-0 text-[11px] text-slate-400">
                                            <?= esc(date('M d', strtotime($item['date']))) ?>
                                        </span>
                                    <?php endif; ?>
                                </span>
                                <span class="mt-1 block text-xs leading-5 text-slate-500">
                                    <?= esc($item['message']) ?>
                                </span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <?php if ($notificationCount > 0): ?>
                    <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-4 py-2">
                        <?php if ($hasApprovalNotifications): ?>
                            <a href="<?= base_url('Recruitment/requisitions') ?>" class="text-xs font-semibold text-orange-600 hover:text-orange-700">
                                View approvals
                            </a>
                        <?php endif; ?>
                        <?php if ($hasChatNotifications): ?>
                            <a href="<?= base_url('chat') ?>" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">
                                Open chat
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Profile -->
        <div class="flex items-center gap-3">
            <div
                class="w-8 h-8 lg:w-9 lg:h-9 rounded-full bg-indigo-500 text-white flex items-center justify-center font-semibold">

                <?= esc(strtoupper(substr((string) session('name'), 0, 1))) ?>

            </div>

            <div class="hidden sm:block text-right">
                <p class="text-sm font-medium text-slate-800">
                    <?= esc(session('name')) ?>
                </p>

                <p class="text-xs text-slate-500 capitalize">
                    <?= str_replace('_', ' ', session('role')) ?>
                </p>
            </div>

        </div>

        <!-- Settings -->
        <div class="relative">

            <button
                id="settingsButton"
                type="button"
                onclick="toggleSettingsMenu()"
                class="text-slate-600 hover:text-indigo-600"
                aria-label="Open settings menu"
                aria-expanded="false"
                aria-controls="settingsMenu">

                <i data-lucide="settings" class="w-5 h-5"></i>

            </button>

            <div id="settingsMenu"
                class="hidden absolute right-0 mt-3 w-52 bg-white rounded-lg shadow-lg border border-slate-200 overflow-hidden">

                <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-100">

                    <i data-lucide="user" class="w-4 h-4"></i>

                    Profile

                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-100">

                    <i data-lucide="lock" class="w-4 h-4"></i>

                    Change Password

                </a>

                <a href="<?= base_url('logout') ?>"
                    class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50">

                    <i data-lucide="log-out" class="w-4 h-4"></i>

                    Logout

                </a>

            </div>

        </div>

    </div>


    <script>
        function toggleSettingsMenu() {
            const button = document.getElementById('settingsButton');
            const menu = document.getElementById('settingsMenu');

            if (!button || !menu) {
                return;
            }

            const isOpening = menu.classList.contains('hidden');

            menu.classList.toggle('hidden', !isOpening);
            button.setAttribute('aria-expanded', isOpening ? 'true' : 'false');
        }

        function toggleNotificationMenu() {
            const button = document.getElementById('notificationButton');
            const menu = document.getElementById('notificationMenu');

            if (!button || !menu) {
                return;
            }

            const isOpening = menu.classList.contains('hidden');

            menu.classList.toggle('hidden', !isOpening);
            button.setAttribute('aria-expanded', isOpening ? 'true' : 'false');
        }

        document.addEventListener('click', function (event) {
            const button = document.getElementById('settingsButton');
            const menu = document.getElementById('settingsMenu');
            const notificationButton = document.getElementById('notificationButton');
            const notificationMenu = document.getElementById('notificationMenu');

            if (!button || !menu) {
                return;
            }

            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
            }

            if (notificationButton && notificationMenu && !notificationButton.contains(event.target) && !notificationMenu.contains(event.target)) {
                notificationMenu.classList.add('hidden');
                notificationButton.setAttribute('aria-expanded', 'false');
            }
        });
    </script>
</nav>
