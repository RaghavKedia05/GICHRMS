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
                        <h1 class="text-[28px] font-semibold text-slate-800">
                            Invoice Report
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span>Reports</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span class="text-slate-700">Invoice Report</span>
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

                <!-- Top Cards + Chart -->
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mb-6">

                    <!-- Cards -->
                    <!-- Stats Cards -->
                    <div class="xl:col-span-7">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">

                            <!-- Card 1 -->
                            <div class="bg-white border rounded-md shadow-sm min-h-[92px] px-5 py-4 relative">

                                <div class="absolute left-0 top-3 bottom-3 w-1 bg-pink-500 rounded-r"></div>

                                <div class="flex justify-between items-center h-full gap-3">

                                    <div>
                                        <p class="text-[14px] text-slate-500">Total Invoice</p>
                                        <h3
                                            class="text-2xl sm:text-[30px] font-semibold text-slate-800 leading-none mt-2">
                                            600
                                        </h3>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

                                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded font-semibold">
                                            +19.01%
                                        </span>

                                        <div
                                            class="w-9 h-9 border border-orange-500 rounded-xl flex items-center justify-center text-orange-500">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white border rounded-md shadow-sm min-h-[92px] px-5 py-4 relative">

                                <div class="absolute left-0 top-3 bottom-3 w-1 bg-yellow-400 rounded-r"></div>

                                <div class="flex justify-between items-center h-full gap-3">

                                    <div>
                                        <p class="text-[14px] text-slate-500">Partially Paid</p>
                                        <h3
                                            class="text-2xl sm:text-[30px] font-semibold text-slate-800 leading-none mt-2">
                                            80
                                        </h3>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

                                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded font-semibold">
                                            +19.01%
                                        </span>

                                        <div
                                            class="w-9 h-9 border border-orange-500 rounded-xl flex items-center justify-center text-orange-500">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white border rounded-md shadow-sm min-h-[92px] px-5 py-4 relative">

                                <div class="absolute left-0 top-3 bottom-3 w-1 bg-green-500 rounded-r"></div>

                                <div class="flex justify-between items-center h-full gap-3">

                                    <div>
                                        <p class="text-[14px] text-slate-500">Paid Invoices</p>
                                        <h3
                                            class="text-2xl sm:text-[30px] font-semibold text-slate-800 leading-none mt-2">
                                            450
                                        </h3>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

                                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded font-semibold">
                                            +19.01%
                                        </span>

                                        <div
                                            class="w-9 h-9 border border-orange-500 rounded-xl flex items-center justify-center text-orange-500">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white border rounded-md shadow-sm min-h-[92px] px-5 py-4 relative">

                                <div class="absolute left-0 top-3 bottom-3 w-1 bg-purple-500 rounded-r"></div>

                                <div class="flex justify-between items-center h-full gap-3">

                                    <div>
                                        <p class="text-[14px] text-slate-500">Overdue Invoices</p>
                                        <h3
                                            class="text-2xl sm:text-[30px] font-semibold text-slate-800 leading-none mt-2">
                                            40
                                        </h3>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

                                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded font-semibold">
                                            +19.01%
                                        </span>

                                        <div
                                            class="w-9 h-9 border border-orange-500 rounded-xl flex items-center justify-center text-orange-500">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Card 5 -->
                            <div class="bg-white border rounded-md shadow-sm min-h-[92px] px-5 py-4 relative">

                                <div class="absolute left-0 top-3 bottom-3 w-1 bg-red-500 rounded-r"></div>

                                <div class="flex justify-between items-center h-full gap-3">

                                    <div>
                                        <p class="text-[14px] text-slate-500">Unpaid Invoices</p>
                                        <h3
                                            class="text-2xl sm:text-[30px] font-semibold text-slate-800 leading-none mt-2">
                                            150
                                        </h3>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

                                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded font-semibold">
                                            +19.01%
                                        </span>

                                        <div
                                            class="w-9 h-9 border border-orange-500 rounded-xl flex items-center justify-center text-orange-500">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Card 6 -->
                            <div class="bg-white border rounded-md shadow-sm min-h-[92px] px-5 py-4 relative">

                                <div class="absolute left-0 top-3 bottom-3 w-1 bg-cyan-500 rounded-r"></div>

                                <div class="flex justify-between items-center h-full gap-3">

                                    <div>
                                        <p class="text-[14px] text-slate-500">Revenue</p>
                                        <h3
                                            class="text-2xl sm:text-[30px] font-semibold text-slate-800 leading-none mt-2">
                                            $25,340
                                        </h3>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

                                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded font-semibold">
                                            +19.01%
                                        </span>

                                        <div
                                            class="w-9 h-9 border border-orange-500 rounded-xl flex items-center justify-center text-orange-500">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Chart -->
                    <div class="xl:col-span-5">

                        <div class="bg-white border rounded-md shadow-sm p-5 min-h-[340px] xl:h-[324px]">

                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-5">

                                <div class="flex items-center gap-2">
                                    <i data-lucide="badge-dollar-sign" class="w-4 h-4 text-pink-500"></i>

                                    <h3 class="font-semibold text-[22px] text-slate-800">
                                        Expense
                                    </h3>
                                </div>

                                <select class="border rounded-md px-4 py-2 text-sm">
                                    <option>This Year</option>
                                </select>

                            </div>

                            <div class="h-[260px] sm:h-[240px]">
                                <canvas id="invoiceChart"></canvas>
                            </div>

                        </div>

                    </div>

                    <!-- Invoice Table -->
                    <div class="xl:col-span-12 bg-white border rounded-md shadow overflow-hidden">

                        <!-- Header -->
                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 p-4 border-b">

                            <h2 class="text-md font-semibold">
                                Invoice List
                            </h2>

                            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">

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
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 p-4">

                            <div class="flex items-center gap-2 text-sm">

                                <span>Row Per Page</span>

                                <select class="border rounded-md px-3 py-1">
                                    <option>10</option>
                                </select>

                                <span>Entries</span>

                            </div>

                            <input type="text" placeholder="Search"
                                class="border text-xs rounded-md px-4 py-2 w-full sm:w-40">

                        </div>

                        <div class="overflow-x-auto">
                        <!-- Table -->
                        <table class="w-full min-w-[1100px]">

                            <thead class="bg-slate-100">

                                <tr class="text-left">

                                    <th class="py-3 px-4">
                                        <input type="checkbox">
                                    </th>

                                    <th class="px-4 text-sm">Invoice ID</th>
                                    <th class="px-4 text-sm">Client Name</th>
                                    <th class="px-4 text-sm">Company Name</th>
                                    <th class="px-4 text-sm">Created Date</th>
                                    <th class="px-4 text-sm">Due Date</th>
                                    <th class="px-4 text-sm">Amount</th>
                                    <th class="px-4 text-sm">Status</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-001</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=1" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Michael Walker</p>
                                                <p class="text-xs text-slate-500">CEO</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">BrightWave Innovations</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">14 Jan 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">15 Jan 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$3000</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-green-100 text-green-600">Approved</span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-002</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=5" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Sophie Headrick</p>
                                                <p class="text-xs text-slate-500">Manager</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Stellar Dynamics</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">21 Jan 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">25 Jan 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$2500</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-yellow-100 text-yellow-600">Pending</span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-003</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=12" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Cameron Drake</p>
                                                <p class="text-xs text-slate-500">Director</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Quantum Nexus</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">20 Feb 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">22 Feb 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$2800</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-red-100 text-red-600">Rejected</span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-004</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=23" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Doris Crowley</p>
                                                <p class="text-xs text-slate-500">Consultant</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">EcoVision Enterprises</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">15 Mar 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">17 Mar 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$3300</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-yellow-100 text-yellow-600">Pending
                                        </span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-005</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=31" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Thomas Bordelon</p>
                                                <p class="text-xs text-slate-500">Manager</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Aurora Technologies</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">12 Apr 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">16 Apr 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$3600</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-green-100 text-green-600">Approved
                                        </span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-006</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=15" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Kathleen Gutierrez</p>
                                                <p class="text-xs text-slate-500">Director</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">BlueSky Ventures</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">20 Apr 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">21 Apr 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$2000</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-green-100 text-green-600">Approved</span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-007</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=47" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Bruce Wright</p>
                                                <p class="text-xs text-slate-500">CEO</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">TerraFusion Energy</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">06 Jul 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">06 Jul 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$3400</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-yellow-100 text-yellow-600">Pending</span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-008</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=33" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Estelle Morgan</p>
                                                <p class="text-xs text-slate-500">Manager</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">UrbanPulse Design</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">02 Sep 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">04 Sep 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$4000</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-green-100 text-green-600">Approved</span>
                                    </td>
                                </tr>

                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-009</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=9" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Stephen Dias</p>
                                                <p class="text-xs text-slate-500">CEO</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Nimbus Networks</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">15 Nov 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">15 Nov 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$4500</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-red-100 text-red-600">Rejected</span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50">
                                    <td class="px-5 py-3"><input type="checkbox"></td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Inv-010</td>
                                    <td class="px-5 py-3">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <img src="https://i.pravatar.cc/40?img=14" class="w-8 h-8 rounded-full">
                                            <div>
                                                <p class="font-medium text-slate-800">Angela Thomas</p>
                                                <p class="text-xs text-slate-500">Consultant</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500">Epicurean Delights</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">10 Dec 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">11 Dec 2024</td>
                                    <td class="px-5 py-3 text-sm text-slate-500">$3800</td>
                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2.5 py-1 text-[11px] rounded bg-green-100 text-green-600">Approved</span>
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
            const ctx = document.getElementById('invoiceChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [
                        {
                            label: 'Total Invoices',
                            data: [40000, 30000, 40000, 30000, 40000, 30000],
                            borderColor: '#ec4899',
                            backgroundColor: 'rgba(236,72,153,0.18)',
                            fill: true,
                            tension: 0
                        },
                        {
                            label: 'Paid Invoices',
                            data: [20000, 10000, 20000, 10000, 20000, 10000],
                            borderColor: '#fb923c',
                            backgroundColor: 'rgba(251,146,60,0.15)',
                            fill: true,
                            tension: 0
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true
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
                            }
                        },

                        y: {
                            min: 10000,
                            max: 40000,
                            ticks: {
                                stepSize: 5000
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