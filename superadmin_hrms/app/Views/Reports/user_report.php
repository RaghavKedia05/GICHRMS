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

    <div class="flex h-screen">

        <!-- Sidebar -->
        <?php include __DIR__ . '/../sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col">

            <!-- Navbar -->
            <?php include __DIR__ . '/../navbar.php'; ?>

            <div class="p-5">
                <!-- Header -->
                <div class="flex justify-between items-start mb-6">

                    <div>
                        <h1 class="text-[28px] font-semibold text-2xl text-slate-800">
                            User Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Reports</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                User Report
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">

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
                <div class="grid grid-cols-12 gap-6 mb-6">

                    <!-- Stats Cards -->
                    <div class="col-span-6">

                        <div class="grid grid-cols-2 gap-6 w-full">

                            <!-- Card 1 -->
                            <div class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm h-[140px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Total Users
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            800
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +20.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-9 h-9 rounded-xl border border-orange-500 bg-orange-50 flex items-center justify-center text-orange-500">
                                        <i data-lucide="user" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm h-[140px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Active Users
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            750
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +17.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-9 h-9 rounded-xl border border-green-500 bg-green-50 flex items-center justify-center text-green-500 text-xs">
                                        <i data-lucide="user-round-check" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm h-[140px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            New Users
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            100
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +10.13%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-9 h-9 rounded-xl border border-cyan-500 bg-cyan-50 flex items-center justify-center text-cyan-500">
                                        <i data-lucide="user-round-plus" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm h-[140px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Inactive Users
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
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
                                        class="w-9 h-9 rounded-xl border border-red-500 bg-red-50 flex items-center justify-center text-red-500">
                                        <i data-lucide="user-round-x" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Users Chart -->
                    <div class="col-span-6">
                        <div class="bg-white border rounded-md shadow-sm p-6 h-[304px]">

                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">

                                <div class="flex items-center gap-2">
                                    <i data-lucide="bar-chart-3" class="w-4 h-4 text-red-500"></i>
                                    <h3 class="text-2xl font-semibold text-slate-800">
                                        Users
                                    </h3>
                                </div>

                                <div class="flex items-center gap-6">

                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 bg-green-500 rounded-sm"></span>
                                        <span class="text-sm text-slate-500">
                                            Active Users
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 bg-slate-100 border rounded-sm"></span>
                                        <span class="text-sm text-slate-500">
                                            Inactive Users
                                        </span>
                                    </div>

                                    <select class="border rounded-md px-4 py-2 text-sm">
                                        <option>This Year</option>
                                    </select>

                                </div>

                            </div>

                            <!-- Chart -->
                            <div class="h-[180px]">
                                <canvas id="usersChart"></canvas>
                            </div>

                        </div>
                    </div>



                </div>

                <!-- Expense List -->
                <div class="bg-white border rounded-md shadow">

                    <!-- Header -->
                    <div class="flex justify-between items-center p-4 border-b">

                        <h2 class="text-md font-semibold">
                            User List
                        </h2>

                        <div class="flex items-center gap-4">

                            <button class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px]">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>Employee</option>
                                <option>Client</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>Cheque</option>
                                <option>Cash</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                    <!-- Controls -->
                    <div class="flex justify-between items-center p-4">

                        <div class="flex items-center gap-2 text-sm">

                            <span>Row Per Page</span>

                            <select class="border rounded-md px-3 py-1">
                                <option>10</option>
                            </select>

                            <span>Entries</span>

                        </div>

                        <input type="text" placeholder="Search" class="border text-xs rounded-md px-4 py-2 w-40">

                    </div>

                    <!-- Table -->
                    <table class="w-full">

                        <thead class="bg-slate-100">

                            <tr class="text-left">

                                <th class="py-3 px-4">
                                    <input type="checkbox">
                                </th>

                                <th class="px-4 text-sm">Name</th>
                                <th class="px-4 text-sm">Email</th>
                                <th class="px-4 text-sm">Created Date</th>
                                <th class="px-4 text-sm">Role</th>
                                <th class="px-4 text-sm">Status</th>

                            </tr>

                        </thead>

                        <tbody>

                        <tbody>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=11" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Anthony Lewis</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">anthony@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">12 Sep 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-pink-100 text-pink-500">Employee</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=12" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Brian Villalobos</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">brian@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">24 Oct 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-pink-100 text-pink-500">Employee</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=5" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Sophie Headrick</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">sophie@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">18 Feb 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-purple-100 text-purple-500">Client</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=14" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Stephan Peralt</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">peral@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">17 Oct 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-pink-100 text-pink-500">Employee</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=31" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Thomas Bordelon</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">thomas@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">20 Jul 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-purple-100 text-purple-500">Client</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=25" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Doglas Martini</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">martiniwr@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">10 Apr 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-pink-100 text-pink-500">Employee</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=12" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Cameron Drake</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">cameron@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">29 Aug 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-purple-100 text-purple-500">Client</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=18" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Harvey Smith</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">harvey@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">22 Feb 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-pink-100 text-pink-500">Employee</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-red-500 text-white">● Inactive</span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=1" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Michael Walker</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">michael@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">03 Nov 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-purple-100 text-purple-500">Client</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50">
                                <td class="px-5 py-4"><input type="checkbox"></td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=23" class="w-7 h-7 rounded-full">
                                        <p class="font-medium text-slate-800 text-sm"">Doris Crowley</p>
                                    </div>
                                </td>
                                <td class=" px-5 py-4 text-sm text-slate-500">doris@example.com
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-500">17 Dec 2024</td>
                                <td class="px-5 py-4">
                                    <span
                                        class="px-2 py-1 text-[11px] rounded bg-purple-100 text-purple-500">Client</span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="px-3 py-1 text-[11px] rounded bg-green-500 text-white">● Active</span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    <!-- Footer -->
                    <div class="flex justify-between items-center p-5 border-t">

                        <span class="text-slate-500 text-sm">
                            Showing 1 - 9 of 9 entries
                        </span>

                        <div class="flex items-center gap-3">

                            <button>
                                <i data-lucide="chevron-left"></i>
                            </button>

                            <button class="w-6 h-6 text-xs rounded-full bg-orange-500 text-white">
                                1
                            </button>

                            <button class="text-3xl">
                                <i data-lucide="chevron-right"></i>
                            </button>

                        </div>

                    </div>

                </div>








            </div>
        </div>
    </div>



    <script>
        lucide.createIcons();
    </script>

    <script>
        const usersCtx = document.getElementById('usersChart');

        new Chart(usersCtx, {
            type: 'bar',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr',
                    'May', 'Jun', 'Jul', 'Aug',
                    'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'Active Users',
                    data: [35, 45, 55, 22, 14, 44, 34, 24, 67, 67, 58, 30],
                    backgroundColor: '#16d487',
                    borderRadius: 0,

                    // Controls bar width
                    categoryPercentage: 0.65,
                    barPercentage: 0.55
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                },

                layout: {
                    padding: {
                        top: 10,
                        bottom: 10,
                        left: 10,
                        right: 10
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
                        beginAtZero: true,
                        max: 80,
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
                            color: '#e5e7eb',
                            drawBorder: false
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>