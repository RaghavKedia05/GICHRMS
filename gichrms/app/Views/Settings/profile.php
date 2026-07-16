<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }

        .field-control {
            width: 100%;
            border: 1px solid rgb(203 213 225);
            border-radius: 0.75rem;
            padding: 0.75rem 0.875rem;
            color: rgb(15 23 42);
            background: white;
            outline: none;
            transition: border-color 150ms ease, box-shadow 150ms ease;
        }

        .field-control:focus {
            border-color: rgb(79 70 229);
            box-shadow: 0 0 0 4px rgb(79 70 229 / 0.1);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">
    <?php
    $validationErrors = session()->getFlashdata('errors') ?? [];
    $profileName = trim((string) ($profile['name'] ?? 'User'));
    $profileInitial = strtoupper(substr($profileName, 0, 1));
    $roleLabel = ucwords(str_replace('_', ' ', (string) ($profile['role'] ?? 'Employee')));
    $hasLogin = (int) ($profile['login_enabled'] ?? 1) === 1 && !empty($profile['password']);
    ?>

    <div id="sidebarOverlay" class="fixed inset-0 z-40 hidden bg-black/40 lg:hidden"></div>

    <div class="flex h-screen overflow-hidden">
        <?= view('sidebar') ?>

        <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
            <?= view('navbar') ?>

            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="mx-auto max-w-6xl space-y-6">
                    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                        <div class="h-28 bg-gradient-to-r from-indigo-600 via-indigo-500 to-blue-500 sm:h-36"></div>
                        <div class="px-5 pb-6 sm:px-7">
                            <div class="-mt-12 flex flex-col gap-4 sm:-mt-14 sm:flex-row sm:items-end sm:justify-between">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-end">
                                    <span class="flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl border-4 border-white bg-indigo-100 text-3xl font-bold text-indigo-700 shadow-lg sm:h-28 sm:w-28">
                                        <?= esc($profileInitial) ?>
                                    </span>
                                    <div class="pb-1">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <h1 class="text-2xl font-semibold text-slate-950"><?= esc($profileName) ?></h1>
                                            <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-indigo-200"><?= esc($roleLabel) ?></span>
                                        </div>
                                        <p class="mt-1 text-sm text-slate-500"><?= esc($profile['position'] ?: 'Position not assigned') ?></p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 pb-1 text-xs font-semibold <?= $hasLogin ? 'text-emerald-700' : 'text-amber-700' ?>">
                                    <span class="h-2 w-2 rounded-full <?= $hasLogin ? 'bg-emerald-500' : 'bg-amber-500' ?>"></span>
                                    <?= $hasLogin ? 'Login access active' : 'Login access disabled' ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_340px]">
                        <form action="<?= base_url('settings/profile/update') ?>" method="post" class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                            <?= csrf_field() ?>

                            <div class="flex items-start gap-3 border-b border-slate-200 px-5 py-5 sm:px-7">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                    <i data-lucide="user-round-pen" class="h-5 w-5"></i>
                                </span>
                                <div>
                                    <h2 class="font-semibold text-slate-950">Personal Information</h2>
                                    <p class="mt-1 text-sm text-slate-500">Keep your contact details accurate and up to date.</p>
                                </div>
                            </div>

                            <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">
                                <div>
                                    <label for="profileName" class="block text-sm font-semibold text-slate-700">Full name</label>
                                    <input id="profileName" name="name" required maxlength="100"
                                        value="<?= esc(old('name', $profile['name'] ?? '')) ?>" class="field-control mt-2">
                                </div>

                                <div>
                                    <label for="profileEmail" class="block text-sm font-semibold text-slate-700">Login email</label>
                                    <input id="profileEmail" name="email" type="email" required maxlength="100"
                                        value="<?= esc(old('email', $profile['email'] ?? '')) ?>" class="field-control mt-2">
                                    <p class="mt-2 text-xs text-slate-500">Changing this also changes your login email.</p>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="profilePhone" class="block text-sm font-semibold text-slate-700">Phone number</label>
                                    <input id="profilePhone" name="phone" type="tel" maxlength="20"
                                        value="<?= esc(old('phone', $profile['phone'] ?? '')) ?>" class="field-control mt-2" placeholder="Company or personal contact number">
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="profileAddress" class="block text-sm font-semibold text-slate-700">Address</label>
                                    <textarea id="profileAddress" name="address" rows="4" maxlength="1000"
                                        class="field-control mt-2 resize-y"><?= esc(old('address', $profile['address'] ?? '')) ?></textarea>
                                </div>

                                <div class="sm:col-span-2 border-t border-slate-200 pt-5">
                                    <h3 class="text-sm font-semibold text-slate-900">Change password</h3>
                                    <p class="mt-1 text-xs text-slate-500">Leave these fields empty to keep your current password.</p>
                                </div>

                                <div>
                                    <label for="currentPassword" class="block text-sm font-semibold text-slate-700">Current password</label>
                                    <input id="currentPassword" name="current_password" type="password" autocomplete="current-password" class="field-control mt-2">
                                </div>

                                <div>
                                    <label for="newPassword" class="block text-sm font-semibold text-slate-700">New password</label>
                                    <input id="newPassword" name="new_password" type="password" minlength="8" autocomplete="new-password" class="field-control mt-2">
                                    <p class="mt-2 text-xs text-slate-500">Use uppercase, lowercase, a number, and a special character.</p>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="confirmPassword" class="block text-sm font-semibold text-slate-700">Confirm new password</label>
                                    <input id="confirmPassword" name="confirm_password" type="password" minlength="8" autocomplete="new-password" class="field-control mt-2">
                                </div>
                            </div>

                            <div class="flex justify-end border-t border-slate-200 bg-slate-50 px-5 py-4 sm:px-7">
                                <button type="submit" class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20">
                                    <i data-lucide="save" class="h-4 w-4"></i>
                                    Save Profile
                                </button>
                            </div>
                        </form>

                        <aside class="space-y-6">
                            <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                                        <i data-lucide="building-2" class="h-5 w-5"></i>
                                    </span>
                                    <div>
                                        <h2 class="font-semibold text-slate-950">Employment Details</h2>
                                        <p class="mt-0.5 text-xs text-slate-500">Managed by HR and Admin.</p>
                                    </div>
                                </div>

                                <dl class="mt-5 divide-y divide-slate-100 text-sm">
                                    <?php
                                    $details = [
                                        'Employee ID' => $profile['employee_id'] ?: 'Not assigned',
                                        'Company' => $profile['company_name'] ?: 'Not assigned',
                                        'Department' => $profile['department_name'] ?: 'Not assigned',
                                        'Position' => $profile['position'] ?: 'Not assigned',
                                        'Role' => $roleLabel,
                                        'Employment Type' => $profile['employment_type'] ?: 'Not assigned',
                                        'Joining Date' => !empty($profile['date_of_joining']) ? date('d M Y', strtotime($profile['date_of_joining'])) : 'Not assigned',
                                    ];
                                    ?>
                                    <?php foreach ($details as $label => $value): ?>
                                        <div class="flex items-start justify-between gap-4 py-3 first:pt-0 last:pb-0">
                                            <dt class="text-xs font-medium text-slate-500"><?= esc($label) ?></dt>
                                            <dd class="max-w-44 text-right text-xs font-semibold text-slate-800"><?= esc($value) ?></dd>
                                        </div>
                                    <?php endforeach; ?>
                                </dl>
                            </section>

                            <section class="rounded-2xl border border-sky-200 bg-sky-50 p-5 text-sm text-sky-900">
                                <div class="flex gap-3">
                                    <i data-lucide="shield-check" class="mt-0.5 h-5 w-5 shrink-0 text-sky-600"></i>
                                    <div>
                                        <p class="font-semibold">Protected account details</p>
                                        <p class="mt-2 text-xs leading-6 text-sky-800">Contact HR or an administrator to change your role, department, position, employment status, or login access.</p>
                                    </div>
                                </div>
                            </section>
                        </aside>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => session()->getFlashdata('success'),
        'toastErrors' => $validationErrors,
    ]) ?>

    <script>
        lucide.createIcons();

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }

        document.getElementById('sidebarOverlay').addEventListener('click', toggleSidebar);
    </script>
</body>
</html>
