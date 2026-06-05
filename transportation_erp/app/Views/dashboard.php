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

<body class="bg-[#f5f6fa]">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-[240px] bg-white border-r border-slate-200 ">

            <a href="#" onclick="location.reload()" class="h-[72px] flex items-center px-4 border-b border-slate-200">
                <h2 class="text-xl font-semibold text-slate-900">
                    SuperAdmin HRMS
                </h2>
            </a>


            <nav class="px-3 py-3 overflow-y-auto h-[calc(100vh-72px)]">

                <h6 class="px-1 mt-4 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
                    Dashboard
                </h6>

                <!-- Dashboard -->
                <a href="#" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4            
                    text-slate-500
                    bg-indigo-500
                    text-white
                    hover:bg-indigo-500
                    hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <i data-lucide="home" class="w-3.5 h-3.5"></i>
                        <span class="text-[13px]">Dashboards</span>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>

                <h6 class="px-1 mt-6 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
                    COMPANIES
                </h6>

                <!-- Companies -->
                <a href="#" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
                    text-slate-500
                    hover:bg-indigo-500
                    hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
                        <span class="text-[13px]">Companies</span>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>

                <h6 class="px-2 mt-6 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
                    FINANCE
                </h6>

                <!-- Subscriptions -->
                <a href="#" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
                   text-slate-500
                    hover:bg-indigo-500
                    hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <i data-lucide="crown" class="w-4 h-4"></i>
                        <span class="text-[13px]">Subscriptions</span>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>



                <!-- Purchased -->
                <a href="#" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
                    text-slate-500
                    hover:bg-indigo-500
                    hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                        <span class="text-[13px]">Purchased</span>
                    </div>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>

            </nav>

        </aside>

        <!-- Main -->
        <div class="flex-1 flex flex-col">

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

            <!-- Main Content -->
            <main>
                <!-- Header -->
                <div class="flex items-start justify-between mt-6 mb-6 m-6">
                    <!-- Left -->
                    <div>

                        <h1 class="text-sm font-bold text-slate-800 ">
                            Dashboard
                        </h1>

                        <!-- Breadcrumb -->
                        <div class="flex items-center gap-2 mt-2 text-sm text-gray-500">
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
                    <div class="flex items-center gap-2">
                        <!-- Date Range -->
                        <button
                            class="bg-white border border-gray-200 rounded-lg px-4 py-2 shadow-sm flex items-center gap-2">

                            <i data-lucide="calendar-days" class="w-4 h-4"></i>

                            <span>
                                05/06/2026 - 05/06/2026
                            </span>

                        </button>

                        <!-- Collapse -->
                        <button
                            class="bg-white border border-gray-200 rounded-lg w-10 h-10 flex items-center justify-center shadow-sm">

                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>

                        </button>

                    </div>

                </div>

                <!-- Welcome Banner -->
                <div class="relative overflow-hidden rounded-2xl bg-orange-500 p-8 mb-6 m-6">

                    <!-- Decorative circles -->
                    <div class="absolute -top-8 -left-8 h-20 w-20 rounded-full bg-orange-400 opacity-40"></div>
                    <div class="absolute -bottom-10 -right-10 h-32 w-32 rounded-full bg-orange-300 opacity-40"></div>

                    <div class="flex items-center justify-between relative z-10">

                        <!-- Left -->
                        <div>
                            <h2 class="text-4xl font-bold text-white">
                                Welcome Back, User
                            </h2>

                            <p class="mt-2 text-orange-100">
                                14 New Companies Subscribed Today !!!
                            </p>
                        </div>

                        <!-- Right Buttons -->
                        <div class="flex gap-3">

                            <button class="bg-slate-900 text-white px-5 py-2 rounded-lg font-medium">
                                Companies
                            </button>

                            <button class="bg-white text-slate-800 px-5 py-2 rounded-lg font-medium">
                                All Packages
                            </button>

                        </div>

                    </div>

                </div>

                <!-- Stats Cards Section-->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6 m-6">

                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-200">

                        <div class="flex justify-between items-start">

                            <div class="w-11 h-11 bg-slate-900 rounded-lg flex items-center justify-center">

                                <i data-lucide="building-2" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                +19.01%
                            </span>

                        </div>

                        <h3 class="mt-5 text-4xl font-bold text-slate-800">
                            5468
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Total Companies
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart1" width="70" height="40"></canvas>
                        </div>

                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-200">

                        <div class="flex justify-between items-start">

                            <div class="w-11 h-11 bg-slate-900 rounded-lg flex items-center justify-center">

                                <i data-lucide="briefcase-business" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                -12%
                            </span>

                        </div>

                        <h3 class="mt-5 text-4xl font-bold text-slate-800">
                            4598
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Active Companies
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart2" width="70" height="40"></canvas>
                        </div>

                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-200">
                        <div class="flex justify-between items-start">
                            <div class="w-11 h-11 bg-slate-900 rounded-lg flex items-center justify-center">

                                <i data-lucide="users" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                +6%
                            </span>

                        </div>

                        <h3 class="mt-5 text-4xl font-bold text-slate-800">
                            3698
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Total Subscribers
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart3" width="70" height="40"></canvas>
                        </div>

                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-200">

                        <div class="flex justify-between items-start">

                            <div class="w-11 h-11 bg-slate-900 rounded-lg flex items-center justify-center">

                                <i data-lucide="wallet" class="w-5 h-5 text-white">
                                </i>

                            </div>

                            <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                                -16%
                            </span>

                        </div>

                        <h3 class="mt-5 text-4xl font-bold text-slate-800">
                            $89,878.58
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Total Earnings
                        </p>

                        <div class="flex justify-end mt-4">
                            <canvas id="miniChart4" width="70" height="40"></canvas>
                        </div>

                    </div>




                </div>


                <!-- Charts -->
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mb-6 m-6">

                    <!-- Companies -->
                    <div class="xl:col-span-3">
                        <div class="bg-white rounded-2xl border border-gray-200 h-full">

                            <!-- Header -->
                            <div class="flex items-center justify-between p-6 border-b">

                                <h3 class="text-lg font-semibold text-slate-800">
                                    Companies
                                </h3>

                                <button class="flex items-center gap-2 text-sm border rounded-lg px-3 py-2">

                                    <i data-lucide="calendar-days" class="w-4 h-4"></i>

                                    This Week

                                </button>

                            </div>

                            <!-- Chart -->
                            <div class="p-6">

                                <canvas id="companiesChart"></canvas>

                                <div class="mt-6 flex items-center gap-2">

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
                        <div class="bg-white rounded-2xl border border-gray-200 h-full">

                            <div class="flex justify-between items-center p-6 border-b">

                                <h3 class="text-lg font-semibold text-slate-800">
                                    Revenue
                                </h3>

                                <button class="flex items-center gap-2 border rounded-lg px-3 py-2 text-sm">

                                    <i data-lucide="calendar-days" class="w-4 h-4"></i>

                                    2025

                                </button>

                            </div>

                            <div class="p-6">

                                <h2 class="text-3xl font-bold text-slate-800">
                                    $45,787
                                </h2>

                                <p class="mt-1">
                                    <span class="text-green-500 font-semibold">
                                        +40%
                                    </span>

                                    <span class="text-gray-500">
                                        increased from last year
                                    </span>
                                </p>

                                <div class="mt-6">
                                    <canvas id="revenueChart"></canvas>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Top Plans -->
                    <div class="xl:col-span-3">
                        <div class="bg-white rounded-2xl border border-gray-200 h-full">

                            <div class="flex justify-between items-center p-6 border-b">

                                <h3 class="text-lg font-semibold text-slate-800">
                                    Top Plans
                                </h3>

                                <button class="flex items-center gap-2 border rounded-lg px-3 py-2 text-sm">

                                    <i data-lucide="calendar-days" class="w-4 h-4"></i>

                                    This Month

                                </button>

                            </div>

                            <div class="p-6">

                                <canvas id="plansChart"></canvas>

                                <div class="mt-8 space-y-4">

                                    <div class="flex justify-between">

                                        <div class="flex items-center gap-2">
                                            <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                                            <span>Basic</span>
                                        </div>

                                        <span class="font-semibold">20%</span>

                                    </div>

                                    <div class="flex justify-between">

                                        <div class="flex items-center gap-2">
                                            <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                                            <span>Premium</span>
                                        </div>

                                        <span class="font-semibold">20%</span>

                                    </div>

                                    <div class="flex justify-between">

                                        <div class="flex items-center gap-2">
                                            <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                            <span>Enterprise</span>
                                        </div>

                                        <span class="font-semibold">60%</span>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <!-- Recent Activities Section -->
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 m-6">
                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-2xl border border-gray-200">

                        <div class="flex items-center justify-between p-6 border-b">

                            <h3 class="font-semibold text-slate-800">
                                Recent Transactions
                            </h3>

                            <button class="flex items-center gap-2 text-sm border rounded-lg px-3 py-2">

                                View All

                                <i data-lucide="arrow-right" class="w-4 h-4"></i>

                            </button>

                        </div>

                        <div class="divide-y">

                            <!-- Item -->
                            <div class="p-5 flex justify-between items-center">

                                <div>

                                    <h4 class="font-medium text-slate-800">
                                        Stellar Dynamics
                                    </h4>

                                    <p class="text-sm text-gray-500">
                                        #12457 • 14 Jan 2025
                                    </p>

                                </div>

                                <div class="text-right">

                                    <p class="font-semibold text-green-600">
                                        +$245
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Basic Monthly
                                    </p>

                                </div>

                            </div>

                            <div class="p-5 flex justify-between items-center">

                                <div>

                                    <h4 class="font-medium text-slate-800">
                                        Nova Industries
                                    </h4>

                                    <p class="text-sm text-gray-500">
                                        #12458 • 15 Jan 2025
                                    </p>

                                </div>

                                <div class="text-right">

                                    <p class="font-semibold text-green-600">
                                        +$560
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Premium
                                    </p>

                                </div>

                            </div>

                            <div class="p-5 flex justify-between items-center">

                                <div>

                                    <h4 class="font-medium text-slate-800">
                                        Apex Solutions
                                    </h4>

                                    <p class="text-sm text-gray-500">
                                        #12459 • 16 Jan 2025
                                    </p>

                                </div>

                                <div class="text-right">

                                    <p class="font-semibold text-green-600">
                                        +$890
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Enterprise
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Recent Registered -->
                    <div class="bg-white rounded-2xl border border-gray-200">

                        <div class="flex items-center justify-between p-6 border-b">

                            <h3 class="font-semibold text-slate-800">
                                Recently Registered
                            </h3>

                            <button class="flex items-center gap-2 text-sm border rounded-lg px-3 py-2">

                                View All

                                <i data-lucide="arrow-right" class="w-4 h-4"></i>

                            </button>

                        </div>

                        <div class="divide-y">

                            <div class="p-5 flex items-center justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">

                                        <i data-lucide="building-2" class="w-5 h-5 text-orange-500"></i>

                                    </div>

                                    <div>

                                        <h4 class="font-medium">
                                            TechVerse Ltd
                                        </h4>

                                        <p class="text-sm text-gray-500">
                                            Registered Today
                                        </p>

                                    </div>

                                </div>

                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">
                                    Active
                                </span>

                            </div>

                            <div class="p-5 flex items-center justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">

                                        <i data-lucide="building-2" class="w-5 h-5 text-blue-500"></i>

                                    </div>

                                    <div>

                                        <h4 class="font-medium">
                                            Core Systems
                                        </h4>

                                        <p class="text-sm text-gray-500">
                                            Yesterday
                                        </p>

                                    </div>

                                </div>

                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">
                                    Active
                                </span>

                            </div>

                            <div class="p-5 flex items-center justify-between">

                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">

                                        <i data-lucide="building-2" class="w-5 h-5 text-purple-500"></i>

                                    </div>

                                    <div>

                                        <h4 class="font-medium">
                                            Quantum Labs
                                        </h4>

                                        <p class="text-sm text-gray-500">
                                            2 Days Ago
                                        </p>

                                    </div>

                                </div>

                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">
                                    Active
                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- Recent Plans Expired -->
                    <div class="bg-white rounded-2xl border border-gray-200">
                        <div class="flex items-center justify-between p-6 border-b">

                            <h3 class="font-semibold text-slate-800">
                                Recent Plan Expired
                            </h3>

                            <button class="flex items-center gap-2 text-sm border rounded-lg px-3 py-2">
                                View All
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>

                        </div>

                        <div class="divide-y">
                            <div class="p-5 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                        <i data-lucide="clock-3" class="w-5 h-5 text-red-500"></i>
                                    </div>

                                    <div>
                                        <h4 class="font-medium">
                                            Nexa Technologies
                                        </h4>

                                        <p class="text-sm text-gray-500">
                                            Expired Today
                                        </p>
                                    </div>

                                </div>

                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded">
                                    Expired
                                </span>

                            </div>

                            <div class="p-5 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                        <i data-lucide="clock-3" class="w-5 h-5 text-red-500"></i>
                                    </div>

                                    <div>

                                        <h4 class="font-medium">
                                            GlobalX Corp
                                        </h4>

                                        <p class="text-sm text-gray-500">
                                            Yesterday
                                        </p>

                                    </div>

                                </div>

                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded">
                                    Expired
                                </span>

                            </div>

                            <div class="p-5 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                        <i data-lucide="clock-3" class="w-5 h-5 text-red-500"></i>

                                    </div>

                                    <div>
                                        <h4 class="font-medium">
                                            FutureNet
                                        </h4>

                                        <p class="text-sm text-gray-500">
                                            2 Days Ago
                                        </p>
                                    </div>

                                </div>

                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded">
                                    Expired
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>

    </div>













    <script>
        lucide.createIcons();
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
                        data: [6, 9, 3, 12, 9, 9, 9],
                        backgroundColor: '#1f2937',
                        borderRadius: 12,
                        borderSkipped: false
                    }]
                },

                options: {
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
                            display: false
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
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',

                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle'
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
                            ticks: {
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
                        data: [20, 20, 60],
                        backgroundColor: [
                            '#f97316',
                            '#facc15',
                            '#3b82f6'
                        ],
                        borderWidth: 0
                    }]
                },

                options: {
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

</html>