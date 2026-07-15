<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Directory</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-900">

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <div class="flex h-screen overflow-hidden">
        <?= $this->include('sidebar') ?>

        <div class="flex-1 flex flex-col overflow-hidden">
            <?= $this->include('navbar') ?>

            <?php
            $canManageStaff = in_array(session('role'), ['hr', 'admin'], true);
            $totalStaff = count($staff ?? []);
            $activeStaff = count(array_filter($staff ?? [], static fn($member) => (int) ($member['is_active'] ?? 0) === 1));
            $loginEnabledCount = count(array_filter($staff ?? [], static fn($member) => (int) ($member['login_enabled'] ?? 1) === 1 && !empty($member['password'])));
            $departmentCount = count(array_unique(array_filter(array_column($staff ?? [], 'department_name'))));
            $canManageMemberCredentials = static function (array $member): bool {
                if (session('role') === 'admin') {
                    return true;
                }

                return session('role') === 'hr'
                    && !in_array($member['role'] ?? '', ['admin', 'hr'], true);
            };
            ?>

            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="mx-auto max-w-7xl space-y-6">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <div class="flex flex-wrap items-center gap-3">
                                <h1 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Staff Directory</h1>
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-600 ring-1 ring-slate-200">
                                    <i data-lucide="users" class="h-3.5 w-3.5"></i>
                                    Company Staff
                                </span>
                            </div>
                            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                                View staff accounts, roles, departments, and contact information.
                            </p>
                        </div>

                        <?php if ($canManageStaff): ?>
                            <a href="<?= base_url('/staff/create') ?>"
                                class="inline-flex h-11 w-fit items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
                                <i data-lucide="user-plus" class="h-4 w-4"></i>
                                Add Staff
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">Total Staff</p>
                                <i data-lucide="users" class="h-5 w-5 text-slate-400"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $totalStaff ?></p>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">Active</p>
                                <i data-lucide="user-check" class="h-5 w-5 text-emerald-500"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $activeStaff ?></p>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">Login Enabled</p>
                                <i data-lucide="key-round" class="h-5 w-5 text-indigo-500"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $loginEnabledCount ?></p>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">Departments</p>
                                <i data-lucide="building-2" class="h-5 w-5 text-indigo-500"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $departmentCount ?></p>
                        </div>
                    </div>

                    <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                        <div class="flex flex-col gap-3 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-5">
                            <div>
                                <h2 class="text-base font-semibold text-slate-950">Staff Records</h2>
                                <p class="mt-1 text-sm text-slate-500"><?= $totalStaff ?> people in the company directory.</p>
                            </div>
                        </div>

                        <?php if (!empty($staff)): ?>
                            <div class="hidden overflow-x-auto lg:block">
                                <table class="w-full min-w-[1160px]">
                                    <thead>
                                        <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase text-slate-500">
                                            <th class="px-5 py-3">Staff</th>
                                            <th class="px-5 py-3">Position</th>
                                            <th class="px-5 py-3">Department</th>
                                            <th class="px-5 py-3">Phone</th>
                                            <th class="px-5 py-3">Joining</th>
                                            <th class="px-5 py-3">Status</th>
                                            <th class="px-5 py-3">Login</th>
                                            <?php if ($canManageStaff): ?>
                                                <th class="px-5 py-3 text-right">Action</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 text-sm">
                                        <?php foreach ($staff as $member): ?>
                                            <tr class="hover:bg-slate-50">
                                                <td class="px-5 py-4">
                                                    <div class="flex items-center gap-3">
                                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-50 text-sm font-semibold text-indigo-700">
                                                            <?= esc(strtoupper(substr((string) ($member['name'] ?? 'S'), 0, 1))) ?>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-slate-950"><?= esc($member['name'] ?? '-') ?></p>
                                                            <p class="mt-1 text-xs text-slate-500"><?= esc($member['email'] ?? '-') ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-4">
                                                    <p class="font-medium text-slate-800"><?= esc($member['position'] ?? '-') ?></p>
                                                    <p class="mt-1 text-xs text-slate-500"><?= esc(ucwords(str_replace('_', ' ', (string) ($member['role'] ?? '-')))) ?></p>
                                                </td>
                                                <td class="px-5 py-4 text-slate-700"><?= esc($member['department_name'] ?? '-') ?></td>
                                                <td class="px-5 py-4 text-slate-700"><?= esc($member['phone'] ?? '-') ?></td>
                                                <td class="px-5 py-4 text-slate-700">
                                                    <?= !empty($member['date_of_joining']) ? date('d M Y', strtotime($member['date_of_joining'])) : '-' ?>
                                                </td>
                                                <td class="px-5 py-4">
                                                    <?php if ((int) ($member['is_active'] ?? 0) === 1): ?>
                                                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200">Active</span>
                                                    <?php else: ?>
                                                        <span class="rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-700 ring-1 ring-rose-200">Inactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="px-5 py-4">
                                                    <?php $hasLogin = (int) ($member['login_enabled'] ?? 1) === 1 && !empty($member['password']); ?>
                                                    <?php if ($hasLogin): ?>
                                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-indigo-200">
                                                            <i data-lucide="key-round" class="h-3.5 w-3.5"></i>
                                                            Enabled
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 ring-1 ring-slate-200">
                                                            <i data-lucide="key-square" class="h-3.5 w-3.5"></i>
                                                            No login
                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if ($canManageStaff): ?>
                                                    <td class="px-5 py-4">
                                                        <div class="flex flex-wrap justify-end gap-2">
                                                            <a href="<?= base_url('/staff/edit/' . $member['id']) ?>"
                                                                class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-700 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">
                                                                <i data-lucide="square-pen" class="h-4 w-4"></i>
                                                                Edit
                                                            </a>

                                                            <?php if ($canManageMemberCredentials($member)): ?>
                                                                <button type="button"
                                                                    data-staff-id="<?= (int) $member['id'] ?>"
                                                                    data-staff-name="<?= esc($member['name'] ?? 'Staff member', 'attr') ?>"
                                                                    data-has-login="<?= $hasLogin ? '1' : '0' ?>"
                                                                    onclick="openCredentialModal(this)"
                                                                    class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-indigo-200 bg-indigo-50 px-3 text-sm font-semibold text-indigo-700 hover:bg-indigo-100">
                                                                    <i data-lucide="<?= $hasLogin ? 'refresh-cw' : 'key-round' ?>" class="h-4 w-4"></i>
                                                                    <?= $hasLogin ? 'Reset' : 'Create Login' ?>
                                                                </button>

                                                                <?php if ($hasLogin && (int) $member['id'] !== (int) session('user_id')): ?>
                                                                    <button type="button"
                                                                        data-staff-id="<?= (int) $member['id'] ?>"
                                                                        data-staff-name="<?= esc($member['name'] ?? 'Staff member', 'attr') ?>"
                                                                        onclick="openRemoveCredentialModal(this)"
                                                                        class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-rose-200 bg-white px-3 text-sm font-semibold text-rose-700 hover:bg-rose-50">
                                                                        <i data-lucide="key-square" class="h-4 w-4"></i>
                                                                        Remove
                                                                    </button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="grid gap-3 p-4 lg:hidden">
                                <?php foreach ($staff as $member): ?>
                                    <article class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
                                        <div class="flex items-start justify-between gap-3">
                                            <div class="flex min-w-0 gap-3">
                                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-50 text-sm font-semibold text-indigo-700">
                                                    <?= esc(strtoupper(substr((string) ($member['name'] ?? 'S'), 0, 1))) ?>
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="truncate font-semibold text-slate-950"><?= esc($member['name'] ?? '-') ?></p>
                                                    <p class="mt-1 truncate text-xs text-slate-500"><?= esc($member['email'] ?? '-') ?></p>
                                                </div>
                                            </div>
                                            <?php if ((int) ($member['is_active'] ?? 0) === 1): ?>
                                                <span class="shrink-0 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200">Active</span>
                                            <?php else: ?>
                                                <span class="shrink-0 rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-700 ring-1 ring-rose-200">Inactive</span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                                            <?php $hasLogin = (int) ($member['login_enabled'] ?? 1) === 1 && !empty($member['password']); ?>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Position</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= esc($member['position'] ?? '-') ?></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Role</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= esc(ucwords(str_replace('_', ' ', (string) ($member['role'] ?? '-')))) ?></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Department</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= esc($member['department_name'] ?? '-') ?></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Phone</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= esc($member['phone'] ?? '-') ?></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Login Access</p>
                                                <p class="mt-1 font-semibold <?= $hasLogin ? 'text-indigo-700' : 'text-slate-500' ?>"><?= $hasLogin ? 'Enabled' : 'No credentials' ?></p>
                                            </div>
                                        </div>

                                        <?php if ($canManageStaff): ?>
                                            <div class="mt-4 flex flex-wrap gap-2 border-t border-slate-100 pt-4">
                                                <a href="<?= base_url('/staff/edit/' . $member['id']) ?>"
                                                    class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-700 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">
                                                    <i data-lucide="square-pen" class="h-4 w-4"></i>
                                                    Edit Details
                                                </a>

                                                <?php if ($canManageMemberCredentials($member)): ?>
                                                    <button type="button"
                                                        data-staff-id="<?= (int) $member['id'] ?>"
                                                        data-staff-name="<?= esc($member['name'] ?? 'Staff member', 'attr') ?>"
                                                        data-has-login="<?= $hasLogin ? '1' : '0' ?>"
                                                        onclick="openCredentialModal(this)"
                                                        class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-indigo-200 bg-indigo-50 px-3 text-sm font-semibold text-indigo-700 hover:bg-indigo-100">
                                                        <i data-lucide="<?= $hasLogin ? 'refresh-cw' : 'key-round' ?>" class="h-4 w-4"></i>
                                                        <?= $hasLogin ? 'Reset Password' : 'Create Login' ?>
                                                    </button>

                                                    <?php if ($hasLogin && (int) $member['id'] !== (int) session('user_id')): ?>
                                                        <button type="button"
                                                            data-staff-id="<?= (int) $member['id'] ?>"
                                                            data-staff-name="<?= esc($member['name'] ?? 'Staff member', 'attr') ?>"
                                                            onclick="openRemoveCredentialModal(this)"
                                                            class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-rose-200 bg-white px-3 text-sm font-semibold text-rose-700 hover:bg-rose-50">
                                                            <i data-lucide="key-square" class="h-4 w-4"></i>
                                                            Remove Login
                                                        </button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="flex flex-col items-center justify-center px-6 py-16 text-center">
                                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                                    <i data-lucide="users" class="h-7 w-7"></i>
                                </div>
                                <h2 class="mt-4 text-lg font-semibold text-slate-950">No staff added yet</h2>
                                <p class="mt-2 max-w-md text-sm text-slate-500">
                                    Add staff profiles to start building the company directory.
                                </p>
                                <?php if ($canManageStaff): ?>
                                    <a href="<?= base_url('/staff/create') ?>"
                                        class="mt-5 inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 text-sm font-semibold text-white hover:bg-indigo-700">
                                        <i data-lucide="user-plus" class="h-4 w-4"></i>
                                        Add Staff
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                </div>
            </main>
        </div>
    </div>

    <div id="credentialModal" class="fixed inset-0 z-[140] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="credentialModalTitle">
        <div class="w-full max-w-lg overflow-hidden rounded-2xl border border-white/20 bg-white shadow-2xl">
            <div class="flex items-start justify-between gap-4 border-b border-slate-200 px-5 py-5 sm:px-6">
                <div class="flex items-start gap-3">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                        <i data-lucide="key-round" class="h-5 w-5"></i>
                    </span>
                    <div>
                        <h2 id="credentialModalTitle" class="text-lg font-semibold text-slate-950">Create Login Credentials</h2>
                        <p id="credentialStaffName" class="mt-1 text-sm text-slate-500">Staff member</p>
                    </div>
                </div>
                <button type="button" onclick="closeCredentialModal()" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100" aria-label="Close credential dialog">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>

            <form id="credentialForm" method="post">
                <?= csrf_field() ?>
                <div class="space-y-5 px-5 py-5 sm:px-6">
                    <div class="rounded-xl border border-sky-200 bg-sky-50 p-4 text-sm leading-6 text-sky-800">
                        The employee will use their existing staff email and the password entered below to sign in.
                    </div>

                    <div>
                        <label for="credentialPassword" class="block text-sm font-semibold text-slate-700">Temporary password</label>
                        <input id="credentialPassword" name="password" type="password" required minlength="8" autocomplete="new-password"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-3.5 py-3 text-sm outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10">
                        <p class="mt-2 text-xs leading-5 text-slate-500">Minimum 8 characters with uppercase, lowercase, number, and special character.</p>
                    </div>

                    <div>
                        <label for="credentialPasswordConfirmation" class="block text-sm font-semibold text-slate-700">Confirm password</label>
                        <input id="credentialPasswordConfirmation" name="confirm_password" type="password" required minlength="8" autocomplete="new-password"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-3.5 py-3 text-sm outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10">
                    </div>
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-5 py-4 sm:flex-row sm:justify-end sm:px-6">
                    <button type="button" onclick="closeCredentialModal()" class="inline-flex h-10 items-center justify-center rounded-lg border border-slate-300 bg-white px-4 text-sm font-semibold text-slate-700 hover:bg-slate-100">Cancel</button>
                    <button id="credentialSubmitLabel" type="submit" class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 text-sm font-semibold text-white hover:bg-indigo-700">
                        <i data-lucide="key-round" class="h-4 w-4"></i>
                        <span id="credentialSubmitText">Create Login</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="removeCredentialModal" class="fixed inset-0 z-[140] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="removeCredentialTitle">
        <div class="w-full max-w-md overflow-hidden rounded-2xl border border-white/20 bg-white shadow-2xl">
            <div class="px-5 py-6 text-center sm:px-6">
                <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-rose-50 text-rose-600">
                    <i data-lucide="key-square" class="h-6 w-6"></i>
                </span>
                <h2 id="removeCredentialTitle" class="mt-4 text-lg font-semibold text-slate-950">Remove Login Credentials?</h2>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    <strong id="removeCredentialStaffName" class="text-slate-800">This employee</strong> will immediately lose login access. Their staff profile and employment records will be preserved.
                </p>
            </div>

            <form id="removeCredentialForm" method="post" class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-5 py-4 sm:flex-row sm:justify-end sm:px-6">
                <?= csrf_field() ?>
                <button type="button" onclick="closeRemoveCredentialModal()" class="inline-flex h-10 items-center justify-center rounded-lg border border-slate-300 bg-white px-4 text-sm font-semibold text-slate-700 hover:bg-slate-100">Cancel</button>
                <button type="submit" class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-rose-600 px-4 text-sm font-semibold text-white hover:bg-rose-700">
                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                    Remove Login
                </button>
            </form>
        </div>
    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => session()->getFlashdata('success'),
        'toastError' => session()->getFlashdata('error'),
        'toastErrors' => session()->getFlashdata('errors') ?? [],
    ]) ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });

        const credentialSaveBaseUrl = <?= json_encode(base_url('staff/credentials/save/')) ?>;
        const credentialDeleteBaseUrl = <?= json_encode(base_url('staff/credentials/delete/')) ?>;

        function showModal(modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function hideModal(modal) {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function openCredentialModal(button) {
            const hasLogin = button.dataset.hasLogin === '1';
            const form = document.getElementById('credentialForm');
            form.action = credentialSaveBaseUrl + button.dataset.staffId;
            form.reset();
            document.getElementById('credentialModalTitle').textContent = hasLogin ? 'Reset Login Password' : 'Create Login Credentials';
            document.getElementById('credentialStaffName').textContent = button.dataset.staffName;
            document.getElementById('credentialSubmitText').textContent = hasLogin ? 'Reset Password' : 'Create Login';
            showModal(document.getElementById('credentialModal'));
            document.getElementById('credentialPassword').focus();
        }

        function closeCredentialModal() {
            hideModal(document.getElementById('credentialModal'));
        }

        function openRemoveCredentialModal(button) {
            document.getElementById('removeCredentialForm').action = credentialDeleteBaseUrl + button.dataset.staffId;
            document.getElementById('removeCredentialStaffName').textContent = button.dataset.staffName;
            showModal(document.getElementById('removeCredentialModal'));
        }

        function closeRemoveCredentialModal() {
            hideModal(document.getElementById('removeCredentialModal'));
        }

        document.getElementById('credentialModal').addEventListener('click', function (event) {
            if (event.target === this) closeCredentialModal();
        });

        document.getElementById('removeCredentialModal').addEventListener('click', function (event) {
            if (event.target === this) closeRemoveCredentialModal();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeCredentialModal();
                closeRemoveCredentialModal();
            }
        });
    </script>
</body>

</html>
