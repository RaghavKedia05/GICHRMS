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

                        <h1 class="text-2xl font-semibold text-slate-800">
                            Companies
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-slate-500">

                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Super Admin</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Companies List
                            </span>

                        </div>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 w-full lg:w-auto">

                        <button
                            class="flex items-center justify-center gap-2 px-4 py-2 w-full sm:w-auto bg-white border border-gray-200 rounded-md text-sm">

                            <i data-lucide="file-down" class="w-4 h-4"></i>

                            Export

                            <i data-lucide="chevron-down" class="w-4 h-4"></i>

                        </button>

                        <button
                            class="flex items-center justify-center gap-2 px-4 py-2 w-full sm:w-auto bg-orange-500 text-white rounded-md text-sm">

                            <i data-lucide="plus-circle" class="w-4 h-4"></i>

                            Add Company

                        </button>

                        <button
                            class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-md">

                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>

                        </button>

                    </div>

                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 lg:gap-6 mb-6">

                    <!-- Total Companies -->
                    <div class="bg-white border border-gray-200 rounded-md p-5">
                        <div class="flex items-start justify-between gap-3">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 bg-orange-500 rounded flex items-center justify-center">
                                    <i data-lucide="building-2" class="w-5 h-5 text-white"></i>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold text-slate-500">
                                        Total Companies
                                    </p>

                                    <h3 class="text-xl font-semibold text-slate-800">
                                        950
                                    </h3>
                                </div>

                            </div>

                            <svg width="60" height="30" viewBox="0 0 60 30" fill="none">
                                <path d="M2 18L10 6L18 10L26 22L34 8L42 24L50 15L58 18" stroke="#f97316"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </div>

                    <!-- Active Companies -->
                    <div class="bg-white border border-gray-200 rounded-md p-5">
                        <div class="flex items-start justify-between gap-3">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 bg-green-500 rounded flex items-center justify-center">
                                    <i data-lucide="building-2" class="w-5 h-5 text-white"></i>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold text-slate-500">
                                        Active Companies
                                    </p>

                                    <h3 class="text-xl font-semibold text-slate-800">
                                        920
                                    </h3>
                                </div>

                            </div>

                            <svg width="60" height="30" viewBox="0 0 60 30" fill="none">
                                <path d="M2 12L10 4L18 6L26 16L34 7L42 23L50 8L58 20" stroke="#f97316"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </div>

                    <!-- Inactive Companies -->
                    <div class="bg-white border border-gray-200 rounded-md p-5">
                        <div class="flex items-start justify-between gap-3">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 bg-red-500 rounded flex items-center justify-center">
                                    <i data-lucide="building-2" class="w-5 h-5 text-white"></i>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold text-slate-500">
                                        Inactive Companies
                                    </p>

                                    <h3 class="text-xl font-semibold text-slate-800">
                                        30
                                    </h3>
                                </div>

                            </div>

                            <svg width="60" height="30" viewBox="0 0 60 30" fill="none">
                                <path d="M2 8L10 24L18 6L26 25L34 12L42 10L50 13L58 12" stroke="#f97316"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </div>

                    <!-- Company Location -->
                    <div class="bg-white border border-gray-200 rounded-md p-5">
                        <div class="flex items-start justify-between gap-3">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 bg-cyan-500 rounded flex items-center justify-center">
                                    <i data-lucide="map-pinned" class="w-5 h-5 text-white"></i>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold text-slate-500">
                                        Company Location
                                    </p>

                                    <h3 class="text-xl font-semibold text-slate-800">
                                        180
                                    </h3>
                                </div>

                            </div>

                            <svg width="60" height="30" viewBox="0 0 60 30" fill="none">
                                <path d="M2 10L10 4L18 22L26 18L34 20L42 17L50 16L58 15" stroke="#f97316"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </div>

                </div>

                <!-- Companies List -->
                <div class="bg-white rounded-md border border-gray-200 mt-6">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b">

                        <h3 class="text-l font-semibold text-slate-800">
                            Companies List
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 w-full lg:w-auto">

                            <!-- Date -->
                            <button class="flex items-center gap-2 border rounded-md px-4 py-1 p-2 text-xs">
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

                        <input type="text" placeholder="Search"
                            class="border rounded-md px-4 py-1 text-xs w-[170px]">

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="bg-slate-100 text-left">

                                    <th class="p-4">
                                        <input type="checkbox">
                                    </th>

                                    <th class="p-4 text-sm font-semibold">
                                        Company Name
                                    </th>

                                    <th class="p-4 text-sm font-semibold">
                                        Email
                                    </th>

                                    <th class="p-4 text-sm font-semibold">
                                        Account URL
                                    </th>

                                    <th class="p-4 text-sm font-semibold">
                                        Plan
                                    </th>

                                    <th class="p-4 text-sm font-semibold">
                                        Created Date
                                    </th>

                                    <th class="p-4 text-sm font-semibold">
                                        Status
                                    </th>

                                    <th class="p-4"></th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-200">
                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">BrightWave Innovations</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">michael@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">bwi.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">12 Sep 2024</td>
                                    <td class="p-4 "><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex gap-4 text-sm text-slate-500">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                            <i data-lucide="square-pen" class="w-4 h-4"></i>
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">Stellar Dynamics</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">sophie@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">sd.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">24 Oct 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i>
                                            <i data-lucide="square-pen" class="w-4 h-4"></i>
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">Quantum Nexus</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">cameron@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">qn.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">18 Feb 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">EcoVision Enterprises</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">doris@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">eve.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">17 Oct 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">Aurora Technologies</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">thomas@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">at.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">20 Jul 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">BlueSky Ventures</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">kathleen@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">bsv.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">10 Apr 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">TerraFusion Energy</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">bruce@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">tfe.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">29 Aug 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">UrbanPulse Design</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">estelle@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">upd.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">22 Feb 2024</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <span
                                            class="bg-red-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Inactive</span>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4"><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">Nimbus Networks</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">stephen@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">nn.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">03 Nov 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-4 "><input type="checkbox"></td>
                                    <td class="p-4">
                                        <div class="flex items-center flex-wrap gap-2">
                                            <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50"></div>
                                            <span class="font-medium text-sm">Epicurean Delights</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-slate-500">angela@example.com</td>
                                    <td class="p-4 text-sm text-slate-500">ed.example.com</td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center justify-between gap-2">
                                            <span>Advanced (Monthly)</span>
                                            <span
                                                class="bg-purple-500 text-white font-semibold text-[10px] px-2 py-1 rounded">
                                                Upgrade
                                            </span>
                                        </div>
                                    </td>

                                    <td class="p-4 text-sm text-slate-500">17 Dec 2024</td>
                                    <td class="p-4 text-sm text-slate-500"><span
                                            class="bg-green-500 text-white font-semibold text-[11px] px-3 py-1 rounded">
                                            Active</span></td>
                                    <td class="p-4 text-sm text-slate-500">
                                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-4 h-4"></i><i
                                                data-lucide="square-pen" class="w-4 h-4"></i><i data-lucide="trash-2"
                                                class="w-4 h-4"></i></div>
                                    </td>
                                </tr>




                            </tbody>
                        </table>


                        <div class="flex items-center justify-between p-3 border-t">

                            <p class="text-sm text-slate-600">
                                Showing 1 - 10 of 10 entries
                            </p>

                            <div class="flex items-center gap-3">

                                <button>
                                    <i data-lucide="chevron-left" class="w-4 h-4 text-slate-500">
                                    </i>
                                </button>

                                <button class="w-7 h-7 rounded-full bg-orange-500 text-white text-xs">
                                    1
                                </button>

                                <button>
                                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500">
                                    </i>
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