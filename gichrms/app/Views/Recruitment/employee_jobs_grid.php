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
            <div class="flex-1 overflow-y-auto p-4 sm:p-5">
                <div class="mx-auto max-w-7xl space-y-6">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <h1 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Career Opportunities</h1>
                            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                                Explore roles in a card layout and apply directly.
                            </p>
                        </div>

                        <div class="inline-flex w-fit rounded-lg border border-slate-200 bg-white p-1 shadow-sm">
                            <a href="<?= base_url('Recruitment/employee-jobs') ?>"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
                                <i data-lucide="list" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('Recruitment/employee-jobs-grid') ?>"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-indigo-600 text-white">
                                <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <p class="text-sm font-medium text-slate-500">Open Jobs</p>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $jobCount ?></p>
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

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <?php if (!empty($jobs)): ?>
                            <?php foreach ($jobs as $job): ?>
                                <?php
                                $salary = (!empty($job['salary_from']) && !empty($job['salary_to']))
                                    ? 'Rs. ' . number_format($job['salary_from']) . ' - Rs. ' . number_format($job['salary_to'])
                                    : 'Not set';
                                $hasApplied = in_array($job['id'], $appliedIds ?? []);
                                ?>
                                <article class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex min-w-0 gap-3">
                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                                                <i data-lucide="briefcase-business" class="h-5 w-5"></i>
                                            </div>
                                            <div class="min-w-0">
                                                <h2 class="truncate text-base font-semibold text-slate-950"><?= esc($job['job_title'] ?? 'Untitled Job') ?></h2>
                                                <p class="mt-1 text-xs font-medium text-slate-500"><?= esc($job['requisition_no'] ?? 'N/A') ?></p>
                                            </div>
                                        </div>
                                        <?php if ($hasApplied): ?>
                                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200">Applied</span>
                                        <?php else: ?>
                                            <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700 ring-1 ring-sky-200">Open</span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mt-5 grid gap-3 text-sm text-slate-600">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="building-2" class="h-4 w-4 text-slate-400"></i>
                                            <?= esc($job['department'] ?? 'Department') ?>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="map-pin" class="h-4 w-4 text-slate-400"></i>
                                            <?= esc($job['location'] ?? 'Location not set') ?>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="indian-rupee" class="h-4 w-4 text-slate-400"></i>
                                            <?= esc($salary) ?>
                                        </div>
                                    </div>

                                    <div class="mt-5 flex flex-wrap items-center justify-between gap-2 border-t border-slate-100 pt-4">
                                        <button type="button" onclick="openViewModal(<?= esc($job['id']) ?>)"
                                            class="inline-flex h-9 items-center justify-center gap-2 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                                            <i data-lucide="eye" class="h-4 w-4"></i>
                                            View
                                        </button>
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
                                </article>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-full rounded-lg border border-slate-200 bg-white p-10 text-center text-slate-500">
                                No published jobs available yet.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="hidden">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Jobs
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-xs sm:text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Recruitment</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Jobs List
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/employee-jobs') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/employee-jobs-grid') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>



                <!-- Jobs List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">

                    <!-- Header -->
                    <div class="p-5 border-b">


                        <h3 class="text-l font-semibold text-slate-800">
                            Job Grid
                        </h3>

                    </div>


                </div>

                <!-- Jobs Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-3">

                    <?php if (!empty($jobs)): ?>
                        <?php foreach ($jobs as $job): ?>
                            <?php
                            $applicants = !empty($job['vacancies']) ? $job['vacancies'] . ' Openings' : '1 Openings';
                            $salary = 'Rs. 0 - Rs. 0';
                            if (!empty($job['salary_from']) && !empty($job['salary_to'])) {
                                $salary = 'Rs. ' . number_format($job['salary_from']) . ' - Rs. ' . number_format($job['salary_to']);
                            } elseif (!empty($job['salary_from'])) {
                                $salary = 'Rs. ' . number_format($job['salary_from']);
                            }
                            $jobTitle = $job['job_title'] ?? $job['title'] ?? 'Untitled Job';
                            ?>

                            <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm hover:shadow-md transition">

                                <!-- Header -->
                                <div class="border border-slate-200 rounded-lg p-4 mb-5 bg-slate-50">
                                    <div class="flex items-center gap-4">

                                        <div class="w-10 h-10 flex items-center justify-center">
                                            <i data-lucide="briefcase-business" class="w-7 h-7 text-slate-700"></i>
                                        </div>

                                        <div>
                                            <h3 class="font-semibold text-slate-800">
                                                <?= esc($jobTitle) ?>
                                            </h3>

                                            <p class="text-sm text-slate-500">
                                                <?= esc($applicants) ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>

                                <!-- Details -->
                                <div class="space-y-3 text-sm text-slate-700">

                                    <div class="flex items-center gap-2">
                                        <i data-lucide="map-pin" class="w-4 h-4 text-slate-500"></i>
                                        <span><?= esc($job['location'] ?? 'Head Office') ?></span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <i data-lucide="indian-rupee" class="w-4 h-4 text-slate-500"></i>
                                        <span><?= esc($salary) ?></span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <i data-lucide="briefcase" class="w-4 h-4 text-slate-500"></i>
                                        <span><?= esc($job['experience'] ?? '2 Years Experience') ?></span>
                                    </div>

                                </div>

                                <!-- Tags -->
                                <div class="flex gap-2 mt-5">

                                    <span class="px-2 py-1 text-xs rounded bg-pink-100 text-pink-600">
                                        Full Time
                                    </span>

                                    <span class="px-2 py-1 text-xs rounded bg-sky-100 text-sky-700">
                                        Expert
                                    </span>

                                </div>

                                <!-- Progress -->
                                <div class="mt-5">

                                    <div class="h-1.5 bg-slate-200 rounded-full">
                                        <div class="h-full w-2/5 bg-amber-400 rounded-full"></div>
                                    </div>

                                    <p class="text-sm text-slate-500 mt-2">
                                        10 of 25 filled
                                    </p>

                                </div>

                                <!-- Actions -->
                                <div class="flex justify-end gap-3 mt-4 pt-4 border-t border-slate-100">

                                    <button type="button" onclick="openViewModal(<?= esc($job['id']) ?>)"
                                        class="text-slate-500 hover:text-blue-600">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </button>

                                </div>

                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div
                            class="col-span-1 xl:col-span-4 bg-white border border-slate-200 rounded-lg p-8 text-center text-slate-500">
                            No published jobs available yet.
                        </div>
                    <?php endif; ?>

                </div>
                </div>

            </div>
        </div>
    </div>

    <div id="viewModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[200]">

        <div class="bg-white rounded-xl shadow-2xl w-[95%] max-w-6xl max-h-[90vh] overflow-y-auto [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

            <div id="viewModalContent"></div>

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

</html>
