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

</head>

<body>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
        </div>

        <!-- Sidebar -->
        <?php include __DIR__ . '/sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Navbar -->
            <?php include __DIR__ . '/navbar.php'; ?>

            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto p-3 sm:p-5 bg-slate-50">

                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-xl sm:text-2xl font-semibold text-slate-800">
                            Employee Attendance
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span>Attendance</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span class="text-slate-700">Employee Attendance</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 w-full lg:w-auto">

                        <button class="w-10 h-10 rounded-md border bg-white flex items-center justify-center">
                            <i data-lucide="clock-3" class="w-4 h-4"></i>
                        </button>

                        <button class="w-10 h-10 rounded-md border bg-white flex items-center justify-center">
                            <i data-lucide="calendar-days" class="w-4 h-4"></i>
                        </button>

                        <button
                            class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-4 py-2 border rounded-md bg-white text-sm">
                            <i data-lucide="file-down" class="w-4 h-4"></i>
                            Export
                        </button>

                        <button
                            class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-md text-sm">
                            <i data-lucide="file-text" class="w-4 h-4"></i>
                            Report
                        </button>

                    </div>

                </div>

                <!-- Top Section -->

                <div class="grid grid-cols-1 xl:grid-cols-6 gap-5 mb-6">

                    <!-- Left Profile Card -->
                    <div class="bg-white rounded-lg border p-4 xl:col-span-2">

                        <div class="text-center">

                            <p class="text-slate-500 text-xs font-semibold">
                                Good Morning, Adrian
                            </p>

                            <h3 class="text-lg font-semibold text-slate-800 mt-2">
                                08:35 AM, 11 Mar 2025
                            </h3>

                            <div
                                class="w-32 h-32 rounded-full border-[5px] border-green-500 mx-auto mt-5 overflow-hidden">

                                <img src="https://i.pravatar.cc/300" class="w-full h-full object-cover">

                            </div>

                            <div
                                class="inline-block bg-orange-500 text-white px-3 py-2 rounded-md text-xs font-semibold mt-3">
                                Production : 3.45 hrs
                            </div>

                            <p class="text-slate-800 mt-4 text-sm font-semibold">
                                Punch In at 10.00 AM
                            </p>

                            <button class="w-full mt-4 py-3 bg-slate-900 text-white text-sm rounded-md font-semibold">
                                Punch Out
                            </button>

                        </div>

                    </div>

                    <!-- Right Section -->
                    <div class="xl:col-span-4 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

                        <!-- Card 1 -->
                        <div class="bg-white rounded-lg border p-5 shadow-sm">

                            <div class="w-7 h-7 rounded bg-orange-500 text-white flex items-center justify-center">
                                <i data-lucide="clock-3" class="w-4 h-4"></i>
                            </div>

                            <h2 class="text-2xl font-semibold text-slate-800 mt-3">
                                8.36
                                <span class="text-slate-400 text-lg">/ 9</span>
                            </h2>

                            <p class="text-slate-500 text-sm font-medium mt-3">
                                Total Hours Today
                            </p>

                            <hr class="my-2">

                            <div class="flex items-center gap-2 text-sm">
                                <i data-lucide="arrow-up-circle" class="w-4 h-4 text-green-500"></i>
                                <span class="text-slate-500 text-xs">5% This Week</span>
                            </div>

                        </div>

                        <!-- Card 2 -->
                        <div class="bg-white rounded-lg border p-5 shadow-sm">

                            <div class="w-7 h-7 rounded bg-slate-800 text-white flex items-center justify-center">
                                <i data-lucide="clock-3" class="w-4 h-4"></i>
                            </div>

                            <h2 class="text-2xl font-semibold text-slate-800 mt-3">
                                10
                                <span class="text-slate-400 text-lg">/ 40</span>
                            </h2>

                            <p class="text-slate-500 text-sm font-medium mt-3">
                                Total Hours Week
                            </p>

                            <hr class="my-2">

                            <div class="flex items-center gap-2 text-sm">
                                <i data-lucide="arrow-up-circle" class="w-4 h-4 text-green-500"></i>
                                <span class="text-slate-500 text-xs">7% This Week</span>
                            </div>

                        </div>

                        <!-- Card 3 -->
                        <div class="bg-white rounded-lg border p-5 shadow-sm">

                            <div class="w-7 h-7 rounded bg-blue-500 text-white flex items-center justify-center">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                            </div>

                            <h2 class="text-2xl font-semibold text-slate-800 mt-3">
                                75
                                <span class="text-slate-400 text-lg">/ 98</span>
                            </h2>

                            <p class="text-slate-500 text-sm font-medium mt-3">
                                Total Hours Month
                            </p>

                            <hr class="my-2">

                            <div class="flex items-center gap-2  text-sm">
                                <i data-lucide="arrow-down-circle" class="w-4 h-4 text-red-500"></i>
                                <span class="text-slate-500 text-xs">8% Last Month</span>
                            </div>

                        </div>

                        <!-- Card 4 -->
                        <div class="bg-white rounded-lg border p-5 shadow-sm">

                            <div class="w-7 h-7 rounded bg-pink-500 text-white flex items-center justify-center">
                                <i data-lucide="briefcase-business" class="w-4 h-4"></i>
                            </div>

                            <h2 class="text-2xl font-semibold text-slate-800 mt-3">
                                16
                                <span class="text-slate-400 text-lg">/ 28</span>
                            </h2>

                            <p class="text-slate-500 text-sm font-medium mt-3">
                                Overtime this Month
                            </p>

                            <hr class="my-2">

                            <div class="flex items-center gap-2  text-sm">
                                <i data-lucide="arrow-down-circle" class="w-4 h-4 text-red-500"></i>
                                <span class="text-slate-500 text-xs">6% Last Month</span>
                            </div>

                        </div>

                        <!-- Timeline Card -->
                        <div class="xl:col-span-4 bg-white border rounded-lg p-6 shadow-sm">

                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="w-2 h-2 rounded-full bg-slate-300"></span>
                                        <p class="text-slate-500 text-sm">
                                            Total Working hours
                                        </p>
                                    </div>

                                    <h3 class="text-xl font-semibold mt-1">
                                        12h 36m
                                    </h3>
                                </div>

                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        <p class="text-slate-500 text-sm">
                                            Productive Hours
                                        </p>
                                    </div>

                                    <h3 class="text-xl font-semibold mt-1">
                                        08h 36m
                                    </h3>
                                </div>

                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                                        <p class="text-slate-500 text-sm">
                                            Break hours
                                        </p>
                                    </div>

                                    <h3 class="text-xl font-semibold mt-1">
                                        22m 15s
                                    </h3>
                                </div>

                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                        <p class="text-slate-500 text-sm">
                                            Overtime
                                        </p>
                                    </div>

                                    <h3 class="text-xl font-semibold mt-1">
                                        02h 15m
                                    </h3>
                                </div>

                            </div>

                            <div class="overflow-x-auto lg:overflow-visible pb-2">

                                <div class="w-full bg-slate-100 rounded-lg p-2">
                                    <div class="flex items-center justify-center gap-2">

                                        <div class="h-7 w-40 bg-green-500 rounded"></div>
                                        <div class="h-7 w-16 bg-yellow-400 rounded"></div>
                                        <div class="h-7 w-56 bg-green-500 rounded"></div>
                                        <div class="h-7 w-32 bg-yellow-400 rounded"></div>
                                        <div class="h-7 w-40 bg-green-500 rounded"></div>
                                        <div class="h-7 w-12 bg-yellow-400 rounded"></div>
                                        <div class="h-7 w-12 bg-blue-500 rounded"></div>
                                        <div class="h-7 w-12 bg-blue-500 rounded"></div>

                                    </div>
                                </div>

                                <div class="flex justify-between text-xs text-slate-500 mt-4 min-w-[1100px] mx-auto">

                                    <span>06:00</span>
                                    <span>07:00</span>
                                    <span>08:00</span>
                                    <span>09:00</span>
                                    <span>10:00</span>
                                    <span>11:00</span>
                                    <span>12:00</span>
                                    <span>01:00</span>
                                    <span>02:00</span>
                                    <span>03:00</span>
                                    <span>04:00</span>
                                    <span>05:00</span>
                                    <span>06:00</span>
                                    <span>07:00</span>
                                    <span>08:00</span>
                                    <span>09:00</span>
                                    <span>10:00</span>
                                    <span>11:00</span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Attendance Table -->
                <div class="bg-white border rounded-lg shadow-sm">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 p-4   border-b">

                        <h3 class="text-lg font-semibold text-slate-800">
                            Employee Attendance
                        </h3>

                        <div class="flex flex-wrap gap-3">

                            <button class="border rounded-md px-4 py-2 text-sm bg-white">
                                06/14/2026 - 06/20/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-sm">
                                <option>Select Status</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-sm">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-3">

                        <div class="flex items-center gap-3">

                            <span class="text-sm">Row Per Page</span>

                            <select class="border rounded-md text-sm px-3 py-2">
                                <option>10</option>
                            </select>

                            <span class="text-sm">Entries</span>

                        </div>

                        <input type="text" placeholder="Search"
                            class="border rounded-md px-4 py-1  w-full md:w-[220px]">

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[1000px]">
                            <thead class="bg-slate-100 border-y border-slate-200">
                                <tr class="text-sm font-semibold text-slate-800">

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Date</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Check In</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Status</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Check Out</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Break</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Late</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Overtime</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                    <th class="px-5 py-4 text-left whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <span>Production Hours</span>
                                            <i data-lucide="arrow-up-down" class="w-4 h-4 text-slate-300 ml-2"></i>
                                        </div>
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-200 text-sm text-slate-600">

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">02 Sep 2024</td>
                                    <td class="p-4">09:12 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">09:17 PM</td>
                                    <td class="p-4">14 Min</td>
                                    <td class="p-4">12 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 8.35 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">06 Jul 2024</td>
                                    <td class="p-4">09:00 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">07:13 PM</td>
                                    <td class="p-4">32 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">75 Min</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-blue-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 9.15 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">10 Dec 2024</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-red-100 text-red-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Absent
                                        </span>
                                    </td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-red-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 0.00 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">12 Apr 2024</td>
                                    <td class="p-4">09:00 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">06:43 PM</td>
                                    <td class="p-4">23 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">10 Min</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 8.22 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">14 Jan 2024</td>
                                    <td class="p-4">09:32 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">06:45 PM</td>
                                    <td class="p-4">30 Min</td>
                                    <td class="p-4">32 Min</td>
                                    <td class="p-4">20 Min</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 8.55 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">15 Mar 2024</td>
                                    <td class="p-4">09:00 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">06:23 PM</td>
                                    <td class="p-4">41 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">50 Min</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 8.35 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">15 Nov 2024</td>
                                    <td class="p-4">09:00 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">08:15 PM</td>
                                    <td class="p-4">12 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 8.35 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">20 Apr 2024</td>
                                    <td class="p-4">09:00 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">07:15 PM</td>
                                    <td class="p-4">03 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 8.32 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">20 Feb 2024</td>
                                    <td class="p-4">09:00 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">06:13 PM</td>
                                    <td class="p-4">50 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">33 Min</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 8.45 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="p-4">21 Jan 2024</td>
                                    <td class="p-4">09:00 AM</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-100 text-green-600 px-3 py-1 rounded text-xs font-medium">
                                            ● Present
                                        </span>
                                    </td>
                                    <td class="p-4">06:12 PM</td>
                                    <td class="p-4">20 Min</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1 bg-red-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                            ⏱ 7.54 Hrs
                                        </span>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                        <div
                            class="flex flex-col sm:flex-row items-center justify-between gap-4 px-5 py-4 border-t border-slate-200">

                            <p class="text-sm text-slate-500">
                                Showing 1 - 10 of 10 entries
                            </p>

                            <div class="flex items-center gap-3">

                                <button
                                    class="w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:bg-slate-100">
                                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                </button>

                                <button class="w-8 h-8 rounded-full bg-orange-500 text-white text-sm font-medium">
                                    1
                                </button>

                                <button
                                    class="w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:bg-slate-100">
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
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

        document.getElementById('sidebarOverlay')
            .addEventListener('click', function () {
                document.getElementById('sidebar')
                    .classList.add('-translate-x-full');

                this.classList.add('hidden');
            });
    </script>

</body>