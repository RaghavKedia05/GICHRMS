<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .field-control {
            width: 100%;
            border: 1px solid rgb(203 213 225);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            color: rgb(15 23 42);
            background: white;
            outline: none;
            transition: border-color 150ms ease, box-shadow 150ms ease;
        }

        .field-control:focus {
            border-color: rgb(79 70 229);
            box-shadow: 0 0 0 4px rgb(79 70 229 / 0.12);
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-900">

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <div class="flex h-screen overflow-hidden">
        <?= $this->include('sidebar') ?>

        <div class="flex-1 flex flex-col overflow-hidden">
            <?= $this->include('navbar') ?>

            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="mx-auto max-w-7xl space-y-6">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <a href="<?= base_url('/staff') ?>"
                                class="mb-3 inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-indigo-600">
                                <i data-lucide="arrow-left" class="h-4 w-4"></i>
                                Staff Directory
                            </a>
                            <div class="flex flex-wrap items-center gap-3">
                                <h1 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Edit Staff</h1>
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700 ring-1 ring-amber-200">
                                    <i data-lucide="square-pen" class="h-3.5 w-3.5"></i>
                                    <?= esc($staff['employee_id'] ?? 'Staff') ?>
                                </span>
                            </div>
                            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                                Update staff profile, contact details, role access, and employment information.
                            </p>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            <div class="flex gap-3">
                                <i data-lucide="circle-alert" class="mt-0.5 h-5 w-5 shrink-0"></i>
                                <ul class="list-disc space-y-1 pl-4">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/staff/update/' . $staff['id']) ?>" method="POST" class="space-y-6">
                        <?= csrf_field() ?>

                        <section class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                            <div class="mb-5 flex items-center gap-3 border-b border-slate-200 pb-4">
                                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                                    <i data-lucide="id-card" class="h-5 w-5"></i>
                                </span>
                                <div>
                                    <h2 class="text-base font-semibold text-slate-950">Personal Details</h2>
                                    <p class="text-sm text-slate-500">Name, email, phone, and login credentials.</p>
                                </div>
                            </div>

                            <div class="grid gap-5 md:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Full Name</label>
                                    <input type="text" name="name" value="<?= esc(old('name', $staff['name'] ?? '')) ?>" class="field-control" required>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                                    <input type="email" name="email" value="<?= esc(old('email', $staff['email'] ?? '')) ?>" class="field-control" required>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Phone Number</label>
                                    <input type="tel" name="phone" value="<?= esc(old('phone', $staff['phone'] ?? '')) ?>" class="field-control">
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">New Password</label>
                                    <input type="password" name="password" class="field-control" placeholder="Leave blank to keep current password">
                                </div>
                            </div>
                        </section>

                        <section class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                            <div class="mb-5 flex items-center gap-3 border-b border-slate-200 pb-4">
                                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                                    <i data-lucide="briefcase-business" class="h-5 w-5"></i>
                                </span>
                                <div>
                                    <h2 class="text-base font-semibold text-slate-950">Company Details</h2>
                                    <p class="text-sm text-slate-500">Role, department, joining date, and account status.</p>
                                </div>
                            </div>

                            <div class="grid gap-5 md:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Position</label>
                                    <input type="text" name="position" value="<?= esc(old('position', $staff['position'] ?? '')) ?>" class="field-control">
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Role Access</label>
                                    <?php $selectedRole = old('role', $staff['role'] ?? 'employee'); ?>
                                    <select name="role" class="field-control" required>
                                        <option value="employee" <?= $selectedRole === 'employee' ? 'selected' : '' ?>>Employee</option>
                                        <option value="hiring_manager" <?= $selectedRole === 'hiring_manager' ? 'selected' : '' ?>>Hiring Manager</option>
                                        <option value="department_head" <?= $selectedRole === 'department_head' ? 'selected' : '' ?>>Department Head</option>
                                        <option value="hr" <?= $selectedRole === 'hr' ? 'selected' : '' ?>>HR</option>
                                        <option value="admin" <?= $selectedRole === 'admin' ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Department</label>
                                    <?php $selectedDepartment = old('department_id', $staff['department_id'] ?? ''); ?>
                                    <select name="department_id" class="field-control">
                                        <option value="">Select department</option>
                                        <?php foreach ($departments as $department): ?>
                                            <option value="<?= esc($department['id']) ?>"
                                                <?= (string) $selectedDepartment === (string) $department['id'] ? 'selected' : '' ?>>
                                                <?= esc($department['department_name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Employment Type</label>
                                    <?php $selectedEmployment = old('employment_type', $staff['employment_type'] ?? 'Full Time'); ?>
                                    <select name="employment_type" class="field-control">
                                        <option value="Full Time" <?= $selectedEmployment === 'Full Time' ? 'selected' : '' ?>>Full Time</option>
                                        <option value="Part Time" <?= $selectedEmployment === 'Part Time' ? 'selected' : '' ?>>Part Time</option>
                                        <option value="Contract" <?= $selectedEmployment === 'Contract' ? 'selected' : '' ?>>Contract</option>
                                        <option value="Internship" <?= $selectedEmployment === 'Internship' ? 'selected' : '' ?>>Internship</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Date of Joining</label>
                                    <input type="date" name="date_of_joining"
                                        value="<?= esc(old('date_of_joining', $staff['date_of_joining'] ?? '')) ?>"
                                        class="field-control">
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Account Status</label>
                                    <label class="flex h-[50px] items-center gap-3 rounded-xl border border-slate-200 px-4">
                                        <input type="checkbox" name="is_active" value="1"
                                            <?= old('is_active', (string) ($staff['is_active'] ?? 1)) ? 'checked' : '' ?>
                                            class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                        <span class="text-sm font-semibold text-slate-700">Active staff account</span>
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Address</label>
                                    <textarea name="address" rows="4" class="field-control resize-y"><?= esc(old('address', $staff['address'] ?? '')) ?></textarea>
                                </div>
                            </div>
                        </section>

                        <div class="sticky bottom-4 z-20 rounded-lg border border-slate-200 bg-white/95 p-4 shadow-[0_-8px_30px_rgba(15,23,42,0.10)] backdrop-blur sm:p-5">
                            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                                <a href="<?= base_url('/staff') ?>"
                                    class="inline-flex h-11 items-center justify-center rounded-lg border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="inline-flex h-11 items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
                                    <i data-lucide="save" class="h-4 w-4"></i>
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });
    </script>
</body>

</html>
