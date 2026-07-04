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
                            Career Opportunities
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Recruitment</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Career Opportunities
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/employee-jobs') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/employee-jobs-grid') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>

                <!-- Packages List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b">


                        <h3 class="text-l font-semibold text-slate-800">
                            Career Opportunities
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

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Select Status</option>
                            </select>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <option>Sort By : Last 7 Days</option>
                            </select>

                        </div>

                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px]">

                            <thead>

                                <tr class="bg-[#f1f5f9] h-10">

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Job ID
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Job Title
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Department
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Location
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Salary Range
                                    </th>

                                    <th class="px-4 py-3 text-left text-[13px] font-semibold">
                                        Posted Date
                                    </th>

                                    <th class="p-4"></th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">

                                <?php if (!empty($jobs)): ?>

                                    <?php foreach ($jobs as $job): ?>

                                        <?php
                                        $salaryRange = (!empty($job['salary_from']) && !empty($job['salary_to']))
                                            ? '₹' . number_format($job['salary_from']) . ' - ₹' . number_format($job['salary_to'])
                                            : 'Not set';
                                        ?>

                                        <tr class="hover:bg-slate-50">

                                            <!-- Job ID -->
                                            <td class="px-4 py-4">
                                                <?= esc($job['requisition_no'] ?? 'N/A') ?>
                                            </td>

                                            <!-- Job Title -->
                                            <td class="px-4 py-4">
                                                <div class="font-semibold text-slate-800">
                                                    <?= esc($job['job_title']) ?>
                                                </div>

                                                <div class="text-xs text-slate-500">
                                                    <?= esc($job['vacancies'] ?? 1) ?> Openings
                                                </div>
                                            </td>

                                            <!-- Department -->
                                            <td class="px-4 py-4">
                                                <?= esc($job['department']) ?>
                                            </td>

                                            <!-- Location -->
                                            <td class="px-4 py-4">
                                                <?= esc($job['location']) ?>
                                            </td>

                                            <!-- Salary -->
                                            <td class="px-4 py-4">
                                                <?= esc($salaryRange) ?>
                                            </td>

                                            <!-- Published Date -->
                                            <td class="px-4 py-4">
                                                <?= !empty($job['published_at'])
                                                    ? date('d M Y', strtotime($job['published_at']))
                                                    : 'N/A'; ?>
                                            </td>

                                            <!-- Actions -->
                                            <td class="px-4 py-4">
                                                <div class="flex items-center gap-3">

                                                    <!-- View -->
                                                    <a href="#" onclick="openViewModal(<?= $job['id'] ?>); return false;"
                                                        class="w-9 h-9 rounded-lg border border-slate-200 flex items-center justify-center hover:bg-slate-100 transition">

                                                        <i data-lucide="eye" class="w-4 h-4 text-slate-600"></i>

                                                    </a>

                                                    <!-- Apply Button -->                                                    

                                                    <?php if (in_array($job['id'], $appliedIds ?? [])): ?>

                                                        <button
                                                            class="px-4 py-2 rounded-md bg-green-600 text-white text-sm font-semibold cursor-not-allowed shadow-sm"
                                                            disabled>
                                                            Applied
                                                        </button>

                                                    <?php else: ?>

                                                        <a href="<?= base_url('Recruitment/apply-job/' . $job['id']) ?>"
                                                            class="inline-block px-4 py-2 rounded-md bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold transition shadow-sm">
                                                            Apply
                                                        </a>

                                                    <?php endif; ?>



                                                </div>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>

                                        <td colspan="7" class="px-4 py-8 text-center text-slate-500">

                                            No published jobs available yet.

                                        </td>

                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                        <!-- Pagination -->
                        <div class="flex items-center justify-between p-3 border-t">

                            <p class="text-sm text-slate-600">
                                Showing 1 - 8 of 8 entries
                            </p>

                            <div class="flex items-center justify-center gap-4">

                                <button>
                                    <i data-lucide="chevron-left" class="text-slate-500 w-4 h-4"></i>
                                </button>

                                <button class="w-6 h-6 rounded-full bg-orange-500 text-white text-xs">
                                    1
                                </button>

                                <button>
                                    <i data-lucide="chevron-right" class="text-slate-500 w-4 h-4"></i>
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>

        <div id="successToast" class="fixed top-6 right-6 z-50
           translate-x-[120%]
           transition-transform duration-500 ease-in-out">

            <div class="flex items-center gap-3 bg-emerald-600 text-white px-6 py-4 rounded-xl shadow-xl">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                </svg>

                <span class="font-medium">

                    <?= session()->getFlashdata('success') ?>

                </span>

            </div>

        </div>

        <script>

            document.addEventListener("DOMContentLoaded", function () {

                const toast = document.getElementById("successToast");

                // Slide In
                setTimeout(() => {
                    toast.classList.remove("translate-x-[120%]");
                    toast.classList.add("translate-x-0");
                }, 100);

                // Slide Out
                setTimeout(() => {
                    toast.classList.remove("translate-x-0");
                    toast.classList.add("translate-x-[120%]");
                }, 3000);

                // Remove from DOM
                setTimeout(() => {
                    toast.remove();
                }, 3500);

            });

        </script>

    <?php endif; ?>


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

    <div id="viewModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

        <div class="bg-white rounded-xl shadow-2xl w-[95%] max-w-6xl max-h-[90vh] overflow-y-auto">

            <div id="viewModalContent"></div>

        </div>

    </div>
    <script>

        function openViewModal(id) {

            fetch("<?= base_url('Recruitment/requisitions/get') ?>/" + id)
                .then(response => response.text())
                .then(html => {

                    document.getElementById('viewModalContent').innerHTML = html;

                    document.getElementById('viewModal').classList.remove('hidden');
                    document.getElementById('viewModal').classList.add('flex');

                    if (window.lucide) {
                        lucide.createIcons();
                    }
                });
        }

        function closeViewModal() {

            document.getElementById('viewModal').classList.add('hidden');
            document.getElementById('viewModal').classList.remove('flex');

            document.getElementById('viewModalContent').innerHTML = '';
        }
    </script>

</body>