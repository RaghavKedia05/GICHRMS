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
            <div class="flex-1 overflow-y-auto p-4 sm:p-5">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Packages
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-xs sm:text-sm text-slate-500">
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
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('package-grid') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5 mb-6">

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

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 w-full lg:w-auto">

                            <select class="w-full border rounded-md px-4 py-2 text-[13px]">
                                <option>Select Plan</option>
                            </select>

                            <select class="w-full border rounded-md px-4 py-2 text-[13px]">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>


                </div>

                <!-- Pricing Section -->
                <div class="bg-white border border-slate-200 rounded-md p-4 sm:p-5 mt-6 shadow-md">

                    <!-- Toggle -->
                    <div class="flex justify-center items-center gap-3 mb-6">

                        <span class="text-slate-600 text-xs">Monthly</span>

                        <label class="relative inline-flex items-center cursor-pointer">

                            <input type="checkbox" class="sr-only peer">

                            <div
                                class="w-9 h-4 bg-slate-200 rounded-full peer peer-checked:bg-orange-500 transition-all duration-300">
                            </div>

                            <div
                                class="absolute left-0.5 top-0.5 w-3 h-3 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-5">
                            </div>

                        </label>

                        <span class="text-slate-600 text-xs">Yearly</span>

                    </div>

                    <!-- Pricing Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

                        <!-- Basic Card -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 sm:p-5 shadow-md">

                            <div class="border border-slate-200 rounded-md p-4 sm:p-5 shadow-sm">

                                <h3 class="text-lg font-semibold text-slate-800">
                                    Basic
                                </h3>

                                <div class="flex items-end gap-1 flex-wrap">

                                    <span class="text-3xl font-semibold text-slate-900">
                                        $50
                                    </span>

                                    <span class="text-xs text-xs text-slate-500 mb-1">
                                        /monthly
                                    </span>

                                </div>

                            </div>

                            <!-- Features -->
                            <div class="bg-slate-50 rounded-md p-4 mt-5">

                                <div class="flex items-center gap-3 mb-5">

                                    <h4 class="font-semibold text-xs text-slate-500">
                                        Features Includes
                                    </h4>

                                    <div class="flex-1 h-px bg-slate-200"></div>

                                </div>

                                <ul class="space-y-4 text-sm sm:text-[15px]">

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        10 Employees
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        50 Projects
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        50 Clients
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        50 GB Storage
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="x-circle" class="w-4 h-4 text-red-500"></i>
                                        Voice & Video Chat
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="x-circle" class="w-4 h-4 text-red-500"></i>
                                        CRM
                                    </li>

                                </ul>

                            </div>

                            <!-- Button -->
                            <button
                                class="w-full mt-4 py-3.5 bg-slate-950 hover:bg-slate-900 text-white font-medium rounded-md transition">
                                Choose Plan
                            </button>

                        </div>

                        <!-- Advanced Card -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 sm:p-5 shadow-md">

                            <div class="border border-slate-200 rounded-md p-4 sm:p-5 shadow-sm">
                                <h3 class="text-lg font-semibold text-slate-800">
                                    Advanced
                                </h3>

                                <div class="flex items-end gap-1 flex-wrap">
                                    <span class="text-3xl font-semibold text-slate-900">$200</span>
                                    <span class="text-xs text-slate-500 mb-1">/monthly</span>
                                </div>
                            </div>

                            <div class="bg-slate-50 rounded-md p-4 mt-5">

                                <div class="flex items-center gap-3 mb-5">
                                    <h4 class="font-semibold text-xs text-slate-500">
                                        Features Includes
                                    </h4>
                                    <div class="flex-1 h-px bg-slate-200"></div>
                                </div>

                                <ul class="space-y-4 text-sm sm:text-[15px]">

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        50 Employees
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        100 Projects
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        100 Clients
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        50 GB Storage
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        Voice & Video Chat
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="x-circle" class="w-4 h-4 text-red-500"></i>
                                        CRM
                                    </li>

                                </ul>

                            </div>

                            <button
                                class="w-full mt-4 py-3.5 bg-slate-950 hover:bg-slate-900 text-white font-medium rounded-md transition">
                                Choose Plan
                            </button>

                        </div>

                        <!-- Premium Card -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 sm:p-5 shadow-md">

                            <div class="border border-slate-200 rounded-md p-5 shadow-sm">
                                <h3 class="text-lg font-semibold text-slate-800">
                                    Premium
                                </h3>

                                <div class="flex items-end gap-1 flex-wrap">
                                    <span class="text-3xl font-semibold text-slate-900">$300</span>
                                    <span class="text-xs text-slate-500 mb-1">/monthly</span>
                                </div>
                            </div>

                            <div class="bg-slate-50 rounded-md p-4 mt-5">

                                <div class="flex items-center gap-3 mb-5">
                                    <h4 class="font-semibold text-xs text-slate-500">
                                        Features Includes
                                    </h4>
                                    <div class="flex-1 h-px bg-slate-200"></div>
                                </div>

                                <ul class="space-y-4 text-sm sm:text-[15px]">

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        100 Employees
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        200 Projects
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        100 Clients
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        100 GB Storage
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        Voice & Video Chat
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="x-circle" class="w-4 h-4 text-red-500"></i>
                                        CRM
                                    </li>

                                </ul>

                            </div>

                            <button
                                class="w-full mt-4 py-3.5 bg-slate-950 hover:bg-slate-900 text-white font-medium rounded-md transition">
                                Choose Plan
                            </button>

                        </div>

                        <!-- Enterprise Card -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 sm:p-5 shadow-md">

                            <div class="border border-slate-200 rounded-md p-4 sm:p-5 shadow-sm">
                                <h3 class="text-lg font-semibold text-slate-800">
                                    Enterprise
                                </h3>

                                <div class="flex items-end gap-1 flex-wrap">
                                    <span class="text-3xl font-semibold text-slate-900">$400</span>
                                    <span class="text-xs text-slate-500 mb-1">/monthly</span>
                                </div>
                            </div>

                            <div class="bg-slate-50 rounded-md p-4 mt-5">

                                <div class="flex items-center gap-3 mb-5">
                                    <h4 class="font-semibold text-xs text-slate-500">
                                        Features Includes
                                    </h4>
                                    <div class="flex-1 h-px bg-slate-200"></div>
                                </div>

                                <ul class="space-y-4 text-sm sm:text-[15px]">

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        Unlimited Employees
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        Unlimited Clients
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        Unlimited Projects
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        Unlimited Storage
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        Voice & Video Chat
                                    </li>

                                    <li class="flex items-center gap-3">
                                        <i data-lucide="badge-check" class="w-4 h-4 text-green-500"></i>
                                        CRM
                                    </li>

                                </ul>

                            </div>

                            <button
                                class="w-full mt-4 py-3.5 bg-slate-950 hover:bg-slate-900 text-white font-medium rounded-md transition">
                                Choose Plan
                            </button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

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