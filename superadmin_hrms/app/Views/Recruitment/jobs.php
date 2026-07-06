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

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Graph JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-[#f8fafc]">
    <?php
    $jobCount = count($jobs ?? []);
    $departmentCount = count(array_unique(array_filter(array_column($jobs ?? [], 'department'))));
    $locationCount = count(array_unique(array_filter(array_column($jobs ?? [], 'location'))));
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
                            <h1 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Job Openings</h1>
                            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                                Browse all published openings across departments and locations.
                            </p>
                        </div>

                        <div class="inline-flex w-fit rounded-lg border border-slate-200 bg-white p-1 shadow-sm">
                            <a href="<?= base_url('Recruitment/jobs') ?>"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-indigo-600 text-white">
                                <i data-lucide="list" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('Recruitment/jobs-grid') ?>"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
                                <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Published Jobs</p>
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
                            <p class="text-sm font-medium text-slate-500">Locations</p>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $locationCount ?></p>
                        </div>
                    </div>

                    <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                        <div class="flex flex-col gap-4 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-5">
                            <div>
                                <h2 class="text-base font-semibold text-slate-950">Open Roles</h2>
                                <p class="mt-1 text-sm text-slate-500"><?= $jobCount ?> active listings</p>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[900px]">
                                <thead>
                                    <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase text-slate-500">
                                        <th class="px-5 py-3">Role</th>
                                        <th class="px-5 py-3">Department</th>
                                        <th class="px-5 py-3">Location</th>
                                        <th class="px-5 py-3">Salary</th>
                                        <th class="px-5 py-3">Posted</th>
                                        <th class="px-5 py-3 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                                    <?php if (!empty($jobs)): ?>
                                        <?php foreach ($jobs as $job): ?>
                                            <?php
                                            $salaryRange = (!empty($job['salary_from']) && !empty($job['salary_to']))
                                                ? '₹' . number_format($job['salary_from']) . ' - ₹' . number_format($job['salary_to'])
                                                : 'Not set';
                                            ?>
                                            <tr class="hover:bg-slate-50">
                                                <td class="px-5 py-4">
                                                    <div class="font-semibold text-slate-950"><?= esc($job['job_title']) ?></div>
                                                    <div class="mt-1 text-xs text-slate-500">
                                                        <?= esc($job['requisition_no'] ?? 'N/A') ?> · <?= esc($job['vacancies'] ?? 1) ?> openings
                                                    </div>
                                                </td>
                                                <td class="px-5 py-4"><?= esc($job['department']) ?></td>
                                                <td class="px-5 py-4"><?= esc($job['location']) ?></td>
                                                <td class="px-5 py-4"><?= esc($salaryRange) ?></td>
                                                <td class="px-5 py-4">
                                                    <?= !empty($job['published_at']) ? date('d M Y', strtotime($job['published_at'])) : 'N/A' ?>
                                                </td>
                                                <td class="px-5 py-4">
                                                    <div class="flex justify-end">
                                                        <a href="#" onclick="openViewModal(<?= esc($job['id']) ?>); return false;"
                                                            class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                                            View
                                                        </a>
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

                        <div class="border-t border-slate-200 px-5 py-3 text-sm text-slate-500">
                            Showing <?= $jobCount ?> published jobs
                        </div>
                    </section>
                </div>

                <div class="hidden">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Jobs
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Recruitment</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Jobs
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/jobs') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/jobs-grid') ?>"
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
                            Job Grid
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
                                        <?php $salaryRange = !empty($job['salary_from']) && !empty($job['salary_to']) ? '₹' . number_format($job['salary_from']) . ' - ₹' . number_format($job['salary_to']) : 'Not set'; ?>
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-4"><?= esc($job['requisition_no'] ?? 'N/A') ?></td>
                                            <td class="px-4 py-4">
                                                <div class="font-semibold text-slate-800"><?= esc($job['job_title']) ?>
                                                </div>
                                                <div class="text-xs text-slate-500"><?= esc($job['vacancies'] ?? 1) ?>
                                                    Openings</div>
                                            </td>
                                            <td class="px-4 py-4"><?= esc($job['department']) ?></td>
                                            <td class="px-4 py-4"><?= esc($job['location']) ?></td>
                                            <td class="px-4 py-4"><?= esc($salaryRange) ?></td>
                                            <td class="px-4 py-4">
                                                <?= !empty($job['published_at']) ? date('d M Y', strtotime($job['published_at'])) : 'N/A' ?>
                                            </td>
                                            <td class="px-4 py-4">
                                                <div class="flex gap-3">
                                                    <a href="#" onclick="openViewModal(<?= esc($job['id']) ?>); return false;"
                                                        class="text-slate-500 hover:text-blue-600">
                                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                                    </a>
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

                        <!-- Pagination -->
                        <div class="flex items-center justify-between p-3 border-t">

                            <p class="text-sm text-slate-600">
                                Showing 1 - 8 of 8 entries
                            </p>

                            <div class="flex items-center justify-center gap-4">

                                <button>
                                    <i data-lucide="chevron-left" class="text-slate-500 w-4 h-4"></i>
                                </button>

                                <button class="w-6 h-6 rounded-full bg-orange-500 text-white text-xs">
                                    1
                                </button>

                                <button>
                                    <i data-lucide="chevron-right" class="text-slate-500 w-4 h-4"></i>
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>


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

    <div id="viewModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

        <div class="bg-white rounded-xl shadow-2xl w-[95%] max-w-6xl max-h-[90vh] overflow-y-auto">

            <div id="viewModalContent"></div>

        </div>

    </div>
    <script>

        function openViewModal(id) {

            fetch('/Recruitment/view-job-modal/' + id)
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
