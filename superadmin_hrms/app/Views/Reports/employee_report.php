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
                            Employee Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Reports</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Employee Report
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
                                            Total Employees
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
                                            Active Employees
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
                                            New Employees
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
                                            Inactive Employees
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

                    <div class="col-span-6">
                        <div class="bg-white border rounded-md shadow-sm p-6 h-[304px]">

                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">

                                <div class="flex items-center gap-2">
                                    <i data-lucide="bar-chart-3" class="w-4 h-4 text-red-500"></i>
                                    <h3 class="text-2xl font-semibold text-slate-800">
                                        Employee
                                    </h3>
                                </div>

                                <div class="flex items-center gap-6">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 bg-green-500 rounded-sm"></span>
                                        <span class="text-sm text-slate-500">
                                            Active Employees
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 bg-slate-100 border rounded-sm"></span>
                                        <span class="text-sm text-slate-500">
                                            Inactive Employees
                                        </span>
                                    </div>

                                    <select class="border rounded-md px-4 py-2 text-sm">
                                        <option>This Year</option>
                                    </select>
                                </div>

                            </div>

                            <!-- Chart -->
                            <div class="h-[150px]">
                                <canvas id="employeeChart"></canvas>
                            </div>

                        </div>
                    </div>



                </div>

                <!-- Employees List -->
                <div class="bg-white border rounded-md shadow">

                    <!-- Header -->
                    <div class="flex justify-between items-center p-4 border-b">

                        <h2 class="text-md font-semibold">
                            Employees List
                        </h2>

                        <div class="flex items-center gap-4">

                            <button class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px]">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>Present</option>
                                <option>Absent</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>Active</option>
                                <option>Inactive</option>
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

                        <thead class="bg-slate-100 h-12">

                            <tr class="text-left">
                                <th class="px-4 text-sm">Emp ID</th>
                                <th class="px-4 text-sm">Name</th>
                                <th class="px-4 text-sm">Email</th>
                                <th class="px-4 text-sm">Department</th>
                                <th class="px-4 text-sm">Phone</th>
                                <th class="px-4 text-sm">Joining Date</th>
                                <th class="px-4 text-sm">Status</th>

                            </tr>

                        </thead>

                        <tbody>

                        <tbody>

                        <tbody>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-007</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=32"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm text-sm">Elliot Murray</p>
                                            <p class="text-xs text-slate-500">Finance</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">murray@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">Account Management</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(102) 8480 832</td>
                                <td class="px-4 py-4 text-sm text-slate-500">29 Aug 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-green-500 text-white">
                                        Active
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-002</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=12"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm">Brian Villalobos</p>
                                            <p class="text-xs text-slate-500">Developer</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">brian@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">Application Development</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(179) 7382 829</td>
                                <td class="px-4 py-4 text-sm text-slate-500">24 Oct 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-green-500 text-white">
                                        Active
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-008</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=47"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm">Rebecca Smith</p>
                                            <p class="text-xs text-slate-500">Executive</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">smith@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">Marketing</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(162) 8920 713</td>
                                <td class="px-4 py-4 text-sm text-slate-500">22 Feb 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-red-500 text-white">
                                        Inactive
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-005</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=15"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm">Doglas Martini</p>
                                            <p class="text-xs text-slate-500">Manager</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">martiniwr@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">Sales</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(183) 9302 890</td>
                                <td class="px-4 py-4 text-sm text-slate-500">20 Jul 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-green-500 text-white">
                                        Active
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-003</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=24"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm">Harvey Smith</p>
                                            <p class="text-xs text-slate-500">Developer</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">harvey@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">IT Management</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(184) 2719 738</td>
                                <td class="px-4 py-4 text-sm text-slate-500">18 Feb 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-green-500 text-white">
                                        Active
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-004</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=25"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm">Stephan Peralt</p>
                                            <p class="text-xs text-slate-500">Executive Officer</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">peral@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">Web Development</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(193) 7839 748</td>
                                <td class="px-4 py-4 text-sm text-slate-500">17 Oct 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-green-500 text-white">
                                        Active
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-010</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=5"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm">Lori Broaddus</p>
                                            <p class="text-xs text-slate-500">Developer</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">broaddus@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">Business Development</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(168) 8392 823</td>
                                <td class="px-4 py-4 text-sm text-slate-500">17 Dec 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-green-500 text-white">
                                        Active
                                    </span>
                                </td>
                            </tr>

                            <tr class="border-b border-slate-200 hover:bg-slate-50">
                                <td class="px-4 py-4 text-sm text-slate-600">Emp-001</td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://i.pravatar.cc/40?img=1"
                                            class="w-8 h-8 rounded-full object-cover">
                                        <div>
                                            <p class="font-medium text-slate-800 text-sm">Anthony Lewis</p>
                                            <p class="text-xs text-slate-500">Finance</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-sm text-slate-500">anthony@example.com</td>
                                <td class="px-4 py-4 text-sm text-slate-500">Finance</td>
                                <td class="px-4 py-4 text-sm text-slate-500">(123) 4567 890</td>
                                <td class="px-4 py-4 text-sm text-slate-500">12 Sep 2024</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-[11px] font-medium rounded bg-green-500 text-white">
                                        Active
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                        </tbody>

                    </table>

                    <!-- Footer -->
                    <div class="flex justify-between items-center p-5 border-t">

                        <span class="text-slate-500 text-sm">
                            Showing 1 - 8 of 8 entries
                        </span>

                        <div class="flex items-center gap-3">

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
    </script>

    <script>
        const employeeCtx = document.getElementById('employeeChart');

        new Chart(employeeCtx, {
            type: 'bar',
            data: {
                labels: [
                    'Feb', 'Mar', 'Apr', 'May',
                    'Jun', 'Jul', 'Aug', 'Sep', 'Oct'
                ],
                datasets: [
                    {
                        label: 'Active Employees',
                        data: [50, 55, 58, 56, 62, 58, 64, 60, 66],
                        backgroundColor: '#22c55e',
                        borderRadius: 0,
                        barThickness: 18
                    },
                    {
                        label: 'Inactive Employees',
                        data: [75, 85, 100, 95, 86, 102, 90, 112, 94],
                        backgroundColor: '#e5e7eb',
                        borderRadius: 0,
                        barThickness: 18
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
                        stacked: false,
                        grid: {
                            display: false
                        },
                        border: {
                            display: false
                        },
                        ticks: {
                            color: '#334155',
                            font: {
                                size: 12
                            }
                        }
                    },

                    y: {
                        beginAtZero: true,
                        max: 150,
                        ticks: {
                            stepSize: 50,
                            color: '#334155',
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