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

            <div class="flex-1 overflow-y-auto p-3 md:p-5">
                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl md:text-[28px] font-semibold text-slate-800">
                            Leave Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Reports</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Leave Report
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">

                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-md text-sm">

                            <i data-lucide="file-down" class="w-4 h-4"></i>
                            Export
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>

                        </button>

                        <button
                            class="w-9 h-9 flex items-center justify-center bg-white border border-gray-200 rounded-md">
                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>
                        </button>

                    </div>

                </div>

                <!-- Top Section -->
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mb-6 items-stretch">

                    <!-- Stats Cards -->
                    <div class="xl:col-span-6 flex">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 w-full">

                            <!-- Card 1 -->
                            <div
                                class="bg-white border rounded-md p-4 md:p-5 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Total Leaves
                                        </p>

                                        <h3 class="text-lg md:text-xl font-semibold mt-1">
                                            800
                                        </h3>

                                        <p class="text-green-500 text-[11px] md:text-xs mt-3">
                                            ↝ +20.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-xl border border-orange-500 bg-orange-50 flex items-center justify-center text-orange-500 mt-2 mr-1">
                                        <i data-lucide="user-round" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 2 -->
                            <div
                                class="bg-white border rounded-md p-4 md:p-5 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Approved Leaves
                                        </p>

                                        <h3 class="text-lg md:text-xl font-semibold mt-1">
                                            750
                                        </h3>

                                        <p class="text-green-500 text-[11px] md:text-xs mt-3">
                                            ↝ +17.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-xl border border-green-500 bg-green-50 flex items-center justify-center text-green-500 mt-2 mr-1">
                                        <i data-lucide="user-round-check" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 3 -->
                            <div
                                class="bg-white border rounded-md p-4 md:p-5 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Pending Leaves
                                        </p>

                                        <h3 class="text-lg md:text-xl font-semibold mt-1">
                                            100
                                        </h3>

                                        <p class="text-green-500 text-[11px] md:text-xs mt-3">
                                            ↝ +10.13%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-xl border border-cyan-500 bg-cyan-50 flex items-center justify-center text-cyan-500 mt-2 mr-1">
                                        <i data-lucide="user-round-plus" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 4 -->
                            <div
                                class="bg-white border rounded-md p-4 md:p-5 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Rejected Leaves
                                        </p>

                                        <h3 class="text-lg md:text-xl font-semibold mt-1">
                                            50
                                        </h3>

                                        <p class="text-red-500 text-xs mt-3">
                                            ↝ -10.17%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-xl border border-red-500 bg-red-50 flex items-center justify-center text-red-500 mt-2 mr-1">
                                        <i data-lucide="user-round-x" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Users Chart -->
                    <div class="xl:col-span-6 flex">

                        <div class="bg-white border rounded-md shadow-sm p-4 md:p-6 flex flex-col w-full h-full">

                            <div class="flex flex-col gap-4 mb-6">

                                <div class="flex items-center gap-2">

                                    <i data-lucide="bar-chart-3" class="w-5 h-5 text-red-500"></i>
                                    <h3 class="text-2xl font-semibold text-slate-800">
                                        Leaves
                                    </h3>
                                </div>

                                <div class="flex flex-wrap items-center gap-4">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-sm bg-green-500"></span>
                                        <span class="text-sm text-slate-500">Annual</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-sm bg-yellow-400"></span>
                                        <span class="text-sm text-slate-500">Casual</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-sm bg-slate-800"></span>
                                        <span class="text-sm text-slate-500">Medical</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-sm bg-orange-500"></span>
                                        <span class="text-sm text-slate-500">Others</span>
                                    </div>

                                    <select class="border rounded-md px-4 py-2 text-sm">
                                        <option>This Year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex-1 min-h-[320px] xl:min-h-0 relative">
                                <canvas id="leavesChart"></canvas>
                            </div>
                        </div>



                    </div>
                    <div class="xl:col-span-12">

                        <!-- Leave List -->
                        <div class="bg-white border rounded-md shadow">

                            <!-- Header -->
                            <div
                                class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 p-4 border-b">

                                <h2 class="text-lg font-semibold shrink-0">
                                    Leave List
                                </h2>

                                <div
    class="flex flex-col sm:flex-row flex-wrap gap-3 w-full lg:w-auto">

                                    <button class="w-full sm:w-auto flex items-center justify-center gap-2 border rounded-md px-4 py-2 text-[13px]">
                                        <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                        09/06/2026 - 09/06/2026
                                    </button>

                                    <select class="w-full sm:w-auto border rounded-md px-4 py-2 text-[13px]">
                                        <option>Annual Leave</option>
                                        <option>Casual Leave</option>
                                        <option>Medical Leave</option>
                                    </select>

                                    <select class="w-full sm:w-auto border rounded-md px-4 py-2 text-[13px]">
                                        <option>Sort By : Last 7 Days</option>
                                    </select>

                                </div>

                            </div>

                            <!-- Controls -->
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 p-4">

                                <div class="flex items-center gap-2 text-sm">

                                    <span>Row Per Page</span>

                                    <select class="border rounded-md px-3 py-1">
                                        <option>10</option>
                                    </select>

                                    <span>Entries</span>

                                </div>

                                <input type="text" placeholder="Search"
                                    class="border text-xs rounded-md px-4 py-2 w-full md:w-40">

                            </div>

                            <div class="overflow-x-auto">
                                <!-- Table -->
                                <table class="w-full min-w-[1100px]">

                                    <thead class="bg-slate-100 h-12">
                                        <tr class="text-left">
                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                Employee
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                Leave ID
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                Leave Type
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                From Date
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                To Date
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                Total Days
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                Reason
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                Applied On
                                            </th>

                                            <th class="px-4 text-sm font-semibold text-slate-700">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 text-sm">

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/1.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Anthony Lewis</p>
                                                        <p class="text-xs text-slate-500">Finance</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-001</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Annual Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">15 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">18 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">4 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Family Vacation</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">10 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">Approved</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/2.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Sophia Carter</p>
                                                        <p class="text-xs text-slate-500">Developer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-002</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Medical Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">20 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">22 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">3 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Fever & Recovery</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">19 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-yellow-50 text-yellow-600 text-xs font-medium">Pending</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/3.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Brian Villalobos</p>
                                                        <p class="text-xs text-slate-500">Developer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-003</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Casual Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">25 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">25 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">1 Day</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Personal Work</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">24 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">Approved</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/4.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Emma Watson</p>
                                                        <p class="text-xs text-slate-500">HR Manager</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-004</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Annual Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">02 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">06 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">5 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Travel Trip</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">28 Jan 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-red-50 text-red-600 text-xs font-medium">Rejected</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/5.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Harvey Smith</p>
                                                        <p class="text-xs text-slate-500">UI Designer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-005</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Medical Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">10 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">11 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">2 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Doctor Appointment</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">09 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">Approved</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/6.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Linda Ray</p>
                                                        <p class="text-xs text-slate-500">Finance</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-006</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Casual Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">18 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">18 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">1 Day</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Family Function</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">17 Feb 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">Approved</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/7.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Michael Brown</p>
                                                        <p class="text-xs text-slate-500">Project Manager</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-007</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Annual Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">05 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">09 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">5 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Vacation</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">01 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-yellow-50 text-yellow-600 text-xs font-medium">Pending</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/8.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Rebecca Smith</p>
                                                        <p class="text-xs text-slate-500">Executive</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-008</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Medical Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">12 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">14 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">3 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Migraine</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">11 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">Approved</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/9.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Daniel Scott</p>
                                                        <p class="text-xs text-slate-500">QA Engineer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-009</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Casual Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">20 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">21 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">2 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Personal Work</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">18 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-red-50 text-red-600 text-xs font-medium">Rejected</span>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/10.jpg"
                                                        class="w-10 h-10 rounded-full">
                                                    <div>
                                                        <p class="font-medium text-slate-800">Olivia Johnson</p>
                                                        <p class="text-xs text-slate-500">Marketing</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-slate-500">LV-010</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Annual Leave</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">25 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">30 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">6 Days</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">Family Trip</td>
                                            <td class="px-4 py-4 text-sm text-slate-500">20 Mar 2026</td>
                                            <td class="px-4 py-4 text-sm text-slate-500"><span
                                                    class="px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">Approved</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <!-- Footer -->
                            <div class="flex justify-between items-center p-5 border-t">

                                <span class="text-slate-500 text-sm">
                                    Showing 1 - 10 of 10 entries
                                </span>

                                <div class="flex flex-wrap items-center gap-3">

                                    <button>
                                        <i data-lucide="chevron-left" class="text-slate-500 w-4 h-4"></i>
                                    </button>

                                    <button class="w-6 h-6 text-xs rounded-full bg-orange-500 text-white">
                                        1
                                    </button>

                                    <button class="text-3xl">
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

            const overlay = document.getElementById('sidebarOverlay');

            if (overlay) {
                overlay.addEventListener('click', function () {
                    document
                        .getElementById('sidebar')
                        .classList.add('-translate-x-full');

                    this.classList.add('hidden');
                });
            }
        </script>

        <script>
            const ctx = document.getElementById('leavesChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Jan', 'Feb', 'Mar', 'Apr',
                        'May', 'Jun', 'Jul', 'Aug',
                        'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    datasets: [
                        {
                            label: 'Annual',
                            data: [32, 40, 30, 35, 25, 25, 33, 40, 30, 35, 25, 25],
                            backgroundColor: '#22c55e',
                            stack: 'leaves'
                        },
                        {
                            label: 'Casual',
                            data: [23, 30, 25, 30, 25, 25, 22, 30, 25, 30, 25, 25],
                            backgroundColor: '#facc15',
                            stack: 'leaves'
                        },
                        {
                            label: 'Medical',
                            data: [17, 10, 18, 10, 25, 25, 17, 10, 18, 10, 25, 25],
                            backgroundColor: '#1e293b',
                            stack: 'leaves'
                        },
                        {
                            label: 'Others',
                            data: [28, 20, 27, 25, 25, 25, 28, 20, 27, 25, 25, 25],
                            backgroundColor: '#f97316',
                            stack: 'leaves'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        legend: {
                            display: false
                        }
                    },

                    scales: {
                        x: {
                            stacked: true,
                            grid: {
                                display: false
                            },
                            border: {
                                display: false
                            },
                            ticks: {
                                color: '#0f172a',
                                font: {
                                    size: 13
                                }
                            }
                        },

                        y: {
                            stacked: true,
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                stepSize: 20,
                                color: '#0f172a',
                                font: {
                                    size: 12
                                }
                            },
                            border: {
                                display: false
                            },
                            grid: {
                                color: '#e5e7eb'
                            }
                        }
                    },

                    datasets: {
                        bar: {
                            barThickness: 38,
                            borderRadius: 0
                        }
                    }
                }
            });
        </script>

</body>

</html>