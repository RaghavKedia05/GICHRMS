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

            <div class="flex-1 overflow-y-auto p-4 md:p-5">
                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 mb-6">

                    <div>
                        <h1 class="text-[28px] font-semibold text-2xl text-slate-800">
                            Daily Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Reports</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Daily Report
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
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mb-6">

                    <!-- Stats Cards -->
                    <div class="xl:col-span-6">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 w-full">

                            <!-- Card 1 -->
                            <div class="bg-white border rounded-md p-5 relative overflow-hidden shadow-sm h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Total Present
                                        </p>

                                        <h3 class="text-xl font-semibold mt-1">
                                            300
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +20.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-orange-500 bg-orange-50 flex items-center justify-center text-orange-500 mt-2 mr-1">
                                        <i data-lucide="user-round" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white border rounded-md p-5 relative overflow-hidden shadow-sm h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Completed Tasks
                                        </p>

                                        <h3 class="text-xl font-semibold mt-1">
                                            100
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +17.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-green-500 bg-green-50 flex items-center justify-center text-green-500 mt-2 mr-1">
                                        <i data-lucide="user-round-check" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white border rounded-md p-5 relative overflow-hidden shadow-sm h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Total Absent
                                        </p>

                                        <h3 class="text-xl font-semibold mt-1">
                                            15
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +10.13%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-red-500 bg-red-50 flex items-center justify-center text-red-500 mt-2 mr-1">
                                        <i data-lucide="user-round-x" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white border rounded-md p-5 relative overflow-hidden shadow-sm h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Pending Tasks
                                        </p>

                                        <h3 class="text-xl font-semibold mt-1">
                                            125
                                        </h3>

                                        <p class="text-red-500 text-xs mt-3">
                                            ↝ -10.17%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-cyan-500 bg-cyan-50 flex items-center justify-center text-cyan-500 mt-2 mr-1">
                                        <i data-lucide="user-round-x" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Users Chart -->
                    <div class="xl:col-span-6">
                        <div class="bg-white border rounded-md shadow-sm p-4 md:p-6">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-4">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="activity" class="w-5 h-5 text-red-500"></i>
                                    <h3 class="text-2xl font-semibold text-slate-800">
                                        Daily Attendance
                                    </h3>
                                </div>

                                <select class="border rounded-md px-4 py-2 text-sm">
                                    <option>This Year</option>
                                </select>
                            </div>

                            <div class="h-[220px] sm:h-[180px]">
                                <canvas id="attendanceChart"></canvas>
                            </div>
                        </div>



                    </div>
                    <div class="xl:col-span-12">

                        <!-- Leave List -->
                        <div class="bg-white border rounded-md shadow">

                            <!-- Header -->
                            <div
                                class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 p-4 border-b">

                                <h2 class="text-md font-semibold">
                                    Daily Attendance List
                                </h2>

                                <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">

                                    <button
                                        class="flex items-center justify-center gap-2 border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                        <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                        09/06/2026 - 09/06/2026
                                    </button>

                                    <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                        <option>Present</option>
                                        <option>Absent</option>
                                    </select>

                                    <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
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
                                    class="border text-xs rounded-md px-4 py-2 w-full md:w-52">

                            </div>

                            <div class="overflow-x-auto">
                                <!-- Table -->
                                <table class="w-full min-w-[700px]">

                                    <thead class="bg-slate-100 h-12">
                                        <tr class="text-left">
                                            <th class="px-4 text-sm font-semibold">Employee</th>
                                            <th class="px-4 text-sm font-semibold">Date</th>
                                            <th class="px-4 text-sm font-semibold">Department</th>
                                            <th class="px-4 text-sm font-semibold">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200">

                                        <!-- Row 1 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/32.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Brian Villalobos
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Developer
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Application Development
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 2 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/22.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Connie Waters
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Developer
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Administration
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 3 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/45.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Doglas Martini
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Manager
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Sales
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 4 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/31.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Elliot Murray
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Finance
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Account Management
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 5 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/55.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Harvey Smith
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Developer
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                IT Management
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 6 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/60.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Linda Ray
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Finance
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                UI / UX
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 7 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/70.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Lori Broaddus
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Developer
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Business Development
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-red-50 text-red-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Absent
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 8 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/women/18.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Rebecca Smith
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Executive
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Marketing
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 9 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/68.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Stephan Peralt
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Executive Officer
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Web Development
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Row 10 -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4">
                                                <div class="flex flex-wrap items-center gap-3">
                                                    <img src="https://randomuser.me/api/portraits/men/1.jpg"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>
                                                        <h4 class="text-sm font-medium text-slate-800">
                                                            Anthony Lewis
                                                        </h4>
                                                        <p class="text-xs text-slate-500">
                                                            Finance
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                14 Jan 2024
                                            </td>

                                            <td class="px-4 py-4 text-sm text-slate-500">
                                                Finance
                                            </td>

                                            <td class="px-4 py-4">
                                                <span
                                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-green-50 text-green-600 text-xs font-medium">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                                    Present
                                                </span>
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
            const attendanceCtx = document.getElementById('attendanceChart');

            new Chart(attendanceCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [
                        {
                            label: 'Present',
                            data: [60, 40, 30, 20, 70],
                            borderColor: '#4CAF50',
                            backgroundColor: '#4CAF50',
                            tension: 0.45,
                            borderWidth: 5,
                            pointRadius: 0,
                            fill: false
                        },
                        {
                            label: 'Absent',
                            data: [20, 60, 45, 60, 80],
                            borderColor: '#EF5A4C',
                            backgroundColor: '#EF5A4C',
                            tension: 0.45,
                            borderWidth: 5,
                            pointRadius: 0,
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'center',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'rect',
                                boxWidth: 10,
                                boxHeight: 10,
                                padding: 20,
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
                                color: '#0f172a',
                                font: {
                                    size: 13
                                }
                            }
                        },

                        y: {
                            min: 0,
                            max: 100,
                            ticks: {
                                stepSize: 25,
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
                    }
                }
            });
        </script>

</body>

</html>