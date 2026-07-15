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

<body>
    <div class="flex h-screen overflow-hidden">

        <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
        </div>

        <!-- Sidebar -->
        <?php include __DIR__ . '/sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Navbar -->
            <?php include __DIR__ . '/navbar.php'; ?>
            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto p-3 sm:p-5">

                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 mb-6">

                    <div>
                        <h1 class="text-[28px] font-semibold text-slate-800">
                            Invoices
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span>Billing</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span class="text-slate-700">Invoices</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                        <button
                            class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-md text-sm">
                            <i data-lucide="file-down" class="w-4 h-4"></i>
                            Export
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>

                        <a href="<?= base_url('invoice/add') ?>"
                            class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-md text-sm hover:bg-orange-600 transition">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                            Add Invoice
                        </a>
                    </div>

                </div>

                <!-- Stats -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

                    <!-- Card 1 -->
                    <div class="bg-white rounded-lg border p-4 sm:p-6 shadow-sm">
                        <p class="text-sm text-slate-500 font-semibold">Total Invoice</p>
                        <h3 class="text-xl sm:text-2xl font-semibold mt-2 break-all">$3,237.94</h3>

                        <div class="w-full h-2 bg-slate-100 rounded-full mt-5">
                            <div class="w-[85%] h-2 bg-pink-500 rounded-full"></div>
                        </div>

                        <p class="text-green-500 text-sm mt-4">
                            +32.40%
                            <span class="text-slate-500">from last month</span>
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-lg border p-4 sm:p-6 shadow-sm">
                        <p class="text-sm text-slate-500 font-semibold">Outstanding</p>
                        <h3 class="text-xl sm:text-2xl font-semibold mt-2 break-all">$3,237.94</h3>

                        <div class="w-full h-2 bg-slate-100 rounded-full mt-5">
                            <div class="w-[50%] h-2 bg-purple-500 rounded-full"></div>
                        </div>

                        <p class="text-red-500 text-sm mt-4">
                            -4.40%
                            <span class="text-slate-500">from last month</span>
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-lg border p-4 sm:p-6 shadow-sm">
                        <p class="text-sm text-slate-500 font-semibold">Draft</p>
                        <h3 class="text-xl sm:text-2xl font-semibold mt-2 break-all">$3,237.94</h3>

                        <div class="w-full h-2 bg-slate-100 rounded-full mt-5">
                            <div class="w-[35%] h-2 bg-yellow-500 rounded-full"></div>
                        </div>

                        <p class="text-green-500 text-sm mt-4">
                            +12%
                            <span class="text-slate-500">from last month</span>
                        </p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-lg border p-4 sm:p-6 shadow-sm">
                        <p class="text-sm text-slate-500 font-semibold">Total Overdue</p>
                        <h3 class="text-xl sm:text-2xl font-semibold mt-2 break-all">$3,237.94</h3>

                        <div class="w-full h-2 bg-slate-100 rounded-full mt-5">
                            <div class="w-[30%] h-2 bg-red-500 rounded-full"></div>
                        </div>

                        <p class="text-red-500 text-sm mt-4">
                            -15.40%
                            <span class="text-slate-500">from last month</span>
                        </p>
                    </div>

                </div>

                <!-- Invoice Table Card -->
                <div class="bg-white rounded-lg border shadow-sm overflow-hidden">

                    <!-- Top -->
                    <div class="p-5 border-b">

                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">

                            <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                                <h2 class="font-semibold text-lg text-slate-800">
                                    Invoices
                                </h2>

                                <span class="px-3 py-1 rounded-md bg-slate-100 text-xs font-medium">
                                    2000 Invoices
                                </span>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">

                                <input type="date" class="w-full border rounded-md px-4 py-2 text-sm">

                                <input type="date" class="w-full border rounded-md px-4 py-2 text-sm">

                                <select class="w-full border rounded-md px-4 py-2 text-sm">
                                    <option>Select Status</option>
                                    <option>Paid</option>
                                    <option>Pending</option>
                                    <option>Draft</option>
                                    <option>Overdue</option>
                                </select>

                                <select class="w-full border rounded-md px-4 py-2 text-sm">
                                    <option>Sort By : Last 7 Days</option>
                                    <option>Created Date</option>
                                    <option>Due Date</option>
                                </select>

                            </div>

                        </div>

                    </div>

                    <!-- Controls -->
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 p-4 sm:p-5">

                        <div class="flex items-center gap-2 text-sm">
                            <span>Row Per Page</span>

                            <select class="border rounded-md px-3 py-1">
                                <option>10</option>
                            </select>

                            <span>Entries</span>
                        </div>

                        <input type="text" placeholder="Search"
                            class="w-full sm:w-52 border rounded-md px-4 py-2 text-sm">
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-lg">

                        <table class="w-full min-w-[1100px]">

                            <thead class="bg-slate-100 text-left">

                                <tr class="h-14">

                                    <th class="px-5">
                                        <input type="checkbox">
                                    </th>

                                    <th class="px-5 text-sm font-medium">
                                        Invoice
                                    </th>

                                    <th class="px-5 text-sm font-medium">
                                        Name
                                    </th>

                                    <th class="px-5 text-sm font-medium">
                                        Created On
                                    </th>

                                    <th class="px-5 text-sm font-medium">
                                        Total
                                    </th>

                                    <th class="px-5 text-sm font-medium">
                                        Amount Due
                                    </th>

                                    <th class="px-5 text-sm font-medium">
                                        Due Date
                                    </th>

                                    <th class="px-5 text-sm font-medium">
                                        Status
                                    </th>

                                    <th class="px-5 text-sm font-medium text-center">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-200">

                                <!-- Row -->
                                <?php
                                $rows = [
                                    ['INV-1454', 'Anthony Lewis', 'anthony@example.com', 'men/1', '14 Jan 2024, 04:27 AM', '$300', '$0', 'Paid', 'green'],
                                    ['INV-6571', 'Brian Villalobos', 'brian@example.com', 'men/2', '21 Jan 2024, 03:19 AM', '$547', '$200', 'Overdue', 'red'],
                                    ['INV-2245', 'Harvey Smith', 'harvey@example.com', 'men/3', '20 Feb 2024, 12:15 PM', '$325', '$65', 'Pending', 'purple'],
                                    ['INV-1456', 'Stephan Peralt', 'peralt@example.com', 'men/4', '15 Mar 2024, 12:11 AM', '$471', '$145', 'Pending', 'purple'],
                                    ['INV-0045', 'Doglas Martini', 'martini@example.com', 'women/5', '12 Apr 2024, 05:48 PM', '$147', '$32', 'Overdue', 'red'],
                                    ['INV-6244', 'Linda Ray', 'linda@example.com', 'women/6', '20 Apr 2024, 06:11 PM', '$654', '$140', 'Draft', 'yellow'],
                                    ['INV-9565', 'Elliot Murray', 'elliot@example.com', 'women/7', '14 Jan 2024, 04:27 AM', '$300', '$0', 'Paid', 'green'],
                                    ['INV-6874', 'Rebecca Smith', 'rebecca@example.com', 'women/8', '02 Sep 2024, 09:21 PM', '$654', '$65', 'Paid', 'green'],
                                    ['INV-6587', 'Connie Waters', 'connie@example.com', 'women/9', '15 Nov 2024, 12:44 PM', '$987', '$47', 'Pending', 'purple'],
                                    ['INV-9632', 'Stephen Dias', 'stephen@example.com', 'men/10', '10 Dec 2024, 09:45 AM', '$742', '$85', 'Paid', 'green']
                                ];

                                foreach ($rows as $row):
                                    ?>
                                    <tr onclick="window.location.href='<?= base_url('invoice-details/' . $row[0]) ?>'"
                                        class="h-20 cursor-pointer hover:bg-slate-50 transition">

                                        <td class="px-5">
                                            <input type="checkbox" onclick="event.stopPropagation()">
                                        </td>

                                        <td class="px-5 text-slate-600 text-sm">
                                            <?= $row[0] ?>
                                        </td>

                                        <td class="px-5">

                                            <div class="flex items-center gap-4">

                                                <img src="https://randomuser.me/api/portraits/<?= $row[3] ?>.jpg"
                                                    class="w-10 h-10 rounded-full object-cover">

                                                <div>
                                                    <h4 class="font-medium text-slate-800 text-sm">
                                                        <?= $row[1] ?>
                                                    </h4>

                                                    <p class="text-xs text-slate-500">
                                                        <?= $row[2] ?>
                                                    </p>
                                                </div>

                                            </div>

                                        </td>

                                        <td class="px-5 text-slate-600 text-sm">
                                            <?= $row[4] ?>
                                        </td>

                                        <td class="px-5 text-slate-600 text-sm">
                                            <?= $row[5] ?>
                                        </td>

                                        <td class="px-5 text-slate-600 text-sm">
                                            <?= $row[6] ?>
                                        </td>

                                        <td class="px-5 text-slate-600 text-sm">
                                            <?= $row[4] ?>
                                        </td>

                                        <td class="px-5">

                                            <?php
                                            $bg = [
                                                'green' => 'bg-green-50 text-green-600 text-sm',
                                                'red' => 'bg-red-50 text-red-600 text-sm',
                                                'purple' => 'bg-purple-50 text-purple-600 text-sm',
                                                'yellow' => 'bg-yellow-50 text-yellow-600 text-sm'
                                            ];
                                            ?>

                                            <span
                                                class="inline-flex items-center gap-2 px-3 py-1 rounded-md text-sm <?= $bg[$row[8]] ?>">
                                                <span class="w-2 h-2 rounded-full bg-current "></span>
                                                <?= $row[7] ?>
                                            </span>

                                        </td>

                                        <td class="px-5">

                                            <div class="flex justify-center gap-4 text-slate-500">

                                                <button onclick="event.stopPropagation()">
                                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                                </button>

                                                <button onclick="event.stopPropagation()">
                                                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                                                </button>

                                                <button onclick="event.stopPropagation()">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>

                                            </div>

                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <!-- Footer -->
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 p-4 sm:p-5 border-t">

                        <span class="text-sm text-slate-500">
                            Showing 1 - 10 of 11 entries
                        </span>

                        <div class="flex justify-center items-center gap-3 flex-wrap">

                            <button>
                                <i data-lucide="chevron-left" class="w-4 h-4 text-slate-500"></i>
                            </button>

                            <button
                                class="w-8 h-8 rounded-full bg-orange-500 text-white text-sm flex items-center justify-center">
                                1
                            </button>

                            <button class="w-8 h-8 rounded-full border text-sm flex items-center justify-center">
                                2
                            </button>

                            <button>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
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