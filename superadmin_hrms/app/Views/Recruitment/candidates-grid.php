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
            <div class="flex-1 overflow-y-auto p-4 sm:p-5">
                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Candidates
                        </h1>

                        <div class="flex flex-wrap items-center gap-2 mt-2 text-xs sm:text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span>Recruitment</span>

                            <i data-lucide="chevron-right" class="w-4 h-4"></i>

                            <span class="text-slate-700">
                                Candidates List
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
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/candidates-grid') ?>"
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>



                <!-- Candidates List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">

                    <!-- Header -->
                    <div class="p-5 border-b">


                        <h3 class="text-l font-semibold text-slate-800">
                            Candidate Grid
                        </h3>

                    </div>


                </div>

                <!-- Candidates Section -->
                <?php
                $applications = $applications ?? [];

                function statusBadge($status)
                {
                    return match ($status) {
                        'Applied', 'Sent' => 'bg-purple-500 text-white font-semibold',
                        'Scheduled' => 'bg-pink-500 text-white font-semibold',
                        'Interviewed' => 'bg-blue-500 text-white font-semibold',
                        'Offered' => 'bg-yellow-500 text-white font-semibold',
                        'Hired' => 'bg-green-500 text-white font-semibold',
                        'Rejected' => 'bg-red-500 text-white font-semibold',
                        default => 'bg-slate-500 text-white font-semibold'
                        
                    };
                }

                ?>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mt-5">

                    <?php if (!empty($applications)): ?>
                        <?php foreach ($applications as $application): ?>
                            <?php
                            $candidateName = !empty($application['candidate_name']) ? $application['candidate_name'] : ($application['name'] ?? 'Unknown');
                            $candidateEmail = !empty($application['candidate_email']) ? $application['candidate_email'] : ($application['email'] ?? '-');
                            $applicationStatus = $application['application_status'] ?? 'Applied';
                            $appliedDate = !empty($application['applied_at']) ? date('d M Y', strtotime($application['applied_at'])) : 'N/A';
                            $hasResume = !empty($application['resume_file']);
                            ?>

                        <div
                            class="bg-white border border-slate-200 rounded-md shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">

                            <!-- Card Header -->
                            <div class="flex items-start gap-3 p-5">

                                <div class="w-10 h-10 rounded bg-orange-50 text-orange-500 border border-orange-100 flex items-center justify-center font-semibold shrink-0">
                                    <?= esc(substr($candidateName, 0, 1)) ?>
                                </div>

                                <div class="flex-1">

                                    <div class="flex items-center gap-2 flex-wrap">

                                        <h3 class="text-[16px] font-semibold text-slate-800 leading-none">
                                            <?= esc($candidateName) ?>
                                        </h3>

                                        <span
                                            class="bg-orange-50 text-orange-500 text-[10px] px-2 py-0.5 rounded font-medium">
                                            <?= esc($application['application_id'] ?? 'N/A') ?>
                                        </span>

                                    </div>

                                    <p class="text-[14px] text-slate-500 mt-1">
                                        <?= esc($candidateEmail) ?>
                                    </p>

                                </div>

                            </div>

                            <!-- Details -->
                            <div class="px-5 pb-5">

                                <div class="bg-slate-50 px-4 py-4">

                                    <div class="flex justify-between items-center text-[14px] mb-3">

                                        <span class="text-slate-500">
                                            Applied Role
                                        </span>

                                        <span class="font-medium text-slate-800">
                                            <?= esc($application['job_title'] ?? '-') ?>
                                        </span>

                                    </div>

                                    <div class="flex justify-between items-center text-[14px] mb-3">

                                        <span class="text-slate-500">
                                            Applied Date
                                        </span>

                                        <span class="font-medium text-slate-800">
                                            <?= esc($appliedDate) ?>
                                        </span>

                                    </div>

                                    <div class="flex justify-between items-center text-[14px] mb-3">

                                        <span class="text-slate-500">
                                            Source
                                        </span>

                                        <span class="font-medium text-slate-800">
                                            <?= esc($application['application_source'] ?? 'Internal Career Portal') ?>
                                        </span>

                                    </div>

                                    <div class="flex justify-between items-center">

                                        <span class="text-slate-500 text-[14px]">
                                            Status
                                        </span>

                                        <span
                                            class="px-3 py-1 rounded text-[11px] font-medium <?= statusBadge($applicationStatus) ?>">
                                            &bull; <?= esc($applicationStatus) ?>
                                        </span>

                                    </div>

                                    <div class="mt-4 flex gap-2">
                                        <a href="<?= $hasResume ? base_url('Recruitment/applications/resume/' . $application['application_id']) : '#' ?>"
                                            target="_blank"
                                            class="<?= $hasResume ? 'border-slate-200 text-slate-700 hover:bg-white' : 'pointer-events-none border-slate-100 text-slate-300' ?> inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-md border text-xs font-semibold">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                            View
                                        </a>
                                        <a href="<?= $hasResume ? base_url('Recruitment/applications/resume-download/' . $application['application_id']) : '#' ?>"
                                            class="<?= $hasResume ? 'border-slate-200 text-slate-700 hover:bg-white' : 'pointer-events-none border-slate-100 text-slate-300' ?> inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-md border text-xs font-semibold">
                                            <i data-lucide="download" class="w-4 h-4"></i>
                                            Download
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-1 md:col-span-2 xl:col-span-4 bg-white border border-slate-200 rounded-md p-8 text-center text-slate-500">
                            No candidates have applied yet.
                        </div>
                    <?php endif; ?>

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
