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

                        <p class="mt-2 text-sm text-slate-500">Scan candidate profiles, application sources, and current status.</p>
                    </div>

                    <div class="inline-flex self-start rounded-lg border border-slate-200 bg-white p-1 shadow-sm">

                        <!-- Kanban View -->
                        <a href="<?= base_url('Recruitment/candidates-kanban') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
                            <i data-lucide="kanban" class="w-4 h-4"></i>
                        </a>

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/candidates') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
                            <i data-lucide="list" class="w-4 h-4"></i>
                        </a>

                        <!-- Grid View -->
                        <a href="<?= base_url('Recruitment/candidates-grid') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md bg-blue-600 text-white">
                            <i data-lucide="grid-2x2" class="w-4 h-4"></i>
                        </a>

                    </div>

                </div>



                <!-- Candidates List -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <!-- Header -->
                    <div class="p-5 border-b">


                        <h3 class="text-l font-semibold text-slate-800">
                            Candidate Cards
                        </h3>

                    </div>


                </div>

                <!-- Candidates Section -->
                <?php
                $applications = $applications ?? [];

                function statusBadge($status)
                {
                    return match ($status) {
                        'Applied', 'Sent' => 'border border-violet-200 bg-violet-50 text-violet-700 font-bold',
                        'Shortlisted' => 'border border-emerald-200 bg-emerald-50 text-emerald-700 font-bold',
                        'Scheduled', 'Interview Scheduled' => 'border border-pink-200 bg-pink-50 text-pink-700 font-bold',
                        'Interviewed' => 'border border-blue-200 bg-blue-50 text-blue-700 font-bold',
                        'Selected', 'Hired' => 'border border-green-200 bg-green-50 text-green-700 font-bold',
                        'Offered' => 'border border-amber-200 bg-amber-50 text-amber-700 font-bold',
                        'Rejected' => 'border border-red-200 bg-red-50 text-red-700 font-bold',
                        default => 'border border-slate-200 bg-slate-50 text-slate-700 font-bold'
                        
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
                            class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-blue-300 hover:shadow-lg">

                            <!-- Card Header -->
                            <div class="flex items-start gap-3 p-5">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-blue-100 bg-blue-50 font-bold text-blue-600">
                                    <?= esc(substr($candidateName, 0, 1)) ?>
                                </div>

                                <div class="flex-1">

                                    <div class="flex items-center gap-2 flex-wrap">

                                        <h3 class="text-[16px] font-semibold text-slate-800 leading-none">
                                            <?= esc($candidateName) ?>
                                        </h3>

                                        <span
                                            class="rounded-full bg-blue-50 px-2.5 py-1 text-[10px] font-bold text-blue-600">
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
                                        <a href="<?= base_url('Recruitment/applications/profile/' . $application['application_id']) ?>"
                                            class="inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-lg bg-blue-600 text-xs font-bold text-white hover:bg-blue-700">
                                            <i data-lucide="folder-open" class="w-4 h-4"></i>
                                            Profile
                                        </a>
                                        <a href="<?= $hasResume ? base_url('Recruitment/applications/resume/' . $application['application_id']) : '#' ?>"
                                            target="_blank"
                                            class="<?= $hasResume ? 'border-slate-200 text-slate-700 hover:bg-slate-50' : 'pointer-events-none border-slate-100 text-slate-300' ?> inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-lg border text-xs font-bold">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                            View
                                        </a>
                                        <a href="<?= $hasResume ? base_url('Recruitment/applications/resume-download/' . $application['application_id']) : '#' ?>"
                                            class="<?= $hasResume ? 'border-slate-200 text-slate-700 hover:bg-slate-50' : 'pointer-events-none border-slate-100 text-slate-300' ?> inline-flex h-9 flex-1 items-center justify-center gap-2 rounded-lg border text-xs font-bold">
                                            <i data-lucide="download" class="w-4 h-4"></i>
                                            Download
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-1 rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-500 md:col-span-2 xl:col-span-4">
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
