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
    <?php
    $isAdmin = session('role') === 'admin';
    $successMessage = session()->getFlashdata('success');
    $errorMessage = session()->getFlashdata('error');
    ?>

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
                    <div class="p-5 border-b">

                        <h3 class="text-l font-semibold text-slate-800">
                            Candidates List
                        </h3>

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
                                        <th class="text-left font-semibold">Source</th>
                                
                                        <th class="text-center font-semibold">Resume</th>

                                        <th class="px-6 py-4 text-left font-semibold w-44">Status</th>

                                        <th class="text-center font-semibold w-16"></th>

                                    </tr>

                                </thead>

                                <tbody class="divide-y divide-slate-200 bg-white">

                                    <?php if (!empty($applications)): ?>
                                        <?php foreach ($applications as $application): ?>
                                            <?php
                                            $candidateName = !empty($application['candidate_name']) ? $application['candidate_name'] : ($application['name'] ?? 'Unknown');
                                            $candidateEmail = !empty($application['candidate_email']) ? $application['candidate_email'] : ($application['email'] ?? '-');
                                            $applicationStatus = $application['application_status'] ?? 'Applied';
                                            $hasResume = !empty($application['resume_file']);
                                            ?>

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
                                                        <?= esc(substr($candidateName, 0, 1)) ?>
                                                    </div>

                                                    <div>

                                                        <h4 class="font-semibold text-slate-800">
                                                            <?= esc($candidateName) ?>
                                                        </h4>

                                                        <p class="text-slate-500">
                                                            <?= esc($candidateEmail) ?>
                                                        </p>

                                                    </div>

                                                </div>

                                            </td>

                                            <td class="text-slate-600">
                                                <?= esc($application['job_title'] ?? '-') ?>
                                            </td>

                                            <td class="text-slate-600">
                                                <?= esc($candidateEmail) ?>
                                            </td>

                                            <td class="text-slate-600">
                                                <?= !empty($application['applied_at']) ? date('d M Y', strtotime($application['applied_at'])) : 'N/A' ?>
                                            </td>

                                            <td class="text-slate-600">
                                                <?= esc($application['application_source'] ?? 'Internal Career Portal') ?>
                                            </td>

                                            <td>

                                                <div class="flex justify-center gap-3">

                                                    <a href="<?= $hasResume ? base_url('Recruitment/applications/resume/' . $application['application_id']) : '#' ?>"
                                                        target="_blank"
                                                        class="<?= $hasResume ? 'text-slate-500 hover:text-orange-500' : 'pointer-events-none text-slate-300' ?>"
                                                        title="View resume">
                                                        <i data-lucide="file-text" class="w-4 h-4"></i>
                                                    </a>

                                                    <a href="<?= $hasResume ? base_url('Recruitment/applications/resume-download/' . $application['application_id']) : '#' ?>"
                                                        class="<?= $hasResume ? 'text-slate-500 hover:text-blue-600' : 'pointer-events-none text-slate-300' ?>"
                                                        title="Download resume">
                                                        <i data-lucide="download" class="w-4 h-4"></i>
                                                    </a>

                                                </div>

                                            </td>

                                            <td class="px-6 py-4 w-44">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium <?= statusBadge($applicationStatus) ?>">
                                                    &bull; <?= esc($applicationStatus) ?>
                                                </span>
                                            </td>

                                            <td>

                                                <div class="flex justify-center">

                                                    <?php if ($isAdmin): ?>
                                                        <button type="button"
                                                            onclick="openCandidateDeleteModal(<?= (int) $application['application_id'] ?>, '<?= esc($candidateName, 'js') ?>', '<?= esc($application['job_title'] ?? '-', 'js') ?>')"
                                                            class="text-slate-400 hover:text-red-500"
                                                            title="Delete candidate application">
                                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="text-slate-300" disabled title="Admin only">
                                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                        </button>
                                                    <?php endif; ?>

                                                </div>

                                            </td>

                                        </tr>

                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="px-5 py-8 text-center text-slate-500">
                                                No candidates have applied yet.
                                            </td>
                                        </tr>
                                    <?php endif; ?>

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

    <?php if ($successMessage || $errorMessage): ?>
        <div id="candidateToast"
            class="fixed right-4 top-5 z-[70] w-[calc(100%-2rem)] max-w-md translate-x-[120%] opacity-0 transition-all duration-500 ease-out sm:right-6">
            <div class="flex items-center gap-3 rounded-lg px-5 py-4 shadow-2xl <?= $successMessage ? 'bg-emerald-600 text-white' : 'bg-rose-600 text-white' ?>">
                <i data-lucide="<?= $successMessage ? 'check-circle' : 'alert-circle' ?>" class="h-5 w-5 shrink-0"></i>
                <p class="text-sm font-semibold">
                    <?= esc($successMessage ?: $errorMessage) ?>
                </p>
            </div>
        </div>
    <?php endif; ?>

    <div id="candidateDeleteModal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/50 p-4">
        <div class="w-full max-w-md rounded-lg bg-white shadow-2xl">
            <div class="flex items-start justify-between border-b border-slate-200 px-6 py-5">
                <div>
                    <h2 class="text-lg font-semibold text-slate-950">Delete Candidate</h2>
                    <p class="mt-1 text-sm text-slate-500">This application row will be permanently removed.</p>
                </div>
                <button type="button" onclick="closeCandidateDeleteModal()"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>

            <div class="px-6 py-5">
                <div class="rounded-lg border border-rose-200 bg-rose-50 p-4">
                    <div class="flex gap-3">
                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-rose-100 text-rose-600">
                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-rose-900" id="deleteCandidateName">Candidate</p>
                            <p class="mt-1 text-sm text-rose-700" id="deleteCandidateRole">Applied role</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-slate-200 px-6 py-5">
                <button type="button" onclick="closeCandidateDeleteModal()"
                    class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cancel
                </button>
                <form id="candidateDeleteForm" method="post">
                    <?= csrf_field() ?>
                    <button type="submit"
                        class="rounded-lg bg-rose-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-rose-700">
                        Delete Permanently
                    </button>
                </form>
            </div>
        </div>
    </div>


    <script>
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', function () {
            const toast = document.getElementById('candidateToast');

            if (toast) {
                setTimeout(() => {
                    toast.classList.remove('translate-x-[120%]', 'opacity-0');
                    toast.classList.add('translate-x-0', 'opacity-100');
                }, 100);

                setTimeout(() => {
                    toast.classList.remove('translate-x-0', 'opacity-100');
                    toast.classList.add('translate-x-[120%]', 'opacity-0');
                }, 3200);

                setTimeout(() => {
                    toast.remove();
                }, 3800);
            }
        });

        function openCandidateDeleteModal(id, candidateName, roleName) {
            document.getElementById('deleteCandidateName').textContent = candidateName;
            document.getElementById('deleteCandidateRole').textContent = roleName;
            document.getElementById('candidateDeleteForm').action =
                "<?= base_url('Recruitment/applications/delete/') ?>" + id;

            const modal = document.getElementById('candidateDeleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            if (window.lucide) {
                lucide.createIcons();
            }
        }

        function closeCandidateDeleteModal() {
            const modal = document.getElementById('candidateDeleteModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

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
