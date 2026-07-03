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
        <?php include __DIR__ . '/../sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Navbar -->
            <?php include __DIR__ . '/../navbar.php'; ?>


            <!-- Page Content -->
            <div class="flex-1 overflow-y-auto p-4 lg:p-5">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Candidates
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Recruitment</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Candidates
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">

                        <!-- Kanban View -->
                        <a href="<?= base_url('Recruitment/candidates-kanban') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="kanban" class="w-4 h-4"></i>
                        </a>

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/candidates') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/candidates-grid') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>

                <!-- Candidates List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b">

                        <h3 class="text-l font-semibold text-slate-800">
                            Candidates List
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 w-full lg:w-auto">

                            <button
                                class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Select Role</option>
                            </select>

                            <select class=" border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Select Status</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                    <!-- Controls -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5">

                        <div class="flex flex-wrap items-center gap-2 w-full lg:w-auto">

                            <span class="text-sm">
                                Row Per Page
                            </span>

                            <select class="border rounded-md px-3 py-1 text-sm">
                                <option>10</option>
                            </select>

                            <span class="text-sm">
                                Entries
                            </span>

                        </div>

                        <input type="text" placeholder="Search"
                            class="border border-slate-200 rounded-md px-4 py-2 text-[13px] w-full md:w-[220px]">

                    </div>

                    <!-- Table -->
                    <?php
                    $applications = $applications ?? [];

                    function statusBadge($status)
                    {
                        switch ($status) {
                            case 'Sent':
                                return 'bg-purple-50 text-purple-600 border border-purple-300';
                            case 'Scheduled':
                                return 'bg-pink-50 text-pink-600 border border-pink-300';
                            case 'Interviewed':
                                return 'bg-blue-50 text-blue-600 border border-blue-300';
                            case 'Offered':
                                return 'bg-yellow-50 text-yellow-700 border border-yellow-300';
                            case 'Hired':
                                return 'bg-green-50 text-green-600 border border-green-300';
                            case 'Rejected':
                                return 'bg-red-50 text-red-600 border border-red-300';
                            default:
                                return 'bg-violet-50 text-violet-600 border border-violet-300';
                        }
                    }

                    if (empty($applications)) {
                        $applications = [
                            [
                                'application_id' => 'Cand-001',
                                'candidate_name' => 'Harold Gaynor',
                                'candidate_email' => 'harold@example.com',
                                'job_title' => 'Accountant',
                                'department' => 'Finance',
                                'location' => 'Head Office',
                                'applied_at' => '12 Sep 2024',
                                'application_status' => 'Sent',
                            ],
                            [
                                'application_id' => 'Cand-002',
                                'candidate_name' => 'Sandra Ornellas',
                                'candidate_email' => 'sandra@example.com',
                                'job_title' => 'App Developer',
                                'department' => 'Engineering',
                                'location' => 'Remote',
                                'applied_at' => '24 Oct 2024',
                                'application_status' => 'Scheduled',
                            ],
                        ];
                    }
                    ?>

                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">

                        <div class="overflow-x-auto">

                            <table class="w-full text-sm">

                                <thead class="bg-slate-100 text-slate-700">

                                    <tr>

                                        <th class="px-5 py-4 w-10">
                                            <input type="checkbox" class="rounded border-slate-300">
                                        </th>

                                        <th class="text-left font-semibold">Cand ID</th>

                                        <th class="text-left font-semibold">Candidate</th>

                                        <th class="text-left font-semibold">Applied Role</th>

                                        <th class="text-left font-semibold">Candidate Email</th>

                                        <th class="text-left font-semibold">Applied Date</th>
                                
                                        <th class="text-center font-semibold">Resume</th>

                                        <th class="px-6 py-4 text-left font-semibold w-44">Status</th>

                                        <th class="text-center font-semibold w-16"></th>

                                    </tr>

                                </thead>

                                <tbody class="divide-y divide-slate-200 bg-white">

                                    <?php foreach ($applications as $application): ?>

                                        <tr class="hover:bg-slate-50 transition">

                                            <td class="px-5 py-4">
                                                <input type="checkbox" class="rounded border-slate-300">
                                            </td>

                                            <td class="font-medium text-slate-600">
                                                <?= esc($application['application_id'] ?? 'N/A') ?>
                                            </td>

                                            <td>

                                                <div class="flex items-center gap-3">

                                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                                                        <?= esc(substr($application['candidate_name'] ?? 'N', 0, 1)) ?>
                                                    </div>

                                                    <div>

                                                        <h4 class="font-semibold text-slate-800">
                                                            <?= esc($application['candidate_name'] ?? 'Unknown') ?>
                                                        </h4>

                                                        <p class="text-slate-500">
                                                            <?= esc($application['candidate_email'] ?? '-') ?>
                                                        </p>

                                                    </div>

                                                </div>

                                            </td>

                                            <td class="text-slate-600">
                                                <?= esc($application['job_title'] ?? '-') ?>
                                            </td>

                                            <td class="text-slate-600">
                                                <?= esc($application['candidate_email'] ?? '-') ?>
                                            </td>

                                            <td class="text-slate-600">
                                                <?= !empty($application['applied_at']) ? date('d M Y', strtotime($application['applied_at'])) : 'N/A' ?>
                                            </td>

                                            <td>

                                                <div class="flex justify-center gap-3">

                                                    <button class="text-slate-500 hover:text-orange-500" disabled>
                                                        <i data-lucide="file-text" class="w-4 h-4"></i>
                                                    </button>

                                                    <button class="text-slate-500 hover:text-blue-600" disabled>
                                                        <i data-lucide="download" class="w-4 h-4"></i>
                                                    </button>

                                                </div>

                                            </td>

                                            <td class="px-6 py-4 w-44">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium <?= statusBadge($application['application_status'] ?? 'Applied') ?>">
                                                    • <?= esc($application['application_status'] ?? 'Applied') ?>
                                                </span>
                                            </td>

                                            <td>

                                                <div class="flex justify-center">

                                                    <button class="text-slate-400 hover:text-red-500" disabled>
                                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                    </button>

                                                </div>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>

                        <div class="flex items-center justify-between px-6 py-4 border-t text-sm">

                            <p class="text-slate-500">
                                Showing 1 - <?= count($applications) ?> of <?= count($applications) ?> entries
                            </p>

                            <div class="flex items-center gap-2">

                                <button
                                    class="w-8 h-8 rounded-full border hover:bg-slate-100 flex items-center justify-center">
                                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                </button>

                                <button class="w-8 h-8 rounded-full bg-orange-500 text-white">
                                    1
                                </button>

                                <button
                                    class="w-8 h-8 rounded-full border hover:bg-slate-100 flex items-center justify-center">
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </button>

                            </div>

                        </div>

                    </div> <!-- Table End -->

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