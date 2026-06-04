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
            <main class="p-6">
                <div class="grid gap-6" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr))">

                    <!-- Card 1 -->
                    <div class="bg-white rounded-sm p-6 shadow-sm">

                        <div class="flex items-start justify-between">

                            <!-- Left Side -->
                            <div>

                                <div class="flex items-start gap-4">

                                    <!-- Icon -->
                                    <div class="w-12 h-12 rounded-lg bg-violet-500 flex items-center justify-center">
                                        <i data-lucide="users" class="w-5 h-5 text-white"></i>
                                    </div>

                                    <!-- Title & Number -->
                                    <div>
                                        <p class="text-black-500 text-sm font-sm">
                                            Total Employees
                                        </p>

                                        <h2 class="text-4xl font-semibold mt-1">
                                            12,116
                                        </h2>
                                    </div>

                                </div>

                                <!-- Growth Text -->
                                <div class="flex items-center gap-2 mt-4 ml-16">
                                    <span class="text-green-500 text-xs font-medium">
                                        ↑ 2.45%
                                    </span>
                                    <span class="text-slate-400 text-sm">
                                        Increased this year
                                    </span>
                                </div>

                            </div>

                            <!-- Progress Circle -->
                            <div class="relative w-16 h-16">

                                <div class="w-16 h-16 rounded-full"
                                    style="background: conic-gradient(#7c3aed 40%, #ede9fe 40%);">
                                </div>

                                <div class="absolute inset-1 bg-white rounded-full flex items-center justify-center">

                                    <span class="text-sm font-semibold text-violet-500">
                                        40%
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-sm p-6 shadow-sm">

                        <div class="flex items-start justify-between">

                            <!-- Left Side -->
                            <div>

                                <div class="flex items-start gap-4">

                                    <!-- Icon -->
                                    <div class="w-12 h-12 rounded-lg bg-orange-500 flex items-center justify-center">
                                        <i data-lucide="user-plus" class="w-5 h-5 text-white"></i>
                                    </div>

                                    <!-- Title & Number -->
                                    <div>
                                        <p class="text-black-500 text-sm font-sm">
                                            New Employees
                                        </p>

                                        <h2 class="text-4xl font-semibold mt-1">
                                            1,116
                                        </h2>
                                    </div>

                                </div>

                                <!-- Growth Text -->
                                <div class="flex items-center gap-2 mt-4 ml-16">
                                    <span class="text-red-500 text-xs font-medium">
                                        ↓ 1.95%
                                    </span>
                                    <span class="text-slate-400 text-sm">
                                        Decreased this year
                                    </span>
                                </div>

                            </div>

                            <!-- Progress Circle -->
                            <div class="relative w-16 h-16">

                                <div class="w-16 h-16 rounded-full"
                                    style="background: conic-gradient(#f97316 20%, #fde7df 20%);">
                                </div>

                                <div class="absolute inset-1 bg-white rounded-full flex items-center justify-center">

                                    <span class="text-sm font-semibold text-orange-500">
                                        20%
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-sm p-6 shadow-sm min-h-[135px]">

                        <div class="flex items-start justify-between gap-4">

                            <!-- Left Side -->
                            <div>

                                <div class="flex items-start gap-4">

                                    <!-- Icon -->
                                    <div class="w-12 h-12 rounded-lg bg-green-500 flex items-center justify-center">
                                        <i data-lucide="user-minus" class="w-5 h-5 text-white"></i>
                                    </div>

                                    <!-- Title & Number -->
                                    <div>
                                        <p class="text-black-500 text-sm">
                                            Resigned Employees
                                        </p>

                                        <h2 class="text-4xl font-semibold mt-1">
                                            102
                                        </h2>
                                    </div>

                                </div>

                                <!-- Growth Text -->
                                <div class="flex items-center gap-2 mt-4 ml-16">

                                    <span class="text-red-500 text-xs font-medium">
                                        ↓ 2.5%
                                    </span>

                                    <span class="text-slate-400 text-sm">
                                        Decreased this year
                                    </span>

                                </div>

                            </div>

                            <!-- Progress Circle -->
                            <div class="relative w-16 h-16 flex-shrink-0">

                                <div class="w-16 h-16 rounded-full"
                                    style="background: conic-gradient(#22c55e 50%, #dcfce7 50%);">
                                </div>

                                <div class="absolute inset-1 bg-white rounded-full flex items-center justify-center">

                                    <span class="text-lg font-semibold text-green-500">
                                        50%
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-xl p-6 shadow-sm min-h-[135px]">

                        <div class="flex items-start justify-between gap-4">

                            <!-- Left Side -->
                            <div>

                                <div class="flex items-start gap-4">

                                    <!-- Icon -->
                                    <div class="w-12 h-12 rounded-lg bg-blue-500 flex items-center justify-center">
                                        <i data-lucide="contact-round" class="w-5 h-5 text-white"></i>
                                    </div>

                                    <!-- Title & Number -->
                                    <div>
                                        <p class="text-black-500 text-sm">
                                            Employees On Leave
                                        </p>

                                        <h2 class="text-4xl font-semibold mt-1">
                                            212
                                        </h2>
                                    </div>

                                </div>

                                <!-- Growth Text -->
                                <div class="flex items-center gap-2 mt-4 ml-16">

                                    <span class="text-green-500 text-xs font-medium">
                                        ↑ 1.32%
                                    </span>

                                    <span class="text-slate-400 text-sm">
                                        Increased this year
                                    </span>

                                </div>

                            </div>

                            <!-- Progress Circle -->
                            <div class="relative w-16 h-16 flex-shrink-0">

                                <div class="w-16 h-16 rounded-full"
                                    style="background: conic-gradient(#2196f3 60%, #dbeafe 60%);">
                                </div>

                                <div class="absolute inset-1 bg-white rounded-full flex items-center justify-center">

                                    <span class="text-lg font-semibold text-blue-500">
                                        60%
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

                <!-- Attendance,Upcoming Events,Emplyee work piechart Card -->
                <div class="grid grid-cols-12 gap-6 mt-6">

                    <!-- Attendance Card -->
                    <div class="col-span-6 bg-white rounded-sm shadow-sm">
                        <div class="p-5 border-b border-slate-100">
                            <h3 class="text-md font-sm">
                                Attendance Overview
                            </h3>
                        </div>

                        <div class="p-6">
                            <canvas id="attendanceChart" height="150"></canvas>
                        </div>
                    </div>

                    <!-- Upcoming Events Card -->
                    <div class="col-span-3 bg-white rounded-sm shadow-sm">

                    </div>

                    <!-- Employee Work Pie Chart Card -->
                    <div class="col-span-3 bg-white rounded-sm shadow-sm">

                    </div>

                </div>




            </main>

        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>


    <!-- Attendance Chart Data -->
    <script>
        new Chart(document.getElementById('attendanceChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Job Views',
                    data: [20, 30, 25, 50, 25, 30, 20, 35, 20, 30, 25, 50],
                    backgroundColor: '#6C63FF',
                    borderRadius: 10,
                    barThickness: 10
                }, {
                    label: 'Job Applied',
                    data: [13, 23, 20, 25, 20, 23, 13, 15, 13, 23, 20, 25],
                    backgroundColor: '#FF6B3D',
                    borderRadius: 10,
                    barThickness: 10
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: { display: false },
                        border: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        max: 50,
                        ticks: { stepSize: 5 },
                        border: { display: false },
                        grid: {
                            color: '#edf2f7'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: 'black',
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 6,
                            boxHeight: 6,
                            padding: 10
                        }
                    }
                }
            }
        });
    </script>


</body>

</html>