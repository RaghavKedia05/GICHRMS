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
            <div class="flex-1 overflow-y-auto p-4 lg:p-5">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Packages
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Super Admin</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Packages List
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">

                        <!-- List View -->
                        <a href="<?= base_url('packages') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('package-grid') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                        <!-- Export -->
                        <button
                            class="flex items-center justify-center gap-2 px-3 py-2 text-xs sm:text-sm bg-white border border-slate-200 rounded-md">
                            <i data-lucide="file-down" class="w-4 h-4"></i>

                            Export

                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>

                        <!-- Add Plan -->
                        <button onclick="openAddPlanModal()"
                            class="flex items-center justify-center gap-2 px-3 py-2 text-xs sm:text-sm bg-orange-500 text-white rounded-md font-medium">

                            <i data-lucide="plus-circle" class="w-4 h-4"></i>

                            Add Plan
                        </button>

                        <!-- Scroll Top -->
                        <button
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center">
                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>
                        </button>

                    </div>

                </div>

                <!-- Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 lg:gap-5 mb-6">

                    <!-- Total Plans -->
                    <div class="bg-white border border-slate-200 rounded-md p-5 shadow-sm">
                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-xs font-semibold text-slate-500">
                                    Total Plans
                                </p>

                                <h3 class="text-xl font-semibold text-slate-800">
                                    08
                                </h3>
                            </div>

                            <div class="w-11 h-11 bg-orange-500 rounded flex items-center justify-center">
                                <i data-lucide="package" class="w-5 h-5 text-white"></i>
                            </div>

                        </div>
                    </div>

                    <!-- Active Plans -->
                    <div class="bg-white border border-slate-200 rounded-md p-5 shadow-sm">
                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-xs font-semibold text-slate-500">
                                    Active Plans
                                </p>

                                <h3 class="text-xl font-semibold text-slate-800">
                                    08
                                </h3>
                            </div>

                            <div class="w-11 h-11 bg-green-500 rounded flex items-center justify-center">
                                <i data-lucide="activity" class="w-5 h-5 text-white"></i>
                            </div>

                        </div>
                    </div>

                    <!-- Inactive Plans -->
                    <div class="bg-white border border-slate-200 rounded-md p-5 shadow-sm">
                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-xs font-semibold text-slate-500">
                                    Inactive Plans
                                </p>

                                <h3 class="text-xl font-semibold text-slate-800">
                                    0
                                </h3>
                            </div>

                            <div class="w-11 h-11 bg-red-500 rounded flex items-center justify-center">
                                <i data-lucide="pause" class="w-5 h-5 text-white"></i>
                            </div>

                        </div>
                    </div>

                    <!-- Plan Types -->
                    <div class="bg-white border border-slate-200 rounded-md p-5 shadow-sm">
                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-xs font-semibold text-slate-500">
                                    No of Plan Types
                                </p>

                                <h3 class="text-xl font-semibold text-slate-800">
                                    02
                                </h3>
                            </div>

                            <div class="w-11 h-11 bg-cyan-500 rounded flex items-center justify-center">
                                <i data-lucide="layers-3" class="w-5 h-5 text-white"></i>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Packages List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b
