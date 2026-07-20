<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin HRMS</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body class="bg-[#f8fafc]">
    <?php
    $jobCount = count($jobs ?? []);
    $appliedCount = count($appliedIds ?? []);
    $departmentCount = count(array_unique(array_filter(array_column($jobs ?? [], 'department'))));
    $totalOpenings = array_sum(array_map(static fn($job) => (int) ($job['vacancies'] ?? 0), $jobs ?? []));
    ?>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
    </div>

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <?php include __DIR__ . '/../sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Navbar -->
            <?php include __DIR__ . '/../navbar.php'; ?>


            <!-- Page Content -->
            <div class="flex-1 overflow-y-auto p-4 lg:p-5">
                <div class="mx-auto max-w-7xl space-y-6">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <h1 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Career Opportunities</h1>
                            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                                Discover open roles and apply to opportunities that match your profile.
                            </p>
                        </div>

                        <div class="inline-flex w-fit rounded-lg border border-slate-200 bg-white p-1 shadow-sm">
                            <a href="<?= base_url('Recruitment/employee-jobs') ?>"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-indigo-600 text-white">
                                <i data-lucide="list" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('Recruitment/employee-jobs-grid') ?>"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
                                <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Open Jobs</p>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $jobCount ?></p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Open Positions</p>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $totalOpenings ?></p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Departments</p>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $departmentCount ?></p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Applied</p>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $appliedCount ?></p>
                        </div>
                    </div>

                    <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                        <div class="flex flex-col gap-4 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-5">
                            <div>
                                <h2 class="text-base font-semibold text-slate-950">Available Roles</h2>
                                <p class="mt-1 text-sm text-slate-500">Track what you have viewed and applied for.</p>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[940px]">
                                <thead>
                                    <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase text-slate-500">
                                        <th class="px-5 py-3">Role</th>
                                        <th class="px-5 py-3">Department</th>
                                        <th class="px-5 py-3">Location</th>
                                        <th class="px-5 py-3">Salary</th>
                                        <th class="px-5 py-3">Posted</th>
                                        <th class="px-5 py-3 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                                    <?php if (!empty($jobs)): ?>
                                        <?php foreach ($jobs as $job): ?>
                                            <?php
                                            $salaryRange = (!empty($job['salary_from']) && !empty($job['salary_to']))
                                                ? 'Rs. ' . number_format($job['salary_from']) . ' - Rs. ' . number_format($job['salary_to'])
                                                : 'Not set';
                                            $hasApplied = in_array($job['id'], $appliedIds ?? []);
                                            ?>
                                            <tr class="hover:bg-slate-50">
                                                <td class="px-5 py-4">
                                                    <div class="font-semibold text-slate-950"><?= esc($job['job_title']) ?></div>
                                                    <div class="mt-1 text-xs text-slate-500">
                                                        <?= esc($job['requisition_no'] ?? 'N/A') ?> - <?= esc($job['vacancies'] ?? 1) ?> openings
                                                    </div>
                                                </td>
                                                <td class="px-5 py-4"><?= esc($job['department']) ?></td>
                                                <td class="px-5 py-4"><?= esc($job['location']) ?></td>
                                                <td class="px-5 py-4"><?= esc($salaryRange) ?></td>
                                                <td class="px-5 py-4">
                                                    <?= !empty($job['published_at']) ? date('d M Y', strtotime($job['published_at'])) : 'N/A' ?>
                                                </td>
                                                <td class="px-5 py-4">
                                                    <div class="flex justify-end gap-2">
                                                        <a href="#" onclick="openViewModal(<?= esc($job['id']) ?>); return false;"
                                                            class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                                            View
                                                        </a>
                                                        <?php if ($hasApplied): ?>
                                                            <button class="inline-flex h-9 items-center justify-center rounded-lg bg-emerald-50 px-3 text-sm font-semibold text-emerald-700 ring-1 ring-emerald-200" disabled>
                                                                Applied
                                                            </button>
                                                        <?php else: ?>
                                                            <a href="<?= base_url('Recruitment/apply-job/' . $job['id']) ?>"
                                                                class="inline-flex h-9 items-center justify-center rounded-lg bg-indigo-600 px-3 text-sm font-semibold text-white hover:bg-indigo-700">
                                                                Apply
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="px-5 py-12 text-center text-slate-500">
                                                No published jobs available yet.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>

                <div class="hidden">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Career Opportunities
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Recruitment</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Career Opportunities
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/employee-jobs') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/employee-jobs-grid') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>

                <!-- Packages List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">
                    <!-- Header -->
                    <div class="p-5 border-b">


                        <h3 class="text-l font-semibold text-slate-800">
                            Career Opportunities
                        </h3>

                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px]">

                            <thead>

                                <tr class="bg-[#f1f5f9] h-10">

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Job ID
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Job Title
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Department
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Location
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Salary Range
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Posted Date
                                    </th>

                                    <th class="p-4"></th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">

                                <?php if (!empty($jobs)): ?>

                                    <?php foreach ($jobs as $job): ?>

                                        <?php
                                        $salaryRange = (!empty($job['salary_from']) && !empty($job['salary_to']))
                                            ? 'Rs. ' . number_format($job['salary_from']) . ' - Rs. ' . number_format($job['salary_to'])
                                            : 'Not set';
                                        ?>

                                        <tr class="hover:bg-slate-50">

                                            <!-- Job ID -->
                                            <td class="px-4 py-4">
                                                <?= esc($job['requisition_no'] ?? 'N/A') ?>
                                            </td>

                                            <!-- Job Title -->
                                            <td class="px-4 py-4">
                                                <div class="font-semibold text-slate-800">
                                                    <?= esc($job['job_title']) ?>
                                                </div>

                                                <div class="text-xs text-slate-500">
                                                    <?= esc($job['vacancies'] ?? 1) ?> Openings
                                                </div>
                                            </td>

                                            <!-- Department -->
                                            <td class="px-4 py-4">
                                                <?= esc($job['department']) ?>
                                            </td>

                                            <!-- Location -->
                                            <td class="px-4 py-4">
                                                <?= esc($job['location']) ?>
                                            </td>

                                            <!-- Salary -->
                                            <td class="px-4 py-4">
                                                <?= esc($salaryRange) ?>
                                            </td>

                                            <!-- Published Date -->
                                            <td class="px-4 py-4">
                                                <?= !empty($job['published_at'])
                                                    ? date('d M Y', strtotime($job['published_at']))
                                                    : 'N/A'; ?>
                                            </td>

                                            <!-- Actions -->
                                            <td class="px-4 py-4">
                                                <div class="flex items-center gap-3">

                                                    <!-- View -->
                                                    <a href="#" onclick="openViewModal(<?= $job['id'] ?>); return false;"
                                                        class="w-9 h-9 rounded-lg border border-slate-200 flex items-center justify-center hover:bg-slate-100 transition">

                                                        <i data-lucide="eye" class="w-4 h-4 text-slate-600"></i>

                                                    </a>

                                                    <!-- Apply Button -->                                                    

                                                    <?php if (in_array($job['id'], $appliedIds ?? [])): ?>

                                                        <button
                                                            class="px-4 py-2 rounded-md bg-green-600 text-white text-sm font-semibold cursor-not-allowed shadow-sm"
                                                            disabled>
                                                            Applied
                                                        </button>

                                                    <?php else: ?>

                                                        <a href="<?= base_url('Recruitment/apply-job/' . $job['id']) ?>"
                                                            class="inline-block px-4 py-2 rounded-md bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold transition shadow-sm">
                                                            Apply
                                                        </a>

                                                    <?php endif; ?>



                                                </div>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>

                                        <td colspan="7" class="px-4 py-8 text-center text-slate-500">

                                            No published jobs available yet.

                                        </td>

                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                        <div class="p-3 border-t">
                            <p class="text-sm text-slate-600">
                                Showing <?= count($jobs ?? []) ?> career opportunit<?= count($jobs ?? []) === 1 ? 'y' : 'ies' ?>
                            </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => session()->getFlashdata('success'),
        'toastError' => session()->getFlashdata('error'),
    ]) ?>


    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        document
            .getElementById('sidebarOverlay')
            .addEventListener('click', function () {

                document
                    .getElementById('sidebar')
                    .classList.add('-translate-x-full');

                this.classList.add('hidden');
            });
    </script>

    <div id="viewModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[200]">

        <div class="bg-white rounded-xl shadow-2xl w-[95%] max-w-6xl max-h-[90vh] overflow-y-auto [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

            <div id="viewModalContent"></div>

        </div>

    </div>
    <script>

        function openViewModal(id) {

            fetch("<?= base_url('Recruitment/view-job-modal') ?>/" + id)
                .then(response => response.text())
                .then(html => {

                    document.getElementById('viewModalContent').innerHTML = html;

                    document.getElementById('viewModal').classList.remove('hidden');
                    document.getElementById('viewModal').classList.add('flex');

                    if (window.lucide) {
                        lucide.createIcons();
                    }
                });
        }

        function closeViewModal() {

            document.getElementById('viewModal').classList.add('hidden');
            document.getElementById('viewModal').classList.remove('flex');

            document.getElementById('viewModalContent').innerHTML = '';
        }
    </script>

</body>
