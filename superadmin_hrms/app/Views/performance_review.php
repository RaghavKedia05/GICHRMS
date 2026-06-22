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

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
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
                            Performance Review
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-xs text-slate-500">

                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Super Admin</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Performance Review
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
                            class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-md">
                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>
                        </button>

                    </div>

                </div>


                <!-- Employee Basic Information -->
                <!-- 1. Employee Basic Information -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Employee Basic Information</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-5">

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Name</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Emp ID</label>
                            <input type="text" value="DGT-009"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div></div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Department</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Date of Join</label>
                            <input type="date"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">RO's Name</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Designation</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Date of Confirmation</label>
                            <input type="date"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">RO Designation:</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Qualification:</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-1.5">Previous years of
                                Exp</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
                        </div>
                        <div></div>

                    </div>
                </section>

                <!-- 2. Professional Excellence -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Professional Excellence</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[1000px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Key Result Area</th>
                                    <th class="px-3 py-3 font-semibold">Key Performance Indicators</th>
                                    <th class="px-3 py-3 font-semibold w-28">Weightage</th>
                                    <th class="px-3 py-3 font-semibold w-40">Percentage achieved<br><span
                                            class="font-normal text-xs text-gray-400">( self Score )</span></th>
                                    <th class="px-3 py-3 font-semibold w-32">Points Scored<br><span
                                            class="font-normal text-xs text-gray-400">( self )</span></th>
                                    <th class="px-3 py-3 font-semibold w-40">Percentage achieved<br><span
                                            class="font-normal text-xs text-gray-400">( RO's Score )</span></th>
                                    <th class="px-3 py-3 font-semibold w-32">Points Scored<br><span
                                            class="font-normal text-xs text-gray-400">( RO )</span></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <tr class="border-b border-gray-100">
                                    <td rowspan="2" class="px-3 py-3 align-top">1</td>
                                    <td rowspan="2" class="px-3 py-3 align-top">Production</td>
                                    <td class="px-3 py-2">Quality</td>
                                    <td class="px-3 py-2"><input type="text" value="30"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-2">TAT (turn around time)</td>
                                    <td class="px-3 py-2"><input type="text" value="30"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">2</td>
                                    <td class="px-3 py-3">Process Improvement</td>
                                    <td class="px-3 py-2">PMS,New Ideas</td>
                                    <td class="px-3 py-2"><input type="text" value="10"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">3</td>
                                    <td class="px-3 py-3">Team Management</td>
                                    <td class="px-3 py-2">Team Productivity,dynaics,attendance,attrition</td>
                                    <td class="px-3 py-2"><input type="text" value="5"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">4</td>
                                    <td class="px-3 py-3">Knowledge Sharing</td>
                                    <td class="px-3 py-2">Sharing the knowledge for team productivity</td>
                                    <td class="px-3 py-2"><input type="text" value="5"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">5</td>
                                    <td class="px-3 py-3">Reporting and Communication</td>
                                    <td class="px-3 py-2">Emails/Calls/Reports and Other Communication</td>
                                    <td class="px-3 py-2"><input type="text" value="5"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="bg-gray-50 font-medium">
                                    <td class="px-3 py-3"></td>
                                    <td class="px-3 py-3"></td>
                                    <td class="px-3 py-2 text-gray-700">Total</td>
                                    <td class="px-3 py-2"><input type="text" value="85"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- 3. Personal Excellence -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Personal Excellence</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[1000px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Personal Attributes</th>
                                    <th class="px-3 py-3 font-semibold">Key Indicators</th>
                                    <th class="px-3 py-3 font-semibold w-28">Weightage</th>
                                    <th class="px-3 py-3 font-semibold w-40">Percentage achieved<br><span
                                            class="font-normal text-xs text-gray-400">( self Score )</span></th>
                                    <th class="px-3 py-3 font-semibold w-32">Points Scored<br><span
                                            class="font-normal text-xs text-gray-400">( self )</span></th>
                                    <th class="px-3 py-3 font-semibold w-40">Percentage achieved<br><span
                                            class="font-normal text-xs text-gray-400">( RO's Score )</span></th>
                                    <th class="px-3 py-3 font-semibold w-32">Points Scored<br><span
                                            class="font-normal text-xs text-gray-400">( RO )</span></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <tr class="border-b border-gray-100">
                                    <td rowspan="2" class="px-3 py-3 align-top">1</td>
                                    <td rowspan="2" class="px-3 py-3 align-top">Attendance</td>
                                    <td class="px-3 py-2">Planned or Unplanned Leaves</td>
                                    <td class="px-3 py-2"><input type="text" value="2"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-2">Time Consciousness</td>
                                    <td class="px-3 py-2"><input type="text" value="2"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td rowspan="2" class="px-3 py-3 align-top">2</td>
                                    <td rowspan="2" class="px-3 py-3 align-top">Attitude &amp; Behavior</td>
                                    <td class="px-3 py-2">Team Collaboration</td>
                                    <td class="px-3 py-2"><input type="text" value="2"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-2">Professionalism &amp; Responsiveness</td>
                                    <td class="px-3 py-2"><input type="text" value="2"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">3</td>
                                    <td class="px-3 py-3">Policy &amp; Procedures</td>
                                    <td class="px-3 py-2">Adherence to policies and procedures</td>
                                    <td class="px-3 py-2"><input type="text" value="2"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">4</td>
                                    <td class="px-3 py-3">Initiatives</td>
                                    <td class="px-3 py-2">Special Efforts, Suggestions,Ideas,etc.</td>
                                    <td class="px-3 py-2"><input type="text" value="2"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">5</td>
                                    <td class="px-3 py-3">Continuous Skill Improvement</td>
                                    <td class="px-3 py-2">Preparedness to move to next level &amp; Training utilization
                                    </td>
                                    <td class="px-3 py-2"><input type="text" value="3"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="bg-gray-50 font-medium border-b border-gray-100">
                                    <td class="px-3 py-3"></td>
                                    <td class="px-3 py-3"></td>
                                    <td class="px-3 py-2 text-gray-700">Total</td>
                                    <td class="px-3 py-2"><input type="text" value="15"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>

                                <tr class="border-b border-gray-100">
                                    <td colspan="3" class="px-3 py-3 text-gray-700">Total Percentage(%)</td>
                                    <td class="px-3 py-2"><input type="text" value="0"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td colspan="4"></td>
                                </tr>

                                <tr>
                                    <td colspan="8" class="text-center py-4 font-bold text-[#16365c]">Grade</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- 4. Special Initiatives, Achievements, contributions if any -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Special Initiatives, Achievements, contributions if
                            any</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">By Self</th>
                                    <th class="px-3 py-3 font-semibold">RO's Comment</th>
                                    <th class="px-3 py-3 font-semibold">HOD's Comment</th>
                                    <th class="px-3 py-3 text-right">
                                        <button onclick="addThreeColRow('tbody-special')"
                                            class="w-7 h-7 inline-flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white rounded">
                                            <i data-lucide="plus" class="w-4 h-4"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody-special" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 5. Comments on the role -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Comments on the role</h2>
                        <p class="text-gray-400 text-sm mt-1">alterations if any requirred like addition/deletion of
                            responsibilities</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Strengths</th>
                                    <th class="px-3 py-3 font-semibold">Area's for Improvement</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-comments-role" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 6. Appraisee's Strengths - Reporting Officer -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Appraisee's Strengths and Areas for Improvement
                            perceived by the Reporting officer</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Strengths</th>
                                    <th class="px-3 py-3 font-semibold">Area's for Improvement</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-strengths-ro" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 7. Appraisee's Strengths - HOD -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Appraisee's Strengths and Areas for Improvement
                            perceived by the Head of the Department</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Strengths</th>
                                    <th class="px-3 py-3 font-semibold">Area's for Improvement</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-strengths-hod" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 8. Personal Goals -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Personal Goals</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Goal Achieved during last year</th>
                                    <th class="px-3 py-3 font-semibold">Goal set for current year</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-personal-goals" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 9. Personal Updates -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Personal Updates</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[1000px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Last Year</th>
                                    <th class="px-3 py-3 font-semibold w-28">Yes/No</th>
                                    <th class="px-3 py-3 font-semibold">Details</th>
                                    <th class="px-3 py-3 font-semibold">Current Year</th>
                                    <th class="px-3 py-3 font-semibold w-28">Yes/No</th>
                                    <th class="px-3 py-3 font-semibold">Details</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">1</td>
                                    <td class="px-3 py-3">Married/Engaged?</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-3">Marriage Plans</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">2</td>
                                    <td class="px-3 py-3">Higher Studies/Certifications?</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-3">Plans For Higher Study</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">2</td>
                                    <td class="px-3 py-3">Health Issues?</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-3">Certification Plans</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-3">2</td>
                                    <td class="px-3 py-3">Others</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-3">Others</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- 10. Professional Goals Achieved for last year -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Professional Goals Achieved for last year</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">By Self</th>
                                    <th class="px-3 py-3 font-semibold">RO's Comment</th>
                                    <th class="px-3 py-3 font-semibold">HOD's Comment</th>
                                    <th class="px-3 py-3 text-right">
                                        <button onclick="addThreeColRow('tbody-goals-last')"
                                            class="w-7 h-7 inline-flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white rounded">
                                            <i data-lucide="plus" class="w-4 h-4"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody-goals-last" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 11. Professional Goals for the forthcoming year -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Professional Goals for the forthcoming year</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">By Self</th>
                                    <th class="px-3 py-3 font-semibold">RO's Comment</th>
                                    <th class="px-3 py-3 font-semibold">HOD's Comment</th>
                                    <th class="px-3 py-3 text-right">
                                        <button onclick="addThreeColRow('tbody-goals-forthcoming')"
                                            class="w-7 h-7 inline-flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white rounded">
                                            <i data-lucide="plus" class="w-4 h-4"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody-goals-forthcoming" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 12. Training Requirements -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Training Requirements</h2>
                        <p class="text-blue-600 text-sm mt-1">if any to achieve the Performance Standard Targets
                            completely</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">By Self</th>
                                    <th class="px-3 py-3 font-semibold">RO's Comment</th>
                                    <th class="px-3 py-3 font-semibold">HOD's Comment</th>
                                    <th class="px-3 py-3 text-right">
                                        <button onclick="addThreeColRow('tbody-training')"
                                            class="w-7 h-7 inline-flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white rounded">
                                            <i data-lucide="plus" class="w-4 h-4"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody-training" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 13. Any other general comments -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">Any other general comments, observations,
                            suggestions etc.</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold w-10">#</th>
                                    <th class="px-3 py-3 font-semibold">Self</th>
                                    <th class="px-3 py-3 font-semibold">RO</th>
                                    <th class="px-3 py-3 font-semibold">HOD</th>
                                    <th class="px-3 py-3 text-right">
                                        <button onclick="addThreeColRow('tbody-other-comments')"
                                            class="w-7 h-7 inline-flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white rounded">
                                            <i data-lucide="plus" class="w-4 h-4"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody-other-comments" class="text-gray-600"></tbody>
                        </table>
                    </div>
                </section>

                <!-- 14. For RO's Use Only -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">For RO's Use Only</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold"></th>
                                    <th class="px-3 py-3 font-semibold w-32">Yes/No</th>
                                    <th class="px-3 py-3 font-semibold">If Yes - Details</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">The Team member has Work related Issues</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">The Team member has Leave Issues</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">The team member has Stability Issues</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">The Team member exhibits non-supportive attitude</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">Any other points in specific to note about the team member
                                    </td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-3">Overall Comment /Performance of the team member</td>
                                    <td class="px-3 py-2">
                                        <select class="w-full border border-gray-300 rounded px-2 py-1.5 bg-white">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- 15. For HRD's Use Only -->
                <section class="bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
                    <div class="text-center py-5 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-[#16365c]">For HRD's Use Only</h2>
                        <p class="text-gray-400 text-sm mt-1">Lorem ipsum dollar</p>
                    </div>
                    <div class="overflow-x-auto p-6">
                        <table class="w-full text-sm border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold">Overall Parameters</th>
                                    <th class="px-3 py-3 font-semibold w-36">Available Points</th>
                                    <th class="px-3 py-3 font-semibold w-36">Points Scored</th>
                                    <th class="px-3 py-3 font-semibold w-44">RO's Comment</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">KRAs Target Achievement Points (will be considered from the
                                        overall score specified in this document by the Reporting officer)</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">Professional Skills Scores (RO's Points furnished in the skill
                                        &amp; attitude assessment sheet will be considered)</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">Personal Skills Scores (RO's Points furnished in the skill
                                        &amp; attitude assessment sheet will be considered)</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">Special Achievements Score (HOD to furnish)</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-3 font-medium">Overall Total Score</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Signature table -->
                    <div class="overflow-x-auto px-6 pb-6">
                        <table class="w-full text-sm border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-left">
                                    <th class="px-3 py-3 font-semibold">Name</th>
                                    <th class="px-3 py-3 font-semibold">Signature</th>
                                    <th class="px-3 py-3 font-semibold">Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600">
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">Employee</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="date"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">Reporting Officer</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="date"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="px-3 py-3">HOD</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="date"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-3">HRD</td>
                                    <td class="px-3 py-2"><input type="text"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                    <td class="px-3 py-2"><input type="date"
                                            class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>





        </div>
    </div>
    </div>

    <script>
        // ---- row factories ----
        function threeColRowHTML(n) {
            return `
      <tr class="border-b border-gray-100">
        <td class="px-3 py-3 row-index">${n}</td>
        <td class="px-3 py-2"><input type="text" class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
        <td class="px-3 py-2"><input type="text" class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
        <td class="px-3 py-2"><input type="text" class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
        <td class="px-3 py-2"></td>
      </tr>`;
        }

        function twoColRowHTML(n) {
            return `
      <tr class="border-b border-gray-100">
        <td class="px-3 py-3 row-index">${n}</td>
        <td class="px-3 py-2"><input type="text" class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
        <td class="px-3 py-2"><input type="text" class="w-full border border-gray-300 rounded px-2 py-1.5"></td>
      </tr>`;
        }

        function addThreeColRow(tbodyId) {
            const tbody = document.getElementById(tbodyId);
            const n = tbody.querySelectorAll('tr').length + 1;
            tbody.insertAdjacentHTML('beforeend', threeColRowHTML(n));
        }

        function addTwoColRow(tbodyId) {
            const tbody = document.getElementById(tbodyId);
            const n = tbody.querySelectorAll('tr').length + 1;
            tbody.insertAdjacentHTML('beforeend', twoColRowHTML(n));
        }

        function seedRows(tbodyId, count, type) {
            const tbody = document.getElementById(tbodyId);
            let html = '';
            for (let i = 1; i <= count; i++) {
                html += type === 'three' ? threeColRowHTML(i) : twoColRowHTML(i);
            }
            tbody.innerHTML = html;
        }

        // Seed initial rows to match the reference exactly
        seedRows('tbody-special', 5, 'three');
        seedRows('tbody-comments-role', 5, 'two');
        seedRows('tbody-strengths-ro', 3, 'two');
        seedRows('tbody-strengths-hod', 3, 'two');
        seedRows('tbody-personal-goals', 3, 'two');
        seedRows('tbody-goals-last', 5, 'three');
        seedRows('tbody-goals-forthcoming', 5, 'three');
        seedRows('tbody-training', 5, 'three');
        seedRows('tbody-other-comments', 5, 'three');


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