">

                        <h3 class="text-l font-semibold text-slate-800">
                            Plan List
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 w-full lg:w-auto">

                            <button class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Select Plan</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Select Status</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                    <!-- Controls -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5">

                        <div class="flex flex-wrap items-center gap-2 w-full lg:w-auto">

                            <span class="text-sm">
                                Row Per Page
                            </span>

                            <select class="border rounded-md px-3 py-1 text-sm">
                                <option>10</option>
                            </select>

                            <span class="text-sm">
                                Entries
                            </span>

                        </div>

                        <input type="text" placeholder="Search"
                            class="border border-slate-200 rounded-md px-4 py-2 text-[13px] w-full md:w-[220px]">

                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px]">

                            <thead>

                                <tr class="bg-[#f1f5f9] h-10">

                                    <th class="w-12 text-center">
                                        <input type="checkbox" id="selectAll" class="w-4 h-4">
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Plan Name
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Plan Type
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Total Subscribers
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Price
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Created Date
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Status
                                    </th>

                                    <th class="p-4"></th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-200 text-[13px]">

                                <tr>
                                    <td class="w-12 text-center">
                                        <input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Basic</td>
                                    <td class="p-4 text-slate-500">Monthly</td>
                                    <td class="p-4 text-slate-500">56</td>
                                    <td class="p-4 text-slate-500">$50</td>
                                    <td class="p-4 text-slate-500">14 Jan 2024</td>
                                    <td class="p-4">
                                        <span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500">
                                            <i data-lucide="square-pen" class="w-4 h-4"></i>
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-12 text-center"><input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Advanced</td>
                                    <td class="p-4 text-slate-500">Monthly</td>
                                    <td class="p-4 text-slate-500">99</td>
                                    <td class="p-4 text-slate-500">$200</td>
                                    <td class="p-4 text-slate-500">21 Jan 2024</td>
                                    <td class="p-4"><span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500"><i data-lucide="square-pen"
                                                class="w-4 h-4"></i><i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-12 text-center"><input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Premium</td>
                                    <td class="p-4 text-slate-500">Monthly</td>
                                    <td class="p-4 text-slate-500">58</td>
                                    <td class="p-4 text-slate-500">$300</td>
                                    <td class="p-4 text-slate-500">10 Feb 2024</td>
                                    <td class="p-4"><span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500"><i data-lucide="square-pen"
                                                class="w-4 h-4"></i><i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-12 text-center"><input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Enterprise</td>
                                    <td class="p-4 text-slate-500">Monthly</td>
                                    <td class="p-4 text-slate-500">67</td>
                                    <td class="p-4 text-slate-500">$400</td>
                                    <td class="p-4 text-slate-500">18 Feb 2024</td>
                                    <td class="p-4"><span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500"><i data-lucide="square-pen"
                                                class="w-4 h-4"></i><i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-12 text-center"><input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Basic</td>
                                    <td class="p-4 text-slate-500">Yearly</td>
                                    <td class="p-4 text-slate-500">78</td>
                                    <td class="p-4 text-slate-500">$600</td>
                                    <td class="p-4 text-slate-500">15 Mar 2024</td>
                                    <td class="p-4"><span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500"><i data-lucide="square-pen"
                                                class="w-4 h-4"></i><i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-12 text-center"><input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Advanced</td>
                                    <td class="p-4 text-slate-500">Yearly</td>
                                    <td class="p-4 text-slate-500">99</td>
                                    <td class="p-4 text-slate-500">$2400</td>
                                    <td class="p-4 text-slate-500">26 Mar 2024</td>
                                    <td class="p-4"><span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500"><i data-lucide="square-pen"
                                                class="w-4 h-4"></i><i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-12 text-center"><input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Premium</td>
                                    <td class="p-4 text-slate-500">Yearly</td>
                                    <td class="p-4 text-slate-500">48</td>
                                    <td class="p-4 text-slate-500">$3600</td>
                                    <td class="p-4 text-slate-500">05 Apr 2024</td>
                                    <td class="p-4"><span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500"><i data-lucide="square-pen"
                                                class="w-4 h-4"></i><i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-12 text-center"><input type="checkbox" class="rowCheckbox w-4 h-4">
                                    </td>
                                    <td class="p-4 font-medium">Enterprise</td>
                                    <td class="p-4 text-slate-500">Yearly</td>
                                    <td class="p-4 text-slate-500">17</td>
                                    <td class="p-4 text-slate-500">$4800</td>
                                    <td class="p-4 text-slate-500">16 Apr 2024</td>
                                    <td class="p-4"><span
                                            class="bg-green-500 text-white text-[11px] font-semibold px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4">
                                        <div class="flex gap-4 text-slate-500"><i data-lucide="square-pen"
                                                class="w-4 h-4"></i><i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                        <!-- Pagination -->
                        <div class="flex items-center justify-between p-3 border-t">

                            <p class="text-sm text-slate-600">
                                Showing 1 - 8 of 8 entries
                            </p>

                            <div class="flex items-center justify-center gap-4">

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

    <script>
        const selectAll = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');

        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });

        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', function () {
                const allChecked =
                    [...rowCheckboxes].every(c => c.checked);

                selectAll.checked = allChecked;
            });
        });
    </script>


    <?= $this->include('Components/add_plan_modal') ?>

    <script>
        function openAddPlanModal() {
            document.getElementById('addPlanModal').classList.remove('hidden');
            document.getElementById('addPlanModal').classList.add('flex');
        }

        function closeAddPlanModal() {
            document.getElementById('addPlanModal').classList.add('hidden');
            document.getElementById('addPlanModal').classList.remove('flex');
        }
    </script>

</body>