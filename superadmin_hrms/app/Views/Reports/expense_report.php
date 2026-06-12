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
                            Expense Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Reports</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Expense Report
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
                                        <p class="text-slate-500 text-sm">
                                            Total Expense
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $45,221
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +20.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-orange-500 flex items-center justify-center text-orange-500">
                                        <i data-lucide="receipt"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm h-[140px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 text-sm">
                                            Approved Expense
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $45,221
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +17.01%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-green-500 flex items-center justify-center text-green-500">
                                        <i data-lucide="badge-check"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm h-[140px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 text-sm">
                                            Net Pay
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $45,221.45
                                        </h3>

                                        <p class="text-green-500 text-xs mt-3">
                                            ↝ +10.13%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-cyan-500 flex items-center justify-center text-cyan-500">
                                        <i data-lucide="wallet"></i>
                                    </div>

                                </div>

                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white border rounded-md p-6 relative overflow-hidden shadow-sm h-[140px]">

                                <div class="flex justify-between">

                                    <div>
                                        <p class="text-slate-500 text-sm">
                                            Allowances
                                        </p>

                                        <h3 class="text-xl font-semibold mt-2">
                                            $45,221.45
                                        </h3>

                                        <p class="text-red-500 text-xs mt-3">
                                            ↝ -10.17%
                                            <span class="text-slate-500">
                                                from last week
                                            </span>
                                        </p>
                                    </div>

                                    <div
                                        class="w-10 h-10 rounded-full border border-red-500 flex items-center justify-center text-red-500">
                                        <i data-lucide="receipt-text"></i>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Chart -->
                    <div class="col-span-6">

                        <div class="bg-white border rounded-md p-4 shadow-sm h-[304px]">

                            <div class="flex justify-between items-center mb-6">

                                <h3 class="font-semibold text-xl">
                                    Expense
                                </h3>

                                <select class="text-xs border rounded-md px-2 py-2">
                                    <option>This Year</option>
                                </select>

                            </div>

                            <div class="h-[220px]">
                                <canvas id="expenseChart" class="mb-2"></canvas>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Expense List -->
                <div class="bg-white border rounded-md shadow">

                    <!-- Header -->
                    <div class="flex justify-between items-center p-4 border-b">

                        <h2 class="text-md font-semibold">
                            Expense List
                        </h2>

                        <div class="flex items-center gap-4">

                            <button class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px]">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px]">
                                <option>$0.00-$00</option>
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

                                <th class="px-4 text-sm">Expense Name</th>
                                <th class="px-4 text-sm">Date</th>
                                <th class="px-4 text-sm">Payment Method</th>
                                <th class="px-4 text-sm">Amount</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Online Course</td>
                                <td class="py-3 px-4 text-sm text-slate-500">14 Jan 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cash</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$3000</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Travel</td>
                                <td class="py-3 px-4 text-sm text-slate-500">20 Feb 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cheque</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$2800</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Office Supplies</td>
                                <td class="py-3 px-4 text-sm text-slate-500">15 Mar 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cash</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$3300</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Welcome Kit</td>
                                <td class="py-3 px-4 text-sm text-slate-500">12 Apr 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cheque</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$3600</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Equipment</td>
                                <td class="py-3 px-4 text-sm text-slate-500">20 Apr 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cheque</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$2000</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Miscellaneous</td>
                                <td class="py-3 px-4 text-sm text-slate-500">06 Jul 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cash</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$3400</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Payroll</td>
                                <td class="py-3 px-4 text-sm text-slate-500">02 Sep 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cheque</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$4000</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Cafeteria</td>
                                <td class="py-3 px-4 text-sm text-slate-500">15 Nov 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cash</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$4500</td>
                            </tr>

                            <tr class="border-t">
                                <td class="py-3 px-4 text-sm text-slate-500"><input type="checkbox"></td>
                                <td class="py-3 px-4 text-sm text-slate-800 font-semibold">Cleaning Supplies</td>
                                <td class="py-3 px-4 text-sm text-slate-500">10 Dec 2024</td>
                                <td class="py-3 px-4 text-sm text-slate-500">Cheque</td>
                                <td class="py-3 px-4 text-sm text-slate-500">$3800</td>
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
        const ctx = document.getElementById('expenseChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    data: [10000, 30000, 18000, 15000, 22000, 30000, 40000, 50000, 40000, 40000, 60000, 62000],
                    borderColor: '#f59e0b',
                    backgroundColor: 'rgba(245,158,11,0.15)',
                    fill: true,
                    tension: 0.4
                }]
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
                        grid: {
                            display: false
                        },
                        border: {
                            display: false
                        }
                    },

                    y: {
                        beginAtZero: false,
                        border: {
                            display: false
                        },
                        ticks: {
                            stepSize: 10000
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