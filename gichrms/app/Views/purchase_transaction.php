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

    <div
        id="sidebarOverlay"
        class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
    </div>

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <?php include __DIR__ . '/sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Navbar -->
            <?php include __DIR__ . '/navbar.php'; ?>

            <!-- Page Content -->
            <div class="flex-1 overflow-y-auto p-5">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 m-4 lg:m-4 lg:m-6">

                    <div>

                        <h1 class="text-2xl font-semibold text-slate-800">
                            Purchase Transaction
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">

                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Super Admin</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Purchase Transaction List
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
                            class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-md">

                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>

                        </button>

                    </div>

                </div>

                <!-- Subscription List -->
                <div class="bg-white rounded-md border border-gray-200 mt-6">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b">

                        <h3 class="text-l font-semibold text-slate-800">
                            Transaction List
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 w-full lg:w-auto">

                            <!-- Date -->
                            <button class="flex items-center gap-2 border rounded-md px-4 py-2 text-xs w-full sm:w-auto">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                08/06/2026 - 08/06/2026
                            </button>

                            <!-- Plan -->
                            <select class="border rounded-md px-4 py-1 p-2 text-xs">
                                <option>Select Plan</option>
                            </select>

                            <!-- Status -->
                            <select class="border rounded-md px-4 py-1 p-2 text-xs">
                                <option>Select Status</option>
                            </select>

                            <!-- Sort -->
                            <select class="border rounded-md px-4 py-1 p-2 text-xs">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                    <!-- Table Top Controls -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5">

                        <div class="flex items-center gap-3">

                            <span class="text-sm text-slate-700">
                                Row Per Page
                            </span>

                            <select class="border rounded-md px-3 py-1 text-sm">
                                <option>10</option>
                            </select>

                            <span class="text-sm text-slate-700">
                                Entries
                            </span>

                        </div>

                        <input type="text" placeholder="Search" class="border rounded-md px-4 py-1 text-xs w-[170px]">

                    </div>

                    <div class="overflow-x-auto">

                        <!-- Table -->
                        <div class="overflow-x-auto">

                            <table class="w-full min-w-[1100px]">

                                <thead>
                                    <tr class="bg-slate-100 border-b text-sm font-semibold text-slate-800">

                                        <th class="p-4 w-10">
                                            <input type="checkbox">
                                        </th>

                                        <th class="p-4 text-left">Invoice ID</th>

                                        <th class="p-4 text-left">Customer</th>

                                        <th class="p-4 text-left">Email</th>

                                        <th class="p-4 text-left">Created Date</th>

                                        <th class="p-4 text-left">Amount</th>

                                        <th class="p-4 text-left">Payment Method</th>

                                        <th class="p-4 text-left">Status</th>

                                        <th class="p-4 w-32"></th>

                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-slate-200 bg-white text-sm">

                                    <!-- INV001 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV001</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">BrightWave Innovations</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">michael@example.com</td>
                                        <td class="px-4 text-slate-500">12 Sep 2024</td>
                                        <td class="px-4 text-slate-500">$200</td>
                                        <td class="px-4 text-slate-500">Credit Card</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV002 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV002</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">Stellar Dynamics</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">sophie@example.com</td>
                                        <td class="px-4 text-slate-500">24 Oct 2024</td>
                                        <td class="px-4 text-slate-500">$600</td>
                                        <td class="px-4 text-slate-500">Paypal</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV003 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV003</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">Quantum Nexus</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">cameron@example.com</td>
                                        <td class="px-4 text-slate-500">18 Feb 2024</td>
                                        <td class="px-4 text-slate-500">$200</td>
                                        <td class="px-4 text-slate-500">Debit Card</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV004 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV004</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">EcoVision Enterprises</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">doris@example.com</td>
                                        <td class="px-4 text-slate-500">17 Oct 2024</td>
                                        <td class="px-4 text-slate-500">$200</td>
                                        <td class="px-4 text-slate-500">Paypal</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV005 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV005</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">Aurora Technologies</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">thomas@example.com</td>
                                        <td class="px-4 text-slate-500">20 Jul 2024</td>
                                        <td class="px-4 text-slate-500">$400</td>
                                        <td class="px-4 text-slate-500">Credit Card</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV006 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV006</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">BlueSky Ventures</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">kathleen@example.com</td>
                                        <td class="px-4 text-slate-500">10 Apr 2024</td>
                                        <td class="px-4 text-slate-500">$200</td>
                                        <td class="px-4 text-slate-500">Paypal</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV007 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV007</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">TerraFusion Energy</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">bruce@example.com</td>
                                        <td class="px-4 text-slate-500">29 Aug 2024</td>
                                        <td class="px-4 text-slate-500">$4800</td>
                                        <td class="px-4 text-slate-500">Credit Card</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV008 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV008</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">UrbanPulse Design</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">estelle@example.com</td>
                                        <td class="px-4 text-slate-500">22 Feb 2024</td>
                                        <td class="px-4 text-slate-500">$50</td>
                                        <td class="px-4 text-slate-500">Credit Card</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded-md">Unpaid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV009 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV009</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">Nimbus Networks</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">stephen@example.com</td>
                                        <td class="px-4 text-slate-500">03 Nov 2024</td>
                                        <td class="px-4 text-slate-500">$600</td>
                                        <td class="px-4 text-slate-500">Paypal</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- INV010 -->
                                    <tr class="h-16 hover:bg-slate-50">
                                        <td class="px-4"><input type="checkbox"></td>
                                        <td class="px-4 text-slate-800 font-medium">INV010</td>
                                        <td class="px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-7 h-7 rounded-full border border-slate-200 bg-white">
                                                </div>
                                                <span class="font-semibold text-slate-800">Epicurean Delights</span>
                                            </div>
                                        </td>
                                        <td class="px-4 text-slate-500">angela@example.com</td>
                                        <td class="px-4 text-slate-500">17 Dec 2024</td>
                                        <td class="px-4 text-slate-500">$200</td>
                                        <td class="px-4 text-slate-500">Credit Card</td>
                                        <td class="px-4">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">Paid</span>
                                        </td>
                                        <td class="px-4">
                                            <div class="flex justify-center gap-4 text-slate-500">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <!-- Footer -->
                        <div class="flex items-center justify-between p-3 border-t">

                            <p class="text-sm text-slate-600">
                                Showing 1 - 10 of 10 entries
                            </p>

                            <div class="flex items-center gap-4">

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

</body>