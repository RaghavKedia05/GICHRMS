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

<body class="bg-slate-100">

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
            <div class="flex-1 overflow-y-auto p-6">

                <!-- Header -->
                <div class="flex justify-between items-start mb-6">

                    <div>
                        <h1 class="text-4xl font-bold text-slate-900">
                            Tenant Support Tickets
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-slate-500">
                            <span>Super Admin</span>
                            <span>›</span>
                            <span>Tenant Support Tickets</span>
                        </div>
                    </div>

                    <div class="flex gap-3">

                        <button class="h-10 px-4 border bg-white rounded-md flex items-center gap-2">
                            <i class="fa-regular fa-file"></i>
                            Export
                        </button>

                        <button class="h-10 px-5 bg-orange-500 text-white rounded-md flex items-center gap-2">
                            <i class="fa-solid fa-plus"></i>
                            Add New Ticket
                        </button>

                    </div>

                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-4 gap-6 mb-6">

                    <!-- Card 1 -->
                    <div class="bg-white rounded-lg border p-5">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                    🎫
                                </div>

                                <h2 class="text-4xl font-bold mt-4">
                                    80
                                </h2>

                                <p class="text-slate-500 mt-2">
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
                    <div class="bg-white rounded-lg border p-5">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    🎫
                                </div>

                                <h2 class="text-4xl font-bold mt-4">
                                    25
                                </h2>

                                <p class="text-slate-500 mt-2">
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
                    <div class="bg-white rounded-lg border p-5">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center">
                                    🎫
                                </div>

                                <h2 class="text-4xl font-bold mt-4">
                                    40
                                </h2>

                                <p class="text-slate-500 mt-2">
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
                    <div class="bg-white rounded-lg border p-5">

                        <div class="flex justify-between">

                            <div>

                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    🎫
                                </div>

                                <h2 class="text-4xl font-bold mt-4">
                                    70
                                </h2>

                                <p class="text-slate-500 mt-2">
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
                <div class="bg-white rounded-lg border p-6 mb-6">

                    <div class="flex justify-between items-center">

                        <h2 class="text-xl font-semibold">
                            Ticket List
                        </h2>

                        <div class="flex gap-3">

                            <select class="h-10 px-4 border rounded-md bg-white">
                                <option>Priority</option>
                            </select>

                            <select class="h-10 px-4 border rounded-md bg-white">
                                <option>Select Status</option>
                            </select>

                            <select class="h-10 px-4 border rounded-md bg-white">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                </div>

                <!-- Main Grid -->
                <div class="grid grid-cols-12 gap-6">

                    <!-- LEFT -->
                    <div class="col-span-9 space-y-6">

                        <!-- Ticket Card -->
                        <div class="bg-white border rounded-lg p-5">

                            <div class="grid grid-cols-12 gap-6">

                                <!-- Ticket Number -->
                                <div class="col-span-3">

                                    <div class="border rounded-lg p-8 text-center">

                                        <h3 class="font-semibold">
                                            #TIC0016
                                        </h3>

                                        <span class="inline-block mt-3 bg-red-500 text-white text-xs px-3 py-1 rounded">
                                            High
                                        </span>

                                        <p class="mt-3 text-sm">
                                            15 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <!-- Details -->
                                <div class="col-span-9">

                                    <div class="flex justify-between items-center">

                                        <div>

                                            <div class="flex items-center gap-3">

                                                <h3 class="text-2xl font-semibold">
                                                    Login not working
                                                </h3>

                                                <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">
                                                    Access Issue
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex gap-4 text-slate-500">

                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            <i class="fa-regular fa-trash-can"></i>

                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-3 gap-4">

                                        <div>

                                            <p class="text-sm text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <p class="font-medium mt-2">
                                                BrightWave Innovations
                                            </p>

                                        </div>

                                        <div>

                                            <p class="text-sm text-slate-500">
                                                Assignee
                                            </p>

                                            <p class="font-medium mt-2">
                                                Edgar Hansel
                                            </p>

                                        </div>

                                        <div>

                                            <p class="text-sm text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 px-4 border rounded-md mt-2">
                                                <option>Open</option>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Ticket Card 2 -->
                        <div class="bg-white border rounded-lg p-5">

                            <div class="grid grid-cols-12 gap-6">

                                <div class="col-span-3">

                                    <div class="border rounded-lg p-8 text-center">

                                        <h3 class="font-semibold">
                                            #TIC0017
                                        </h3>

                                        <span
                                            class="inline-block mt-3 bg-yellow-500 text-white text-xs px-3 py-1 rounded">
                                            Medium
                                        </span>

                                        <p class="mt-3 text-sm">
                                            18 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <div class="col-span-9">

                                    <div class="flex justify-between items-center">

                                        <div>

                                            <div class="flex items-center gap-3">

                                                <h3 class="text-2xl font-semibold">
                                                    Payroll calculation issue
                                                </h3>

                                                <span class="bg-purple-500 text-white text-xs px-3 py-1 rounded-full">
                                                    Payroll
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex gap-4 text-slate-500">
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            <i class="fa-regular fa-trash-can"></i>
                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-3 gap-4">

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <p class="font-medium mt-2">
                                                TechNova Solutions
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Assignee
                                            </p>

                                            <p class="font-medium mt-2">
                                                Ann Lynch
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 px-4 border rounded-md mt-2">
                                                <option>Pending</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Ticket Card 3 -->
                        <div class="bg-white border rounded-lg p-5">

                            <div class="grid grid-cols-12 gap-6">

                                <div class="col-span-3">

                                    <div class="border rounded-lg p-8 text-center">

                                        <h3 class="font-semibold">
                                            #TIC0018
                                        </h3>

                                        <span
                                            class="inline-block mt-3 bg-green-500 text-white text-xs px-3 py-1 rounded">
                                            Low
                                        </span>

                                        <p class="mt-3 text-sm">
                                            20 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <div class="col-span-9">

                                    <div class="flex justify-between items-center">

                                        <div>

                                            <div class="flex items-center gap-3">

                                                <h3 class="text-2xl font-semibold">
                                                    Employee profile update issue
                                                </h3>

                                                <span class="bg-cyan-500 text-white text-xs px-3 py-1 rounded-full">
                                                    Employee Module
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex gap-4 text-slate-500">
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            <i class="fa-regular fa-trash-can"></i>
                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-3 gap-4">

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <p class="font-medium mt-2">
                                                NextGen Technologies
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Assignee
                                            </p>

                                            <p class="font-medium mt-2">
                                                Robert Miles
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 px-4 border rounded-md mt-2">
                                                <option>Solved</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Ticket Card 4 -->
                        <div class="bg-white border rounded-lg p-5">

                            <div class="grid grid-cols-12 gap-6">

                                <div class="col-span-3">

                                    <div class="border rounded-lg p-8 text-center">

                                        <h3 class="font-semibold">
                                            #TIC0019
                                        </h3>

                                        <span class="inline-block mt-3 bg-red-500 text-white text-xs px-3 py-1 rounded">
                                            High
                                        </span>

                                        <p class="mt-3 text-sm">
                                            21 Dec 2025
                                        </p>

                                    </div>

                                </div>

                                <div class="col-span-9">

                                    <div class="flex justify-between items-center">

                                        <div>

                                            <div class="flex items-center gap-3">

                                                <h3 class="text-2xl font-semibold">
                                                    Unable to generate invoice
                                                </h3>

                                                <span class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full">
                                                    Billing & Payments
                                                </span>

                                            </div>

                                        </div>

                                        <div class="flex gap-4 text-slate-500">
                                            <i class="fa-regular fa-eye"></i>
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            <i class="fa-regular fa-trash-can"></i>
                                        </div>

                                    </div>

                                    <hr class="my-5">

                                    <div class="grid grid-cols-3 gap-4">

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Ticket Raised By
                                            </p>

                                            <p class="font-medium mt-2">
                                                BrightWave Innovations
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Assignee
                                            </p>

                                            <p class="font-medium mt-2">
                                                Edgar Hansel
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-sm text-slate-500">
                                                Status
                                            </p>

                                            <select class="h-10 px-4 border rounded-md mt-2">
                                                <option>Open</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="text-center">

                            <button class="bg-orange-500 text-white px-6 py-3 rounded-md">
                                Load More
                            </button>

                        </div>

                    </div>

                    <!-- RIGHT SIDEBAR -->
                    <div class="col-span-3 space-y-6">

                        <!-- Categories -->
                        <div class="bg-white border rounded-lg">

                            <div class="p-5 border-b">

                                <h3 class="text-2xl font-semibold">
                                    Ticket Categories
                                </h3>

                            </div>

                            <div>

                                <div class="flex justify-between p-5 border-b">
                                    <span>Access Issue</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        1
                                    </span>
                                </div>

                                <div class="flex justify-between p-5 border-b">
                                    <span>Module Issue</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        1
                                    </span>
                                </div>

                                <div class="flex justify-between p-5 border-b">
                                    <span>Billing & Payments</span>
                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        0
                                    </span>
                                </div>

                            </div>

                        </div>

                        <!-- Support Agents -->
                        <div class="bg-white border rounded-lg">

                            <div class="p-5 border-b">

                                <h3 class="text-2xl font-semibold">
                                    Support Agents
                                </h3>

                            </div>

                            <div>

                                <div class="flex justify-between items-center p-5 border-b">

                                    <span>Edgar Hansel</span>

                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        0
                                    </span>

                                </div>

                                <div class="flex justify-between items-center p-5 border-b">

                                    <span>Ann Lynch</span>

                                    <span class="bg-slate-900 text-white text-xs px-2 py-1 rounded-full">
                                        1
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
        </script>

</body>

</html>