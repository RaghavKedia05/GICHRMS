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
        <?php include __DIR__ . '/sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col ">

            <!-- Navbar -->
            <nav class="min-h-[72px] bg-white border-b border-slate-200 flex items-center justify-between px-8">

                <div>
                    <h1 class="text-[20px] font-semibold text-black">
                        !
                    </h1>
                </div>

                <!-- Search Button,Notification, Profile, Settings -->
                <div class="flex items-center gap-5">

                    <!-- Search -->
                    <button class="text-slate-600 hover:text-indigo-600 transition">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </button>

                    <!-- Notification -->
                    <button class="text-slate-600 hover:text-indigo-600 transition">
                        <i data-lucide="bell" class="w-4 h-4"></i>
                    </button>

                    <!-- Profile -->
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full bg-indigo-500 text-white flex items-center justify-center">
                            RK
                        </div>

                        <div class="text-right">
                            <p class="font-sm text-slate-800">
                                Mr. Kedia
                            </p>
                        </div>

                    </div>

                    <!-- Settings -->
                    <button class="text-slate-600 hover:text-indigo-600 transition">
                        <i data-lucide="settings" class="w-4 h-4"></i>
                    </button>

                </div>
            </nav>

            <!-- Page Content -->
            <div class="p-5">
                <!-- Page Header -->
                <div class="flex items-start justify-between mb-6">

                    <div>

                        <h1 class="text-2xl font-semibold text-slate-800">
                            Companies
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">

                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Super Admin</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Subscription
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

                        <button class="flex items-center gap-2 px-4 py-2 bg-orange-500 text-white rounded-md text-sm">

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
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">

                    <!-- Total Transaction -->
                    <div class="bg-white border border-gray-200 rounded-md px-6 py-5">
                        <div class="flex justify-between items-start">

                            <div>
                                <p class="text-[15px] text-slate-500">
                                    Total Transaction
                                </p>

                                <h3 class="mt-1 text-[32px] font-bold text-slate-800">
                                    $5,340
                                </h3>
                            </div>

                            <svg width="70" height="36" viewBox="0 0 70 36" fill="none">
                                <path d="M2 28L8 8L14 22L20 6L26 30L32 12L38 24L44 8L50 26L56 4L62 18L68 28"
                                    fill="rgba(251,146,60,.25)" />
                                <path d="M2 28L8 8L14 22L20 6L26 30L32 12L38 24L44 8L50 26L56 4L62 18L68 28"
                                    stroke="#fb923c" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>

                        <div class="border-t border-slate-200 mt-5 pt-4">
                            <p class="text-sm">
                                <span class="text-orange-500 font-medium">
                                    ↝ +19.01%
                                </span>
                                <span class="text-slate-500">
                                    from last week
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Total Subscribers -->
                    <div class="bg-white border border-gray-200 rounded-md px-6 py-5">
                        <div class="flex justify-between items-start">

                            <div>
                                <p class="text-[15px] text-slate-500">
                                    Total Subscribers
                                </p>

                                <h3 class="mt-1 text-[32px] font-bold text-slate-800">
                                    600
                                </h3>
                            </div>

                            <svg width="70" height="36" viewBox="0 0 70 36" fill="none">
                                <path d="M2 24L8 5L14 18L20 8L26 22L32 6L38 26L44 10L50 20L56 4L62 24L68 24"
                                    fill="rgba(96,165,250,.25)" />
                                <path d="M2 24L8 5L14 18L20 8L26 22L32 6L38 26L44 10L50 20L56 4L62 24L68 24"
                                    stroke="#60a5fa" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>

                        <div class="border-t border-slate-200 mt-5 pt-4">
                            <p class="text-sm">
                                <span class="text-orange-500 font-medium">
                                    ↝ +19.01%
                                </span>
                                <span class="text-slate-500">
                                    from last week
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Active Subscribers -->
                    <div class="bg-white border border-gray-200 rounded-md px-6 py-5">
                        <div class="flex justify-between items-start">

                            <div>
                                <p class="text-[15px] text-slate-500">
                                    Active Subscribers
                                </p>

                                <h3 class="mt-1 text-[32px] font-bold text-slate-800">
                                    560
                                </h3>
                            </div>

                            <svg width="70" height="36" viewBox="0 0 70 36" fill="none">
                                <path d="M2 26L8 6L14 18L20 4L26 24L32 12L38 28L44 6L50 20L56 4L62 22L68 26"
                                    fill="rgba(74,222,128,.25)" />
                                <path d="M2 26L8 6L14 18L20 4L26 24L32 12L38 28L44 6L50 20L56 4L62 22L68 26"
                                    stroke="#4ade80" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>

                        <div class="border-t border-slate-200 mt-5 pt-4">
                            <p class="text-sm">
                                <span class="text-orange-500 font-medium">
                                    ↝ +19.01%
                                </span>
                                <span class="text-slate-500">
                                    from last week
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Expired Subscribers -->
                    <div class="bg-white border border-gray-200 rounded-md px-6 py-5">
                        <div class="flex justify-between items-start">

                            <div>
                                <p class="text-[15px] text-slate-500">
                                    Expired Subscribers
                                </p>

                                <h3 class="mt-1 text-[32px] font-bold text-slate-800">
                                    40
                                </h3>
                            </div>

                            <svg width="70" height="36" viewBox="0 0 70 36" fill="none">
                                <path d="M2 28L8 10L14 22L20 6L26 26L32 8L38 20L44 4L50 24L56 8L62 18L68 28"
                                    fill="rgba(248,113,113,.25)" />
                                <path d="M2 28L8 10L14 22L20 6L26 26L32 8L38 20L44 4L50 24L56 8L62 18L68 28"
                                    stroke="#ef4444" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>

                        <div class="border-t border-slate-200 mt-5 pt-4">
                            <p class="text-sm">
                                <span class="text-orange-500 font-medium">
                                    ↝ +19.01%
                                </span>
                                <span class="text-slate-500">
                                    from last week
                                </span>
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Subscription List -->
                <div class="bg-white rounded-md border border-gray-200 mt-6">

                    <!-- Header -->
                    <div class="flex items-center justify-between p-5 border-b">

                        <h3 class="text-l font-semibold text-slate-800">
                            Subscription List
                        </h3>

                        <div class="flex items-center gap-4">

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
                    <div class="flex items-center justify-between p-5">

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

                            <table class="w-full">

                                <thead>
                                    <tr class="bg-slate-100 border-b">

                                        <th class="p-4 w-10">
                                            <input type="checkbox">
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Company Name
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Plan
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Billing Cycle
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Payment Method
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Amount
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Created Date
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Expired On
                                        </th>

                                        <th class="p-4 text-left text-sm font-semibold">
                                            Status
                                        </th>

                                        <th class="p-4"></th>

                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 bg-white">

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div>
                                                <span class="font-medium text-slate-800">BrightWave Innovations</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Advanced (Monthly)</td>
                                        <td class="px-5 text-slate-600">30 Days</td>
                                        <td class="px-5 text-slate-600">Credit Card</td>
                                        <td class="px-5 text-slate-600">$200</td>
                                        <td class="px-5 text-slate-600">12 Sep 2024</td>
                                        <td class="px-5 text-slate-600">11 Oct 2024</td>
                                        <td class="px-5">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div>
                                                <span class="font-medium text-slate-800">Stellar Dynamics</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Basic (Yearly)</td>
                                        <td class="px-5 text-slate-600">365 Days</td>
                                        <td class="px-5 text-slate-600">Paypal</td>
                                        <td class="px-5 text-slate-600">$600</td>
                                        <td class="px-5 text-slate-600">24 Oct 2024</td>
                                        <td class="px-5 text-slate-600">23 Nov 2025</td>
                                        <td class="px-5">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div>
                                                <span class="font-medium text-slate-800">Quantum Nexus</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Advanced (Monthly)</td>
                                        <td class="px-5 text-slate-600">30 Days</td>
                                        <td class="px-5 text-slate-600">Debit Card</td>
                                        <td class="px-5 text-slate-600">$200</td>
                                        <td class="px-5 text-slate-600">18 Feb 2024</td>
                                        <td class="px-5 text-slate-600">17 Mar 2024</td>
                                        <td class="px-5">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div>
                                                <span class="font-medium text-slate-800">EcoVision Enterprises</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Advanced (Monthly)</td>
                                        <td class="px-5 text-slate-600">30 Days</td>
                                        <td class="px-5 text-slate-600">Paypal</td>
                                        <td class="px-5 text-slate-600">$200</td>
                                        <td class="px-5 text-slate-600">17 Oct 2024</td>
                                        <td class="px-5 text-slate-600">16 Nov 2024</td>
                                        <td class="px-5">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div>
                                                <span class="font-medium text-slate-800">Aurora Technologies</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Enterprise (Monthly)</td>
                                        <td class="px-5 text-slate-600">30 Days</td>
                                        <td class="px-5 text-slate-600">Credit Card</td>
                                        <td class="px-5 text-slate-600">$400</td>
                                        <td class="px-5 text-slate-600">20 Jul 2024</td>
                                        <td class="px-5 text-slate-600">19 Aug 2024</td>
                                        <td class="px-5">
                                            <span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5">
                                                <i data-lucide="file-text" class="w-4 h-4"></i>
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Continue same pattern -->

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div>
                                                <span class="font-medium text-slate-800">BlueSky Ventures</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Advanced (Monthly)</td>
                                        <td class="px-5 text-slate-600">30 Days</td>
                                        <td class="px-5 text-slate-600">Paypal</td>
                                        <td class="px-5 text-slate-600">$200</td>
                                        <td class="px-5 text-slate-600">10 Apr 2024</td>
                                        <td class="px-5 text-slate-600">09 May 2024</td>
                                        <td class="px-5"><span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5"><i data-lucide="file-text"
                                                    class="w-4 h-4"></i><i data-lucide="download" class="w-4 h-4"></i><i
                                                    data-lucide="trash-2" class="w-4 h-4"></i></div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div><span
                                                    class="font-medium text-slate-800">TerraFusion Energy</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Enterprise (Yearly)</td>
                                        <td class="px-5 text-slate-600">365 Days</td>
                                        <td class="px-5 text-slate-600">Credit Card</td>
                                        <td class="px-5 text-slate-600">$4800</td>
                                        <td class="px-5 text-slate-600">29 Aug 2024</td>
                                        <td class="px-5 text-slate-600">28 Aug 2025</td>
                                        <td class="px-5"><span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5"><i data-lucide="file-text"
                                                    class="w-4 h-4"></i><i data-lucide="download" class="w-4 h-4"></i><i
                                                    data-lucide="trash-2" class="w-4 h-4"></i></div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div><span
                                                    class="font-medium text-slate-800">UrbanPulse Design</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Basic (Monthly)</td>
                                        <td class="px-5 text-slate-600">30 Days</td>
                                        <td class="px-5 text-slate-600">Credit Card</td>
                                        <td class="px-5 text-slate-600">$50</td>
                                        <td class="px-5 text-slate-600">22 Feb 2024</td>
                                        <td class="px-5 text-slate-600">21 Mar 2024</td>
                                        <td class="px-5"><span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded">Unpaid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5"><i data-lucide="file-text"
                                                    class="w-4 h-4"></i><i data-lucide="download" class="w-4 h-4"></i><i
                                                    data-lucide="trash-2" class="w-4 h-4"></i></div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div><span
                                                    class="font-medium text-slate-800">Nimbus Networks</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Basic (Yearly)</td>
                                        <td class="px-5 text-slate-600">365 Days</td>
                                        <td class="px-5 text-slate-600">Paypal</td>
                                        <td class="px-5 text-slate-600">$600</td>
                                        <td class="px-5 text-slate-600">03 Nov 2024</td>
                                        <td class="px-5 text-slate-600">02 Nov 2025</td>
                                        <td class="px-5"><span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5"><i data-lucide="file-text"
                                                    class="w-4 h-4"></i><i data-lucide="download" class="w-4 h-4"></i><i
                                                    data-lucide="trash-2" class="w-4 h-4"></i></div>
                                        </td>
                                    </tr>

                                    <tr class="h-16 hover:bg-gray-50">
                                        <td class="px-5"><input type="checkbox"></td>
                                        <td class="px-5">
                                            <div class="flex items-center gap-4">
                                                <div class="w-8 h-8 rounded-full border bg-white"></div><span
                                                    class="font-medium text-slate-800">Epicurean Delights</span>
                                            </div>
                                        </td>
                                        <td class="px-5 text-slate-600">Advanced (Monthly)</td>
                                        <td class="px-5 text-slate-600">30 Days</td>
                                        <td class="px-5 text-slate-600">Credit Card</td>
                                        <td class="px-5 text-slate-600">$200</td>
                                        <td class="px-5 text-slate-600">17 Dec 2024</td>
                                        <td class="px-5 text-slate-600">16 Jan 2025</td>
                                        <td class="px-5"><span
                                                class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded">Paid</span>
                                        </td>
                                        <td class="px-5">
                                            <div class="flex justify-center gap-5"><i data-lucide="file-text"
                                                    class="w-4 h-4"></i><i data-lucide="download" class="w-4 h-4"></i><i
                                                    data-lucide="trash-2" class="w-4 h-4"></i></div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <!-- Footer -->
                        <div class="flex items-center justify-between p-5 border-t">

                            <p class="text-sm text-slate-600">
                                Showing 1 - 10 of 10 entries
                            </p>

                            <div class="flex items-center gap-4">

                                <button>
                                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                </button>

                                <button class="w-7 h-7 rounded-full bg-orange-500 text-white text-sm">
                                    1
                                </button>

                                <button>
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
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
    </script>

</body>