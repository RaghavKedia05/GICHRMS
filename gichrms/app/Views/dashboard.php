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

<body class="bg-[#f8fafc] overflow-x-hidden h-screen">

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

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4 lg:p-5">
                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 m-4 lg:m-6">
                    <!-- Left -->
                    <div>

                        <h1 class="text-xl sm:text-2xl font-bold text-slate-800 ">
                            Dashboard
                        </h1>

                        <!-- Breadcrumb -->
                        <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-gray-500">
                            <i data-lucide="house" class="w-4 h-4"></i>
                            <span>Home</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span>Super Admin</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="font-medium text-slate-700">
                                Dashboard
                            </span>

                        </div>

                    </div>

                    <!-- Right -->
                    <div class="flex flex-wrap items-center gap-2">
                        <!-- Date Range -->
                        <button
                            class="w-full sm:w-auto bg-white border border-gray-200 rounded-md px-4 py-2 shadow-sm flex items-center justify-center gap-2">

                            <i data-lucide="calendar-days" class="w-4 h-4"></i>

                            <span>
                                05/06/2026 - 05/06/2026
                            </span>

                        </button>

                        <!-- Collapse -->
                        <button
                            class="bg-white border border-gray-200 rounded-md w-10 h-10 flex items-center justify-center shadow-sm">

                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>

                        </button>

                    </div>

                </div>

                <!-- Welcome Banner -->
                <div class="relative overflow-hidden rounded-md bg-orange-500 p-5 sm:p-8 mb-6 m-4 lg:m-6">

                    <!-- Decorative circles -->
                    <div class="absolute -top-8 -left-8 h-20 w-20 rounded-full bg-orange-400 opacity-40"></div>
                    <div class="absolute -bottom-10 -right-10 h-32 w-32 rounded-full bg-orange-300 opacity-40"></div>

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 relative z-10">

                        <!-- Left -->
                        <div>
                            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white">
                                Welcome Back, User
                            </h2>

                            <p class="mt-2 text-orange-100">
                                14 New Companies Subscribed Today !!!
                            </p>
                        </div>

                        <!-- Right Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">

                            <button class="bg-slate-900 text-white px-5 py-2 rounded-md font-medium w-full sm:w-auto">
                                Companies
                            </button>

                            <button class="bg-white text-slate-800 px-5 py-2 rounded-md font-medium w-full sm:w-auto">
                                All Packages
                            </button>

                        </div>

                    </div>

                </div>

                <!-- Stats Cards Section-->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 lg:gap-6 m-4 lg:m-6">

                    <!-- Card 1 -->
                    <div class="bg-white rounded-md p-6 min-h-[150px] border border-gray-200 shadow-md">

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">

                            <div class="w-7 h-7 bg-slate-900 rounded-md flex items-center justify-center">

                                <i data-lucide="building-2" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-green-500 text-white text-xs px-2 py-2 rounded">
                                +19.01%
                            </span>

                        </div>

                        <h3 class="mt-5 text-xl sm:text-2xl font-semibold text-slate-800 break-all">
                            5468
                        </h3>

                        <p class="text-xs text-gray-500 break-words mt-1">
                            Total Companies
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart1" width="70" height="40"></canvas>
                        </div>

                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-md p-6 min-h-[150px] border border-gray-200 shadow-md">

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">

                            <div class="w-8 h-8 bg-slate-900 rounded-md flex items-center justify-center">

                                <i data-lucide="briefcase-business" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-red-500 text-white text-xs font-semibold px-2 py-2 rounded">
                                -12%
                            </span>

                        </div>

                        <h3 class="mt-5 text-xl sm:text-2xl font-semibold text-slate-800 break-all">
                            4598
                        </h3>

                        <p class="text-xs text-gray-500 break-words mt-1">
                            Active Companies
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart2" width="70" height="40"></canvas>
                        </div>

                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-md p-6 min-h-[150px] border border-gray-200 shadow-md">
                        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
                            <div class="w-7 h-7 bg-slate-900 rounded-md flex items-center justify-center">

                                <i data-lucide="users" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-green-500 text-white text-xs font-semibold px-2 py-2 rounded">
                                +6%
                            </span>

                        </div>

                        <h3 class="mt-5 text-xl sm:text-2xl font-semibold text-slate-800 break-all">
                            3698
                        </h3>

                        <p class="text-xs text-gray-500 break-words mt-1">
                            Total Subscribers
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart3" width="70" height="40"></canvas>
                        </div>

                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-md p-6 min-h-[150px] border border-gray-200 shadow-md">

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">

                            <div class="w-7 h-7 bg-slate-900 rounded-md flex items-center justify-center">

                                <i data-lucide="wallet" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-red-500 text-white text-xs font-semibold px-2 py-2 rounded">
                                -16%
                            </span>

                        </div>

                        <h3 class="mt-5 text-xl sm:text-2xl font-semibold text-slate-800 break-all">
                            $89,878,58
                        </h3>

                        <p class="text-xs text-gray-500 break-words mt-1">
                            Total Earnings
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart4" width="70" height="40"></canvas>
                        </div>

                    </div>




                </div>


                <!-- Charts -->
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-4 lg:gap-6 m-4 lg:m-6">

                    <!-- Companies -->
                    <div class="xl:col-span-3">
                        <div class="bg-white rounded-md border border-gray-200 min-h-[390px] shadow-sm flex flex-col">

                            <!-- Header -->
                            <div class="flex flex-wrap items-center justify-between gap-2 p-3 border-b">

                                <h3 class="text-lg font-semibold text-slate-800">
                                    Companies
                                </h3>

                                <button class="flex items-center gap-2 text-sm border rounded-md px-3 py-2">

                                    <i data-lucide="calendar-days" class="w-4 h-4"></i>

                                    This Week

                                </button>

                            </div>

                            <!-- Chart -->
                            <div class="p-4">
                                <div class="h-[180px] sm:h-[220px] min-h-[180px]">
                                    <canvas id="companiesChart"></canvas>
                                </div>

                                <div class="mt-6 flex items-center gap-2 ">

                                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded font-semibold">
                                        +6%
                                    </span>

                                    <span class="text-gray-500 text-sm">
                                        5 Companies from last month
                                    </span>

                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Revenue -->
                    <div class="xl:col-span-6">
                        <div class="bg-white rounded-md border border-gray-200 min-h-[390px] shadow-sm flex flex-col">

                            <div class="flex flex-wrap items-center justify-between gap-2 p-3 border-b">

                                <h3 class="text-lg font-semibold text-slate-800">
                                    Revenue
                                </h3>

                                <button class="flex items-center gap-2 border rounded-lg px-3 py-2 text-sm">

                                    <i data-lucide="calendar-days" class="w-4 h-4"></i>

                                    2025

                                </button>

                            </div>

                            <div class="p-4">

                                <div class="flex flex-col sm:flex-row sm:justify-between gap-4">

                                    <div>
                                        <h2 class="text-3xl font-bold text-slate-800">
                                            $45,787
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-500">
                                            <span class="text-green-500 font-semibold">
                                                +40%
                                            </span>

                                            increased from last year
                                        </p>
                                    </div>

                                    <div class="flex flex-wrap items-center gap-2 mt-2">
                                        <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                                        <span class="text-sm text-slate-700">
                                            Revenue
                                        </span>
                                    </div>

                                </div>

                                <div class="mt-4 h-[230px] min-h-[230px]">
                                    <canvas id="revenueChart"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Top Plans -->
                    <div class="xl:col-span-3">
                        <div class="bg-white rounded-md border border-gray-200 min-h-[390px] shadow-sm flex flex-col">

                            <div class="flex flex-wrap items-center justify-between gap-2 p-3 border-b">

                                <h3 class="text-md font-semibold text-slate-800">
                                    Top Plans
                                </h3>

                                <button class="flex items-center gap-2 border rounded-lg px-3 py-2 text-sm">

                                    <i data-lucide="calendar-days" class="w-4 h-4"></i>

                                    This Month

                                </button>

                            </div>

                            <div class="p-4 flex-1 flex flex-col">
                                <div class="h-[180px] min-h-[180px] flex items-center justify-center">

                                    <canvas id="plansChart"></canvas>
                                </div>
                                <div class="mt-6 mb-2 space-y-3">

                                    <div class="flex justify-between items-center">

                                        <div class="flex text-sm items-center gap-2">
                                            <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                                            <span>Basic</span>
                                        </div>

                                        <span class="text-sm font-semibold">20%</span>

                                    </div>

                                    <div class="flex justify-between items-center">

                                        <div class="flex text-sm items-center gap-2">
                                            <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                                            <span>Premium</span>
                                        </div>

                                        <span class="text-sm font-semibold">20%</span>

                                    </div>

                                    <div class="flex justify-between items-center">

                                        <div class="flex text-sm items-center gap-2">
                                            <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                            <span>Enterprise</span>
                                        </div>

                                        <span class="text-sm font-semibold">60%</span>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <!-- Recent Activities Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6 m-4 lg:m-6">

                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-md border border-gray-200 shadow-sm flex flex-col">

                        <div class="flex flex-wrap items-center justify-between gap-2 p-3 border-b">

                            <h3 class="font-semibold text-slate-800">
                                Recent Transactions
                            </h3>

                            <button class="flex items-center justify-center gap-2 text-sm border rounded-lg px-3 py-2 whitespace-nowrap">

                                View All

                                <i data-lucide="arrow-right" class="w-4 h-4"></i>

                            </button>

                        </div>

                        <div class="divide-y">

                            <!-- Item -->
                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Stellar Dynamics
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #12457 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm font-semibold text-slate-800 mb-1">
                                        +$245
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Basic (Monthly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Quantum Nexus
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #65974 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm font-semibold text-slate-800 mb-1">
                                        +$395
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Enterprise (Yearly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Aurora Technologies
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #22457 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm font-semibold text-slate-800 mb-1">
                                        +$145
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Advanced (Monthly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Epicurean Delights
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #43567 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm font-semibold text-slate-800 mb-1">
                                        +$145
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Enterprise (Monthly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Epicurean Delights
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #12453 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm font-semibold text-slate-800 mb-1">
                                        +$977
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Premium (Yearly)
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Recent Registered -->
                    <div class="bg-white rounded-md border border-gray-200 shadow-sm flex flex-col">

                        <div class="flex flex-wrap items-center justify-between gap-2 p-3 border-b">

                            <h3 class="font-semibold text-slate-800">
                                Recently Registered
                            </h3>

                            <button class="flex items-center justify-center gap-2 text-sm border rounded-lg px-3 py-2 whitespace-nowrap">

                                View All

                                <i data-lucide="arrow-right" class="w-4 h-4"></i>

                            </button>

                        </div>

                        <div class="divide-y">

                            <!-- Item -->
                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Pitch
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            Basic (Monthly)
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-slate-500 mb-1">
                                        150 Users
                                    </p>

                                    <p class="text-xs text-slate-800 break-words">
                                        pitch.example.com
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Initech
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            Enterprise (Yearly)
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-slate-500 mb-1">
                                        200 Users
                                    </p>

                                    <p class="text-xs text-slate-800 break-words">
                                        initech.example.com
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Umbrella Corp
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            Advanced (Monthly)
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-slate-500 mb-1">
                                        129 Users
                                    </p>

                                    <p class="text-xs text-slate-800 break-words">
                                        umbcorp.example.com
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Capital Partners
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            Enterprise (Monthly)
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-slate-500 mb-1">
                                        103 Users
                                    </p>

                                    <p class="text-xs text-slate-800 break-words">
                                        capitalpart.example.com
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Massive Dynamic
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            Premium (Yearly)
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-slate-500 mb-1">
                                        108 Users
                                    </p>

                                    <p class="text-xs text-slate-800 break-words">
                                        msdynamic.example.com
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Recent Plans Expired -->
                    <div class="bg-white rounded-md border border-gray-200 shadow-sm flex flex-col">
                        <div class="flex flex-wrap items-center justify-between gap-2 p-3 border-b">

                            <h3 class="font-semibold text-slate-800">
                                Recent Plan Expired
                            </h3>

                            <button class="flex items-center justify-center gap-2 text-sm border rounded-lg px-3 py-2 whitespace-nowrap">
                                View All
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>

                        </div>

                        <div class="divide-y">

                            <!-- Names of the Companies -->
                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Silicon Corp
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #12457 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-blue-600 mb-1">
                                        Send Reminder
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Basic (Monthly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Hubspot
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #65974 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-blue-600 mb-1">
                                        Send Reminder
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Enterprise (Yearly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Licon Industries
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #12457 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-blue-600 mb-1">
                                        Send Reminder
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Advanced (Monthly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            TerraFusion Energy
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #43421 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-blue-600 mb-1">
                                        Send Reminder
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Enterprise (Monthly)
                                    </p>

                                </div>

                            </div>

                            <div class="p-3 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

                                <div class="flex items-center gap-4">

                                    <div class="w-7 h-7 rounded-full border border-gray-200 bg-gray-50 flex-shrink-0">
                                    </div>

                                    <div>

                                        <h4 class="text-sm font-semibold text-slate-800 mb-1 break-words">
                                            Epicurean Delights
                                        </h4>

                                        <p class="text-xs text-gray-500 break-words">
                                            #43567 • 14 Jan 2025
                                        </p>

                                    </div>
                                </div>

                                <div class="text-right">

                                    <p class=" text-sm text-blue-600 mb-1">
                                        Send Reminder
                                    </p>

                                    <p class="text-xs text-gray-500 break-words">
                                        Premium (Yearly)
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

            </main>

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

    
    <!-- Companies Chart Data -->
    <script>
        new Chart(
            document.getElementById('companiesChart'),
            {
                type: 'bar',
                data: {
                    labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],

                    datasets: [{
                        data: [40, 60, 20, 80, 60, 50, 30],
                        backgroundColor: '#1f2937',
                        borderRadius: 12,
                        borderSkipped: false
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
                    layout: {
                        padding: {
                            top: 10,
                            bottom: 0
                        }
                    },

                    scales: {
                        x: {
                            grid: {
                                display: true,
                                color: '#f3f4f6'
                            },

                            border: {
                                color: '#e5e7eb'
                            }
                        },

                        y: {
                            grid: {
                                color: '#e5e7eb',
                                borderDash: [4, 4]
                            },

                            ticks: {
                                display: false
                            },

                            border: {
                                display: false
                            }
                        }
                    }
                }
            });
    </script>

    <!-- Revenue Chart Data -->
    <script>
        new Chart(
            document.getElementById('revenueChart'),
            {
                type: 'bar',
                data: {
                    labels: [
                        'Jan', 'Feb', 'Mar', 'Apr',
                        'May', 'Jun', 'Jul', 'Aug',
                        'Sep', 'Oct', 'Nov', 'Dec'
                    ],

                    datasets: [{
                        label: 'Revenue',
                        data: [
                            40, 30, 45, 80,
                            85, 90, 80, 80,
                            80, 85, 20, 80
                        ],
                        backgroundColor: '#f97316',
                        borderRadius: 8,
                        borderSkipped: false
                    }]
                },

                options: {
                    layout: {
                        padding: {
                            top: 5,
                            right: 0,
                            bottom: 5,
                            left: 0
                        }
                    },
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
                            min: 0,
                            max: 100,

                            ticks: {
                                stepSize: 20,
                                callback: (value) => value + 'K'
                            },
                            border: {
                                display: false
                            },
                            grid: {
                                color: '#f1f5f9',
                                borderDash: [5, 5]
                            }
                        }
                    }
                }
            });
    </script>

    <!-- Plans Chart Data -->
    <script>
        new Chart(
            document.getElementById('plansChart'),
            {
                type: 'doughnut',
                data: {
                    labels: [
                        'Basic',
                        'Premium',
                        'Enterprise'
                    ],
                    datasets: [{
                        data: [60, 20, 20],
                        backgroundColor: [
                            '#f97316',
                            '#facc15',
                            '#3b82f6'
                        ],
                        borderWidth: 0
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '50%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
    </script>

</body>

