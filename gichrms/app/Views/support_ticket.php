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

<body class="bg-slate-100 overflow-x-hidden">

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

            <div class="flex-1 overflow-y-auto p-4 md:p-6">

                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 mb-6">

                    <div>

                        <h1 class="text-2xl font-semibold text-slate-800">
                            Tenant Support Tickets
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-xs text-slate-500">

                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Super Admin</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Tenant Support Tickets
                            </span>

                        </div>

                    </div>

                    <div class="flex flex-wrap gap-3">

                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-md text-sm">

                            <i data-lucide="file-down" class="w-4 h-4"></i>
                            Export
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>

                        </button>

                        <button
                            class="flex items-center gap-2 px-3 py-2 bg-orange-500 text-white font-semibold rounded-md text-xs">
                            <i data-lucide="plus-circle" class="w-4 h-4"></i>
                            Add New Ticket
                        </button>

                        <button
                            class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-md">
                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>
                        </button>

                    </div>

                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6 mb-6">

                    <!-- Card 1 -->
                    <div class="bg-white rounded-md border p-5 shadow-sm">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-10 h-10 bg-orange-100 rounded-md flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-4 h-4"></i>
                                </div>

                                <h2 class="text-2xl font-semibold mt-4">
                                    80
                                </h2>

                                <p class="text-xs font-semibold text-slate-500 mt-1">
                                    New Tickets
                                </p>

                            </div>

                            <div class="w-8 h-28 bg-slate-100 rounded-full relative">

                                <div class="absolute bottom-0 w-full h-[60%] bg-cyan-600 rounded-full">
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-md border p-5 shadow-sm">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-10 h-10 bg-purple-100 rounded-md flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-4 h-4"></i>
                                </div>

                                <h2 class="text-2xl font-semibold mt-4">
                                    25
                                </h2>

                                <p class="text-xs font-semibold text-slate-500 mt-1">
                                    Open Tickets
                                </p>

                            </div>

                            <div class="w-8 h-28 bg-slate-100 rounded-full relative">

                                <div class="absolute bottom-0 w-full h-[30%] bg-purple-500 rounded-full">
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-md border p-5 shadow-sm">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-10 h-10 bg-cyan-100 rounded-md flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-4 h-4"></i>
                                </div>

                                <h2 class="text-2xl font-semibold mt-4">
                                    40
                                </h2>

                                <p class="text-xs font-semibold text-slate-500 mt-1">
                                    Pending Tickets
                                </p>

                            </div>

                            <div class="w-8 h-28 bg-slate-100 rounded-full relative">

                                <div class="absolute bottom-0 w-full h-[50%] bg-cyan-500 rounded-full">
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-md border p-5 shadow-sm">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-10 h-10 bg-green-100 rounded-md flex items-center justify-center">
                                    <i data-lucide="ticket" class="w-4 h-4"></i>
                                </div>

                                <h2 class="text-2xl font-semibold mt-4">
                                    70
                                </h2>

                                <p class="text-xs font-semibold text-slate-500 mt-1">
                                    Solved Tickets
                                </p>

                            </div>

                            <div class="w-8 h-28 bg-slate-100 rounded-full relative">

                                <div class="absolute bottom-0 w-full h-[80%] bg-green-500 rounded-full">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Filter Bar -->
                <div class="bg-white rounded-md border p-4 mb-6 shadow-sm">

                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                        <h2 class="text-md font-semibold">
                            Ticket List
                        </h2>

                        <div class="flex flex-col sm:flex-row gap-3 text-xs w-full md:w-auto">

                            <select class="h-10 w-full sm:w-auto px-3 border rounded-md bg-white">
                                <option>Priority</option>
                            </select>

                            <select class="h-10 w-full sm:w-auto px-3 border rounded-md bg-white">
                                <option>Select Status</option>
                            </select>

                            <select class="h-10 w-full sm:w-auto px-3 border rounded-md bg-white">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                </div>

                <!-- Main Grid -->
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">

                    <!-- LEFT -->
                    <div class="xl:col-span-9 space-y-6">

                        <!-- Ticket Card -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 md:p-5 shadow-sm">

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                                <!-- Ticket Number -->
                                <div class="md:col-span-3">

                                    <div class="border rounded-md p-6 md:p-8 text-center">

                                        <h3 class="font-semibold text-xs">
                                            #TIC0016
                                        </h3>

                                        <span class="inline-block mt-3 bg-red-500 text-white text-xs px-3 py-1 rounded">
                                            High
                                        </span>

                                        <p class="mt-3 text-xs font-semibold">
                                            15 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <!-- Left Side Cards -->
                                <div class="md:col-span-9">

                                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                                        <div>
                                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                                <h3 class="text-md font-semibold">
                                                    Login not working
                                                </h3>

                                                <span
                                                    class="bg-blue-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                                                    Access Issue
                                                </span>
                                            </div>
                                        </div>

                                        <div class="flex gap-4 text-slate-500">

                                            <button><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="square-pen" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>

                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>
                                        </div>

                                        <div>

                                            <p class="text-xs text-slate-500">
                                                Assignee
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>

                                        </div>

                                        <div>

                                            <p class="text-xs text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 w-full sm:w-auto px-3 border text-xs rounded-md mt-2">
                                                <option>Open</option>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Ticket Card 2 -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 md:p-5 shadow-sm">

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                                <div class="md:col-span-3">

                                    <div class="border rounded-md p-6 md:p-8 text-center">

                                        <h3 class="font-semibold text-xs">
                                            #TIC0017
                                        </h3>

                                        <span
                                            class="inline-block mt-3 bg-yellow-500 text-white text-xs px-3 py-1 rounded text-xs">
                                            Medium
                                        </span>

                                        <p class="mt-3 text-xs font-semibold">
                                            18 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <div class="md:col-span-9">

                                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                                        <div>

                                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">

                                                <h3 class="text-md font-semibold">
                                                    Payroll calculation issue
                                                </h3>

                                                <span
                                                    class="bg-purple-500 text-white text-xs font-medium px-3 py-1 rounded-full">
                                                    Payroll
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex gap-4 text-slate-500">
                                            <button><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="square-pen" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Assignee
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 w-full sm:w-auto px-3 border text-xs rounded-md mt-2">
                                                <option>Pending</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Ticket Card 3 -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 md:p-5 shadow-sm">

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                                <div class="md:col-span-3">

                                    <div class="border rounded-md p-6 md:p-8 text-center">

                                        <h3 class="font-semibold text-xs">
                                            #TIC0018
                                        </h3>

                                        <span
                                            class="inline-block mt-3 bg-green-500 text-white text-xs px-3 py-1 rounded">
                                            Low
                                        </span>

                                        <p class="mt-3 text-xs font-semibold">
                                            20 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <div class="md:col-span-9">

                                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                                        <div>

                                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">

                                                <h3 class="text-md font-semibold">
                                                    Employee profile update issue
                                                </h3>

                                                <span
                                                    class="bg-cyan-500 text-white text-xs font-medium px-3 py-1 rounded-full">
                                                    Employee Module
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex gap-4 text-slate-500">
                                            <button><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="square-pen" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Assignee
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 w-full sm:w-auto px-3 border text-xs rounded-md mt-2">
                                                <option>Solved</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Ticket Card 4 -->
                        <div class="bg-white border border-slate-200 rounded-md p-4 md:p-5 shadow-sm">

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                                <div class="md:col-span-3">

                                    <div class="border rounded-md p-6 md:p-8 text-center">

                                        <h3 class="font-semibold text-xs">
                                            #TIC0019
                                        </h3>

                                        <span class="inline-block mt-3 bg-red-500 text-white text-xs px-3 py-1 rounded">
                                            High
                                        </span>

                                        <p class="mt-3 text-xs font-semibold">
                                            21 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <div class="md:col-span-9">

                                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                                        <div>

                                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">

                                                <h3 class="text-md font-semibold">
                                                    Unable to generate invoice
                                                </h3>

                                                <span
                                                    class="bg-orange-500 text-white text-xs font-medium px-3 py-1 rounded-full">
                                                    Billing & Payments
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex gap-4 text-slate-500">
                                            <button><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="square-pen" class="w-4 h-4"></i></button>
                                            <button><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Assignee
                                            </p>

                                            <div class="flex items-center gap-3 mt-2">
                                                <div class="w-7 h-7 rounded-full border bg-white"></div>

                                                <p class="text-sm font-medium break-words">
                                                    Aurora Technologies
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="text-xs text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 w-full sm:w-auto px-3 border text-xs rounded-md mt-2">
                                                <option>Open</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="text-center">

                            <button class="bg-orange-500 text-white text-sm font-semibold px-6 py-3 rounded-md">
                                Load More
                            </button>

                        </div>

                    </div>

                    <!-- RIGHT SIDEBAR -->
                    <div class="xl:col-span-3 space-y-6">

                        <!-- Categories -->
                        <div class="bg-white border rounded-md">

                            <div class="p-4 border-b">

                                <h3 class="text-lg font-semibold">
                                    Ticket Categories
                                </h3>

                            </div>

                            <div>

                                <div class="flex justify-between items-center text-sm p-4 border-b">
                                    <span>Access Issue</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        1
                                    </span>
                                </div>

                                <div class="flex justify-between items-center text-sm p-4 border-b">
                                    <span>Module Issue</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        1
                                    </span>
                                </div>

                                <div class="flex justify-between items-center text-sm p-4 border-b">
                                    <span>Billing & Payments</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        0
                                    </span>
                                </div>

                                <div class="flex justify-between items-center text-sm p-4 border-b">
                                    <span>API / Integration Issues</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        2
                                    </span>
                                </div>

                                <div class="flex justify-between items-center text-sm p-4 border-b">
                                    <span>Plan / Subscription Issues</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        1
                                    </span>
                                </div>

                            </div>

                        </div>

                        <!-- Support Agents -->
                        <div class="bg-white border rounded-md">

                            <div class="p-4 border-b">

                                <h3 class="text-lg font-semibold">
                                    Support Agents
                                </h3>

                            </div>

                            <div>

                                <div class="flex justify-between items-center p-4 border-b">
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">

                                        <div class="w-8 h-8 rounded-full border"></div>

                                        <span class="text-slate-600 text-sm">
                                            Edgar Hansel
                                        </span>

                                    </div>

                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        0
                                    </span>

                                </div>

                                <div class="flex justify-between items-center p-4 border-b">

                                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                        <div class="w-8 h-8 rounded-full border"></div>
                                        <span class="text-slate-600 text-sm">
                                            Ann Lynch
                                        </span>
                                    </div>

                                    <span
                                        class="bg-slate-900 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                        1
                                    </span>

                                </div>

                                <div class="flex justify-between items-center p-4 border-b">

                                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                        <div class="w-8 h-8 rounded-full border"></div>
                                        <span class="text-slate-600 text-sm">
                                            Juan Hermann
                                        </span>
                                    </div>

                                    <span
                                        class="bg-slate-900 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                        0
                                    </span>

                                </div>

                                <div class="flex justify-between items-center p-4">

                                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                        <div class="w-8 h-8 rounded-full border"></div>
                                        <span class="text-slate-600 text-sm">
                                            Jessie Otero
                                        </span>
                                    </div>

                                    <span
                                        class="bg-slate-900 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                        2
                                    </span>

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

</html>