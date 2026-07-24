<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates | GICHRMS</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }
    </style>

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body class="bg-[#f8fafc]">
    <?php
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
                <div class="flex-1 overflow-y-auto p-4 lg:p-6">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <p class="mb-2 text-xs font-extrabold uppercase tracking-[.16em] text-blue-600">Recruitment</p>
                        <h1 class="text-2xl font-black tracking-tight text-slate-950 sm:text-3xl">
                            Candidates
                        </h1>

                        <p class="mt-2 text-sm text-slate-500">Review every application and move promising candidates forward.</p>
                    </div>

                    <div class="inline-flex self-start rounded-lg border border-slate-200 bg-white p-1 shadow-sm">

                        <!-- Kanban View -->
                        <a href="<?= base_url('Recruitment/candidates-kanban') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
                            <i data-lucide="kanban" class="w-4 h-4"></i>
                        </a>

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/candidates') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md bg-blue-600 text-white">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/candidates-grid') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>

                <!-- Candidates List -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <!-- Header -->
                    <div class="p-5 border-b">

                        <h3 class="text-l font-semibold text-slate-800">
                            Candidate Pipeline
                        </h3>

                    </div>

                    <?php
                    $applications = $applications ?? [];

                    function statusBadge($status)
                    {
                        switch ($status) {
                            case 'Shortlisted':
                                return 'bg-emerald-50 text-emerald-700 border border-emerald-300';
                            case 'Sent':
                                return 'bg-purple-50 text-purple-600 border border-purple-300';
                            case 'Scheduled':
                            case 'Interview Scheduled':
                                return 'bg-pink-50 text-pink-600 border border-pink-300';
                            case 'Interviewed':
                                return 'bg-blue-50 text-blue-600 border border-blue-300';
                            case 'Selected':
                                return 'bg-green-50 text-green-700 border border-green-300';
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

                    <div class="bg-white">

                        <div class="w-full overflow-x-auto overscroll-x-contain">

                            <table class="w-full min-w-[1100px] table-auto text-sm">

                                <thead class="border-b border-slate-200 bg-slate-50 text-xs uppercase text-slate-500">

                                    <tr>

                                        <th class="whitespace-nowrap px-5 py-4 text-left font-semibold">Cand ID</th>

                                        <th class="min-w-64 px-5 py-4 text-left font-semibold">Candidate</th>

                                        <th class="min-w-48 px-5 py-4 text-left font-semibold">Applied Role</th>

                                        <th class="min-w-64 px-5 py-4 text-left font-semibold">Candidate Email</th>

                                        <th class="whitespace-nowrap px-5 py-4 text-left font-semibold">Applied Date</th>
                                        <th class="min-w-52 px-5 py-4 text-left font-semibold">Source</th>
                                
                                        <th class="whitespace-nowrap px-5 py-4 text-center font-semibold">Resume</th>

                                        <th class="w-44 whitespace-nowrap px-5 py-4 text-left font-semibold">Status</th>

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

                                            <td class="whitespace-nowrap px-5 py-4 align-middle font-medium text-slate-600">
                                                <?= esc($application['application_id'] ?? 'N/A') ?>
                                            </td>

                                            <td class="px-5 py-4 align-middle">

                                                <div class="flex items-center gap-3">

                                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 font-bold text-blue-600">
                                                        <?= esc(substr($candidateName, 0, 1)) ?>
                                                    </div>

                                                    <div class="min-w-0">

                                                        <h4 class="font-semibold text-slate-800">
                                                            <?= esc($candidateName) ?>
                                                        </h4>

                                                        <p class="max-w-56 truncate text-slate-500" title="<?= esc($candidateEmail) ?>">
                                                            <?= esc($candidateEmail) ?>
                                                        </p>

                                                    </div>

                                                </div>

                                            </td>

                                            <td class="px-5 py-4 align-middle text-slate-600">
                                                <?= esc($application['job_title'] ?? '-') ?>
                                            </td>

                                            <td class="break-all px-5 py-4 align-middle text-slate-600">
                                                <?= esc($candidateEmail) ?>
                                            </td>

                                            <td class="whitespace-nowrap px-5 py-4 align-middle text-slate-600">
                                                <?= !empty($application['applied_at']) ? date('d M Y', strtotime($application['applied_at'])) : 'N/A' ?>
                                            </td>

                                            <td class="px-5 py-4 align-middle text-slate-600">
                                                <?= esc($application['application_source'] ?? 'Internal Career Portal') ?>
                                            </td>

                                            <td class="px-5 py-4 align-middle">

                                                <div class="flex justify-center gap-3">

                                                    <a href="<?= $hasResume ? base_url('Recruitment/applications/resume/' . $application['application_id']) : '#' ?>"
                                                        target="_blank"
                                                        class="<?= $hasResume ? 'text-slate-500 hover:text-blue-600' : 'pointer-events-none text-slate-300' ?>"
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

                                            <td class="w-44 whitespace-nowrap px-5 py-4 align-middle">
                                                <span
                                                    class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold <?= statusBadge($applicationStatus) ?>">
                                                    &bull; <?= esc($applicationStatus) ?>
                                                </span>
                                            </td>

                                        </tr>

                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="px-5 py-8 text-center text-slate-500">
                                                No candidates have applied yet.
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                        <div class="border-t px-4 py-4 text-sm text-slate-500 sm:px-5">
                            Showing <?= count($applications) ?> candidate application<?= count($applications) === 1 ? '' : 's' ?>
                        </div>

                    </div> <!-- Table End -->

                </div>
            </div>

        </div>
    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => $successMessage,
        'toastError' => $errorMessage,
    ]) ?>

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
