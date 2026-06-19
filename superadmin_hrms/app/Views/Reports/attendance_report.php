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

            <div class="flex-1 overflow-y-auto p-3 sm:p-5">
                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl md:text-[28px] font-semibold text-slate-800">
                            Attendance Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Reports</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Attendance Report
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

                    <!-- Attendance Stats -->
                    <div class="xl:col-span-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 h-full">

                            <!-- Card 1 -->
                            <div class="bg-white border rounded-md p-4 md:p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div
                                        class="w-10 h-10 rounded-md border border-orange-500 text-orange-500 flex items-center justify-center">
                                        <i data-lucide="calendar-days" class="w-5 h-5"></i>
                                    </div>

                                    <div>
                                        <p class="text-xs font-semibold text-slate-500">
                                            Total Working Days
                                        </p>
                                        <h3 class="text-xl font-semibold text-slate-800">
                                            25
                                        </h3>
                                    </div>
                                </div>

                                <div class="w-full h-1.5 bg-slate-200 rounded-full mb-3">
                                    <div class="w-[85%] h-full bg-green-500 rounded-full"></div>
                                </div>

                                <p class="text-xs text-green-500">
                                    ↝ +20.01%
                                    <span class="text-slate-500">from last month</span>
                                </p>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white border rounded-md p-4 md:p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div
                                        class="w-10 h-10 rounded-md border border-blue-500 text-blue-500 flex items-center justify-center">
                                        <i data-lucide="calendar-minus" class="w-5 h-5"></i>
                                    </div>

                                    <div>
                                        <p class="text-xs font-semibold text-slate-500">
                                            Total Leave Taken
                                        </p>
                                        <h3 class="text-xl font-semibold text-slate-800">
                                            12
                                        </h3>
                                    </div>
                                </div>

                                <div class="w-full h-1.5 bg-slate-200 rounded-full mb-3">
                                    <div class="w-[85%] h-full bg-green-500 rounded-full"></div>
                                </div>

                                <p class="text-xs text-green-500">
                                    ↝ +20.01%
                                    <span class="text-slate-500">from last month</span>
                                </p>
                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white border rounded-md p-4 md:p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div
                                        class="w-10 h-10 rounded-md border border-pink-500 text-pink-500 flex items-center justify-center">
                                        <i data-lucide="calendar-heart" class="w-5 h-5"></i>
                                    </div>

                                    <div>
                                        <p class="text-xs font-semibold text-slate-500">
                                            Total Holidays
                                        </p>
                                        <h3 class="text-xl font-semibold text-slate-800">
                                            6
                                        </h3>
                                    </div>
                                </div>

                                <div class="w-full h-1.5 bg-slate-200 rounded-full mb-3">
                                    <div class="w-[85%] h-full bg-green-500 rounded-full"></div>
                                </div>

                                <p class="text-xs text-green-500">
                                    ↝ +20.01%
                                    <span class="text-slate-500">from last month</span>
                                </p>
                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white border rounded-md p-4 md:p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <div
                                        class="w-10 h-10 rounded-md border border-yellow-500 text-yellow-500 flex items-center justify-center">
                                        <i data-lucide="calendar-range" class="w-5 h-5"></i>
                                    </div>

                                    <div>
                                        <p class="text-xs font-semibold text-slate-500">
                                            Total Halfdays
                                        </p>
                                        <h3 class="text-xl font-semibold text-slate-800">
                                            5
                                        </h3>
                                    </div>
                                </div>

                                <div class="w-full h-1.5 bg-slate-200 rounded-full mb-3">
                                    <div class="w-[85%] h-full bg-green-500 rounded-full"></div>
                                </div>

                                <p class="text-xs text-green-500">
                                    ↝ +20.01%
                                    <span class="text-slate-500">from last month</span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Attendance Chart -->
                    <div class="xl:col-span-6">
                        <div class="bg-white border rounded-md shadow-sm p-6 h-full">

                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">

                                <div class="flex items-center gap-2">
                                    <i data-lucide="activity" class="w-4 h-4 text-red-500"></i>

                                    <h3 class="text-lg md:text-2xl font-semibold text-slate-800">
                                        Attendance
                                    </h3>
                                </div>

                                <select class="border rounded-md px-4 py-2 text-sm">
                                    <option>This Year</option>
                                </select>

                            </div>

                            <!-- Chart -->
                            <div class="h-[220px]">
                                <canvas id="attendanceChart"></canvas>
                            </div>

                        </div>
                    </div>

                </div>


                <!-- Employees Attendance List -->
                <div class="bg-white border rounded-md shadow">

                    <!-- Header -->
                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 p-4 border-b">

                        <h2 class="text-md font-semibold">
                            Employees Attendance
                        </h2>

                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">

                            <button class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px]">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>Present</option>
                                <option>Absent</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>Sort By : Last 7 Days</option>
                                <option>Recently Added</option>
                                <option>Ascending</option>
                                <option>Descending</option>
                                <option>Last Month</option>
                                <option>Last 7 Days</option>
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

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1200px]">

                            <thead class="bg-slate-100 h-12">

                                <tr class="text-left">

                                    <th class="px-4 text-sm">Name</th>
                                    <th class="px-4 text-sm">Date</th>
                                    <th class="px-4 text-sm">Check In</th>
                                    <th class="px-4 text-sm">Status</th>
                                    <th class="px-4 text-sm">Check Out</th>
                                    <th class="px-4 text-sm">Break</th>
                                    <th class="px-4 text-sm">Late</th>
                                    <th class="px-4 text-sm">Overtime</th>
                                    <th class="px-4 text-sm">Production Hours</th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                <!-- Row 1 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/men/1.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm leading-5">
                                                    Anthony Lewis
                                                </h4>
                                                <p class="text-xs text-slate-500">Finance</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:32 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">06:45 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">30 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">32 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">20 Min</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            8.55 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/men/2.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Brian Villalobos</h4>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">06:12 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">20 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">45 Min</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-red-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            7.54 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/women/22.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Connie Waters</h4>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">08:15 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">12 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            8.35 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/men/45.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Doglas Martini</h4>
                                                <p class="text-xs text-slate-500">Manager</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">06:43 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">23 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">10 Min</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            8.22 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 5 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/women/31.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Elliot Murray</h4>
                                                <p class="text-xs text-slate-500">Finance</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">07:13 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">32 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-blue-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            9.15 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 6 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/men/55.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Harvey Smith</h4>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">06:13 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">50 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">33 Min</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            8.45 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 7 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/women/60.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Linda Ray</h4>
                                                <p class="text-xs text-slate-500">Finance</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">07:15 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">03 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            8.32 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 8 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/women/70.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Lori Broaddus</h4>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-red-50 text-red-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                            Absent
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-red-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            0.00 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 9 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/women/18.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Rebecca Smith</h4>
                                                <p class="text-xs text-slate-500">Executive</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">09:17 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">14 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">12 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            9.25 Hrs
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 10 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                                            <img src="https://randomuser.me/api/portraits/men/68.jpg"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <div>
                                                <h4 class="font-medium text-slate-800 text-sm">Stephan Peralt</h4>
                                                <p class="text-xs text-slate-500">Executive Officer</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">09:00 AM</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-[13px] font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Present
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-sm text-slate-500">06:23 PM</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">41 Min</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-4 py-4 text-sm text-slate-500">50 Min</td>

                                    <td class="py-4 px-4">
                                        <span
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-500 text-white text-[13px] font-semibold">
                                            <i data-lucide="clock-3" class="w-3 h-3"></i>
                                            8.55 Hrs
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- Footer -->
                    <div class="flex justify-between items-center p-5 border-t">

                        <span class="text-slate-500 text-sm">
                            Showing 1 - 8 of 8 entries
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

    <!-- Chart Data -->
    <script>
        const ctx = document.getElementById('attendanceChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                datasets: [
                    {
                        label: 'Present',
                        data: [30, 65, 70, 75, 80, 95, 100, 70, 65],
                        borderColor: '#34A853',
                        backgroundColor: '#34A853',
                        borderWidth: 5,
                        tension: 0.45,
                        pointRadius: 0,
                        fill: false
                    },
                    {
                        label: 'Absent',
                        data: [30, 55, 60, 65, 50, 70, 80, 60, 70],
                        borderColor: '#E84393',
                        backgroundColor: '#E84393',
                        borderWidth: 5,
                        tension: 0.45,
                        pointRadius: 0,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,

                layout: {
                    padding: {
                        bottom: 0
                    }
                },

                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 8,
                            boxHeight: 8,
                            padding: 18,
                            font: {
                                size: 14
                            }
                        }
                    }
                },

                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        border: {
                            display: false
                        },
                        ticks: {
                            color: '#64748b',
                            font: {
                                size: 14
                            }
                        }
                    },

                    y: {
                        min: 20,
                        max: 100,
                        ticks: {
                            stepSize: 20,
                            color: '#64748b',
                            font: {
                                size: 13
                            }
                        },
                        border: {
                            display: false
                        },
                        grid: {
                            color: '#e5e7eb',
                            drawTicks: false
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>