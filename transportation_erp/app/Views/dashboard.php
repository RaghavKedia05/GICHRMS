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





            </main>

        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>

    








</body>

</html>