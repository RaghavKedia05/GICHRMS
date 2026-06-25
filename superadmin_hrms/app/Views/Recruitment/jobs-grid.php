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
                        <a href="<?= base_url('Recruitment/jobs') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/jobs-grid') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                        <!-- Export -->
                        <button
                            class="flex items-center justify-center gap-2 px-3 py-2 text-xs sm:text-sm bg-white border border-slate-200 rounded-md">
                            <i data-lucide="file-down" class="w-4 h-4"></i>

                            Export

                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>

                        <!-- Add Plan -->
                        <button onclick="openAddJobModal()"
                            class="flex items-center justify-center gap-2 px-3 py-2 text-xs sm:text-sm bg-orange-500 text-white rounded-md font-medium">

                            <i data-lucide="plus-circle" class="w-4 h-4"></i>

                            Post Job
                        </button>

                        <!-- Scroll Top -->
                        <button
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center">
                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>
                        </button>

                    </div>

                </div>



                <!-- Jobs List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b">


                        <h3 class="text-l font-semibold text-slate-800">
                            Job Grid
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 w-full lg:w-auto">

                            <button
                                class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto" ">
                                <option>Select Role</option>
                            </select>

                            <select class=" border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Select Status</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>


                </div>

                <!-- Jobs Section -->
                <?php
                $jobs = [
                    [
                        'id' => 'Job-001',
                        'title' => 'Senior IOS Developer',
                        'applicants' => '25 Applicants',
                        'category' => 'Software',
                        'location' => 'New York, USA',
                        'salary' => '30,000 - 35,000 / month',
                        'date' => '12 Sep 2024'
                    ],
                    [
                        'id' => 'Job-002',
                        'title' => 'Junior PHP Developer',
                        'applicants' => '20 Applicants',
                        'category' => 'Software',
                        'location' => 'Los Angeles, USA',
                        'salary' => '20,000 - 25,000 / month',
                        'date' => '24 Oct 2024'
                    ],
                    [
                        'id' => 'Job-003',
                        'title' => 'Junior PHP Developer',
                        'applicants' => '20 Applicants',
                        'category' => 'Software',
                        'location' => 'Los Angeles, USA',
                        'salary' => '20,000 - 25,000 / month',
                        'date' => '24 Oct 2024'
                    ],
                    [
                        'id' => 'Job-004',
                        'title' => 'Junior React Developer',
                        'applicants' => '35 Applicants',
                        'category' => 'Software',
                        'location' => 'Bristol, UK',
                        'salary' => '30,000 - 35,000 / month',
                        'date' => '18 Feb 2024'
                    ],
                    [
                        'id' => 'Job-005',
                        'title' => 'Senior Laravel Developer',
                        'applicants' => '40 Applicants',
                        'category' => 'Software',
                        'location' => 'Washington, USA',
                        'salary' => '32,000 - 36,000 / month',
                        'date' => '20 Jul 2024'
                    ],
                    [
                        'id' => 'Job-006',
                        'title' => 'DevOps Engineer',
                        'applicants' => '20 Applicants',
                        'category' => 'Software',
                        'location' => 'Coventry, UK',
                        'salary' => '25,000 - 35,000 / month',
                        'date' => '10 Apr 2024'
                    ],
                    [
                        'id' => 'Job-007',
                        'title' => 'Junior Android Developer',
                        'applicants' => '25 Applicants',
                        'category' => 'Software',
                        'location' => 'Chicago, USA',
                        'salary' => '28,000 - 32,000 / month',
                        'date' => '29 Aug 2024'
                    ],
                    [
                        'id' => 'Job-008',
                        'title' => 'Senior HTML Developer',
                        'applicants' => '35 Applicants',
                        'category' => 'Software',
                        'location' => 'Carlisle, UK',
                        'salary' => '25,000 - 28,000 / month',
                        'date' => '22 Feb 2024'
                    ],
                    [
                        'id' => 'Job-009',
                        'title' => 'Junior UI/UX Designer',
                        'applicants' => '20 Applicants',
                        'category' => 'Software',
                        'location' => 'Lancaster, UK',
                        'salary' => '20,000 - 25,000 / month',
                        'date' => '03 Nov 2024'
                    ],
                    [
                        'id' => 'Job-010',
                        'title' => 'Senior Graphic Designer',
                        'applicants' => '25 Applicants',
                        'category' => 'Software',
                        'location' => 'San Diego, USA',
                        'salary' => '22,000 - 28,000 / month',
                        'date' => '17 Dec 2024'
                    ]
                ];
                ?>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-3">

                    <?php foreach ($jobs as $job): ?>

                        <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm hover:shadow-md transition">

                            <!-- Header -->
                            <div class="border border-slate-200 rounded-lg p-4 mb-5 bg-slate-50">
                                <div class="flex items-center gap-4">

                                    <div class="w-10 h-10 flex items-center justify-center">
                                        <i data-lucide="briefcase-business" class="w-7 h-7 text-slate-700"></i>
                                    </div>

                                    <div>
                                        <h3 class="font-semibold text-slate-800">
                                            <?= $job['title'] ?>
                                        </h3>

                                        <p class="text-sm text-slate-500">
                                            <?= $job['applicants'] ?>
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <!-- Details -->
                            <div class="space-y-3 text-sm text-slate-700">

                                <div class="flex items-center gap-2">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-slate-500"></i>
                                    <span><?= $job['location'] ?></span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <i data-lucide="indian-rupee" class="w-4 h-4 text-slate-500"></i>
                                    <span><?= $job['salary'] ?></span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <i data-lucide="briefcase" class="w-4 h-4 text-slate-500"></i>
                                    <span>2 Years Experience</span>
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

                                <button class="text-slate-500 hover:text-blue-600">
                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                </button>

                                <button class="text-slate-500 hover:text-red-600">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>
        </div>
    </div>

    <?= $this->include('Recruitment/post_job') ?>

    <script>
        function openAddJobModal() {
            document.getElementById('addJobModal').classList.remove('hidden');
            document.getElementById('addJobModal').classList.add('flex');
        }

        function closeAddJobModal() {
            document.getElementById('addJobModal').classList.add('hidden');
            document.getElementById('addJobModal').classList.remove('flex');
        }
    </script>


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

</body>