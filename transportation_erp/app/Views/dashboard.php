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
            <nav class="h-[72px] bg-white border-b border-slate-200 flex items-center justify-between px-8">

                <div>
                    <h1 class="text-[20px] font-semibold text-black">
                        Dashboard
                    </h1>
                </div>

                <!-- Search Button,Notification, Profile, Settings -->
                <div class="flex items-center gap-5">

                    <!-- Search -->
                    <button class="text-slate-600 hover:text-indigo-600 transition">
                        <i data-lucide="search"></i>
                    </button>

                    <!-- Notification -->
                    <button class="text-slate-600 hover:text-indigo-600 transition">
                        <i data-lucide="bell"></i>
                    </button>

                    <!-- Profile -->
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-500 text-white flex items-center justify-center">
                            RK
                        </div>

                        <div class="text-right">
                            <p class="font-small text-slate-800">
                                Mr. Kedia
                            </p>
                        </div>

                    </div>

                    <!-- Settings -->
                    <button class="text-slate-600 hover:text-indigo-600 transition">
                        <i data-lucide="settings"></i>
                    </button>

                </div>

            </nav>

            <!-- Main Content -->
            <main class="p-6">

                <div class="grid grid-cols-3 gap-6">

                    <!-- LEFT SIDE -->
                    <div class="col-span-2">

                        <div class="grid grid-cols-2 gap-6">

                            <!-- Card 1 -->
                            <div class="bg-white rounded-md border border-slate-100 p-6 relative h-[120px]">
                                <p class="text-slate-500">Total Sales</p>
                                <h2 class="text-3xl font-bold mt-2">$24.5K</h2>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white rounded-md border border-slate-100 p-6 relative h-[120px]">
                                <p class="text-slate-500">Orders</p>
                                <h2 class="text-3xl font-bold mt-2">145</h2>
                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white rounded-md border border-slate-100 p-6 relative h-[120px]">
                                <p class="text-slate-500">Drivers</p>
                                <h2 class="text-3xl font-bold mt-2">52</h2>
                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white rounded-md border border-slate-100 p-6 relative h-[120px]">
                                <p class="text-slate-500">Vehicles</p>
                                <h2 class="text-3xl font-bold mt-2">128</h2>
                            </div>

                        </div>

                    </div>

                    <!-- RIGHT SIDE -->
                    <div class="bg-white rounded-md border border-slate-100 p-6 relative h-[120px]">

                        <h3 class="text-lg font-semibold mb-4">
                            Fleet Distribution
                        </h3>

                        <div class="h-64 flex items-center justify-center text-slate-400">

                            Pie Chart Here

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