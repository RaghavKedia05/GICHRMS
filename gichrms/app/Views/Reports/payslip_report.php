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

            <div class="flex-1 overflow-y-auto p-5">
                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 mb-6">

                    <div>
                        <h1 class="text-[28px] font-semibold text-2xl text-slate-800">
                            Payslip Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Reports</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Payslip Report
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

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 w-full h-full">

                            <!-- Card 1 -->
                            <div
                                class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Total Payroll
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $250,000
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
                                        <i data-lucide="wallet" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 2 -->
                            <div
                                class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Deductions
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $50,000
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
                                        <i data-lucide="badge-minus" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 3 -->
                            <div
                                class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Net Pay
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $200,000
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
                                        <i data-lucide="banknote" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 4 -->
                            <div
                                class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm min-h-[120px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 font-semibold text-sm">
                                            Allowances
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $30,000
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
                                        <i data-lucide="gift" class="w-4 h-4"></i>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Chart -->
                    <div class="xl:col-span-6 flex">
                        <div class="bg-white border rounded-md shadow-sm p-4 md:p-6 flex flex-col w-full h-full">

                            <!-- Header -->
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="badge-dollar-sign" class="w-4 h-4 text-red-500"></i>

                                    <h3 class="text-2xl font-semibold text-slate-800">
                                        Payroll
                                    </h3>
                                </div>

                                <select class="border rounded-md px-4 py-2 text-sm">
                                    <option>This Year</option>
                                </select>
                            </div>

                            <!-- Chart -->
                            <div class="flex-1 min-h-[250px]">
                                <canvas id="payrollChart"></canvas>
                            </div>

                        </div>
                    </div>


                </div>

                <!-- Employees List -->
                <div class="bg-white border rounded-md shadow">

                    <!-- Header -->
                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 p-4 border-b">

                        <h2 class="text-md font-semibold">
                            Payslip List
                        </h2>

                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 p-4 border-b">

                            <button
                                class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>$0.00 - $00</option>
                                <option>$3800</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Cash</option>
                                <option>Cheque</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
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

                    <div class="overflow-x-auto">
                        <!-- Table -->
                        <table class="w-full min-w-[700px]">

                            <thead class="bg-slate-100 h-12">

                                <tr class="text-left">

                                    <th class="py-3 px-4">
                                        <input type="checkbox">
                                    </th>

                                    <th class="px-4 text-sm">Name</th>
                                    <th class="px-4 text-sm">Paid Amount</th>
                                    <th class="px-4 text-sm">Paid Month</th>
                                    <th class="px-4 text-sm">Paid Year</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=1" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Anthony Lewis</p>
                                                <p class="text-xs text-slate-500">Finance</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3000</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3000</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3000</td>
                                </tr>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=5" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm text-sm">Brian Villalobos
                                                </p>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2500</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2500</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2500</td>
                                </tr>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=33" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Connie Waters</p>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2800</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2800</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2800</td>
                                </tr>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=23" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Doglas Martini</p>
                                                <p class="text-xs text-slate-500">Manager</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3300</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3300</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3300</td>
                                </tr>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=12" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Elliot Murray</p>
                                                <p class="text-xs text-slate-500">Finance</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3600</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3600</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3600</td>
                                </tr>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=47" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Harvey Smith</p>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2000</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2000</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$2000</td>
                                </tr>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=31" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Linda Ray</p>
                                                <p class="text-xs text-slate-500">Finance</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3400</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3400</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$3400</td>
                                </tr>

                                <tr class="border-b hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=14" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Lori Broaddus</p>
                                                <p class="text-xs text-slate-500">Developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$4000</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$4000</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$4000</td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="py-3 px-4"><input type="checkbox"></td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=9" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800 text-sm">Rebecca Smith</p>
                                                <p class="text-xs text-slate-500">Executive</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$4500</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$4500</td>
                                    <td class="py-3 px-4 text-slate-600 text-sm">$4500</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                    <!-- Footer -->
                    <div class="flex justify-between items-center p-5 border-t">

                        <span class="text-slate-500 text-sm">
                            Showing 1 - 9 of 9 entries
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

   
    <script>
        const ctx = document.getElementById('payrollChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr',
                    'May', 'Jun', 'Jul', 'Aug',
                    'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'series-1',
                    data: [22, 20, 30, 45, 55, 45, 20, 70, 25, 30, 10, 30],

                    borderColor: '#f97356',
                    borderWidth: 5,
                    stepped: true,
                    fill: false,

                    pointRadius: 0,
                    pointHoverRadius: 4,
                    pointBackgroundColor: '#f97356',
                    pointBorderColor: '#f97356'
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                interaction: {
                    mode: 'index',
                    intersect: false
                },

                plugins: {
                    legend: {
                        display: false
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
                            color: '#e5e7eb'
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>