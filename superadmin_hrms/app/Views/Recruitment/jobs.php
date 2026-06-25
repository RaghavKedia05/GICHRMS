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
            <div class="flex-1 overflow-y-auto p-4 lg:p-5">
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

                        <!-- Export -->
                        <button
                            class="flex items-center justify-center gap-2 px-3 py-2 text-xs sm:text-sm bg-white border border-slate-200 rounded-md">
                            <i data-lucide="file-down" class="w-4 h-4"></i>

                            Export

                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>

                        <!-- Add Job -->
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

                <!-- Packages List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b">

                        <h3 class="text-l font-semibold text-slate-800">
                            Job List
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

                    <!-- Controls -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5">

                        <div class="flex flex-wrap items-center gap-2 w-full lg:w-auto">

                            <span class="text-sm">
                                Row Per Page
                            </span>

                            <select class="border rounded-md px-3 py-1 text-sm">
                                <option>10</option>
                            </select>

                            <span class="text-sm">
                                Entries
                            </span>

                        </div>

                        <input type="text" placeholder="Search"
                            class="border border-slate-200 rounded-md px-4 py-2 text-[13px] w-full md:w-[220px]">

                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px]">

                            <thead>

                                <tr class="bg-[#f1f5f9] h-10">

                                    <th class="w-12 text-center">
                                        <input type="checkbox" id="selectAll" class="px-4 py-3 w-4 h-4">
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Job ID
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Job Title
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Category
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

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-001</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Senior IOS Developer</div>
                                        <div class="text-xs text-slate-500">25 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">New York, USA</td>
                                    <td class="px-4 py-4">30,000 - 35,000 / month</td>
                                    <td class="px-4 py-4">12 Sep 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-002</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Junior PHP Developer</div>
                                        <div class="text-xs text-slate-500">20 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Los Angeles, USA</td>
                                    <td class="px-4 py-4">20,000 - 25,000 / month</td>
                                    <td class="px-4 py-4">24 Oct 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-003</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Junior PHP Developer</div>
                                        <div class="text-xs text-slate-500">20 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Los Angeles, USA</td>
                                    <td class="px-4 py-4">20,000 - 25,000 / month</td>
                                    <td class="px-4 py-4">24 Oct 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-004</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Junior React Developer</div>
                                        <div class="text-xs text-slate-500">35 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Bristol, UK</td>
                                    <td class="px-4 py-4">30,000 - 35,000 / month</td>
                                    <td class="px-4 py-4">18 Feb 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-005</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Senior Laravel Developer</div>
                                        <div class="text-xs text-slate-500">40 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Washington, USA</td>
                                    <td class="px-4 py-4">32,000 - 36,000 / month</td>
                                    <td class="px-4 py-4">20 Jul 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-006</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">DevOps Engineer</div>
                                        <div class="text-xs text-slate-500">20 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Coventry, UK</td>
                                    <td class="px-4 py-4">25,000 - 35,000 / month</td>
                                    <td class="px-4 py-4">10 Apr 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-007</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Junior Android Developer</div>
                                        <div class="text-xs text-slate-500">25 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Chicago, USA</td>
                                    <td class="px-4 py-4">28,000 - 32,000 / month</td>
                                    <td class="px-4 py-4">29 Aug 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-008</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Senior HTML Developer</div>
                                        <div class="text-xs text-slate-500">35 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Carlisle, UK</td>
                                    <td class="px-4 py-4">25,000 - 28,000 / month</td>
                                    <td class="px-4 py-4">22 Feb 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-009</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Junior UI/UX Designer</div>
                                        <div class="text-xs text-slate-500">20 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">Lancaster, UK</td>
                                    <td class="px-4 py-4">20,000 - 25,000 / month</td>
                                    <td class="px-4 py-4">03 Nov 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" class="rowCheckbox rounded border-slate-300">
                                    </td>
                                    <td class="px-4 py-4">Job-010</td>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-slate-800">Senior Graphic Designer</div>
                                        <div class="text-xs text-slate-500">25 Applicants</div>
                                    </td>
                                    <td class="px-4 py-4">Software</td>
                                    <td class="px-4 py-4">San Diego, USA</td>
                                    <td class="px-4 py-4">22,000 - 28,000 / month</td>
                                    <td class="px-4 py-4">17 Dec 2024</td>
                                    <td class="px-4 py-4">
                                        <div class="flex gap-3">
                                            <button><i data-lucide="pencil" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

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
        const selectAll = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');

        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });

        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', function () {
                const allChecked =
                    [...rowCheckboxes].every(c => c.checked);

                selectAll.checked = allChecked;
            });
        });
    </script>


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

</body>