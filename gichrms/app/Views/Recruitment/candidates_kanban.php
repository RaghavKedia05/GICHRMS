<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Pipeline | GICHRMS</title>

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

                        <p class="mt-2 text-sm text-slate-500">See the full candidate journey grouped by recruitment stage.</p>
                    </div>

                    <div class="inline-flex self-start rounded-lg border border-slate-200 bg-white p-1 shadow-sm">

                        <!-- Kanban View -->
                        <a href="<?= base_url('Recruitment/candidates-kanban') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md bg-blue-600 text-white">
                            <i data-lucide="kanban" class="w-4 h-4"></i>
                        </a>

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/candidates') ?>"
                            class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50">
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


                </div>

                <!-- Candidates Kanban -->
                <?php
                $applications = $applications ?? [];

                $columns = [
                    'Applied' => ['dot' => 'bg-purple-500'],
                    'Shortlisted' => ['dot' => 'bg-emerald-500'],
                    'Interview Scheduled' => ['dot' => 'bg-pink-500'],
                    'Selected' => ['dot' => 'bg-green-500'],
                    'Rejected' => ['dot' => 'bg-red-500'],
                ];

                foreach ($applications as $application) {
                    $applicationStatus = $application['application_status'] ?? 'Applied';
                    if (!isset($columns[$applicationStatus])) {
                        $columns[$applicationStatus] = ['dot' => 'bg-slate-500'];
                    }
                }

                ?>

                <div class="overflow-x-auto pb-5 [scrollbar-color:#cbd5e1_transparent] [scrollbar-width:thin]">

                    <div class="flex min-w-max items-start gap-4">

                        <?php foreach ($columns as $status => $style): ?>

                            <?php
                            $columnApplications = array_filter($applications, static function ($application) use ($status) {
                                return ($application['application_status'] ?? 'Applied') === $status;
                            });
                            $count = count($columnApplications);
                            ?>

                            <div class="w-[290px] shrink-0 rounded-2xl border border-slate-200 bg-slate-100/70 p-3 sm:w-[310px]">

                                <!-- Column Header -->
                                <div class="mb-3 flex items-center justify-between rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-sm">

                                    <div class="flex items-center gap-2">

                                        <span class="w-3 h-3 rounded-full <?= $style['dot'] ?>"></span>

                                        <h3 class="font-semibold text-slate-800">
                                            <?= $status ?>
                                        </h3>

                                        <span
                                            class="kanban-count bg-slate-100 text-slate-500 text-xs px-2 py-0.5 rounded-full"
                                            data-status="<?= $status ?>">
                                            <?= $count ?>
                                        </span>

                                    </div>

                                </div>

                                <!-- Cards -->

                                <div id="column-<?= strtolower(str_replace(' ', '-', $status)) ?>"
                                    class="kanban-column space-y-4 min-h-[60px]" data-status="<?= $status ?>">

                                    <?php foreach ($columnApplications as $application): ?>
                                        <?php
                                        $candidateName = !empty($application['candidate_name']) ? $application['candidate_name'] : ($application['name'] ?? 'Unknown');
                                        $candidateEmail = !empty($application['candidate_email']) ? $application['candidate_email'] : ($application['email'] ?? '-');
                                        $appliedDate = !empty($application['applied_at']) ? date('d M Y', strtotime($application['applied_at'])) : 'N/A';
                                        $hasResume = !empty($application['resume_file']);
                                        ?>

                                        <div class="candidate-card rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition-all duration-200 hover:border-blue-300 hover:shadow-md"
                                            data-id="<?= esc($application['application_id'] ?? '') ?>">

                                            <!-- Header -->
                                            <div class="flex items-center justify-between">

                                                <span
                                                    class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-1 text-[10px] font-bold text-blue-600">
                                                    <?= esc($application['application_id'] ?? 'N/A') ?>
                                                </span>

                                            </div>

                                            <div class="border-t border-slate-200 my-3"></div>

                                            <!-- Candidate -->
                                            <div class="flex min-w-0 items-start gap-3">

                                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-blue-100 bg-blue-50 font-bold text-blue-600">
                                                    <?= esc(substr($candidateName, 0, 1)) ?>
                                                </div>

                                                <div class="flex-1 min-w-0">

                                                    <h4 class="text-[15px] font-semibold text-slate-800 leading-tight truncate">

                                                        <?= esc($candidateName) ?>

                                                    </h4>

                                                    <p class="mt-1 break-all text-[12px] leading-4 text-slate-500">

                                                        <?= esc($candidateEmail) ?>

                                                    </p>

                                                </div>

                                            </div>

                                            <!-- Footer -->

                                            <div class="mt-5 grid grid-cols-2 gap-0 overflow-hidden rounded-xl border border-slate-200 bg-slate-50/60">

                                                <!-- Applied Role -->
                                                <div class="min-w-0 border-r border-slate-200 p-3">

                                                    <p class="whitespace-nowrap text-[11px] font-medium text-slate-500">
                                                        Applied Role
                                                    </p>

                                                    <p
                                                        class="mt-1.5 break-words text-[13px] font-bold leading-5 text-slate-800">
                                                        <?= esc($application['job_title'] ?? '-') ?>
                                                    </p>

                                                </div>

                                                <!-- Applied Date -->
                                                <div class="min-w-0 p-3">

                                                    <p class="whitespace-nowrap text-[11px] font-medium text-slate-500">
                                                        Applied Date
                                                    </p>

                                                    <p class="mt-1.5 whitespace-nowrap text-[13px] font-bold text-slate-800">
                                                        <?= esc($appliedDate) ?>
                                                    </p>

                                                </div>

                                            </div>

                                            <div class="mt-4 rounded-xl bg-slate-50 p-3">
                                                <p class="text-[12px] text-slate-500">Source</p>
                                                <p class="mt-1 break-words text-[13px] font-bold leading-5 text-slate-800">
                                                    <?= esc($application['application_source'] ?? 'Internal Career Portal') ?>
                                                </p>
                                                <div class="mt-3 grid grid-cols-2 gap-2">
                                                    <a href="<?= base_url('Recruitment/applications/profile/' . $application['application_id']) ?>"
                                                        class="col-span-2 inline-flex h-9 items-center justify-center gap-1.5 rounded-lg bg-blue-600 text-[12px] font-bold text-white hover:bg-blue-700">
                                                        <i data-lucide="folder-open" class="w-3.5 h-3.5"></i>
                                                        Profile
                                                    </a>
                                                    <a href="<?= $hasResume ? base_url('Recruitment/applications/resume/' . $application['application_id']) : '#' ?>"
                                                        target="_blank"
                                                        class="<?= $hasResume ? 'border-slate-200 bg-white text-slate-700 hover:border-blue-200 hover:text-blue-700' : 'pointer-events-none border-slate-100 text-slate-300' ?> inline-flex h-9 min-w-0 items-center justify-center gap-1.5 rounded-lg border text-[12px] font-bold">
                                                        <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                                                        View
                                                    </a>
                                                    <a href="<?= $hasResume ? base_url('Recruitment/applications/resume-download/' . $application['application_id']) : '#' ?>"
                                                        class="<?= $hasResume ? 'border-slate-200 bg-white text-slate-700 hover:border-blue-200 hover:text-blue-700' : 'pointer-events-none border-slate-100 text-slate-300' ?> inline-flex h-9 min-w-0 items-center justify-center gap-1.5 rounded-lg border text-[12px] font-bold">
                                                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                                        Download
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        <?php endforeach; ?>

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

        <script>
            function updateKanbanCounts() {
                document.querySelectorAll(".kanban-column").forEach(column => {
                    const status = column.dataset.status;
                    const count = column.querySelectorAll(".candidate-card").length;

                    const badge = document.querySelector(
                        `.kanban-count[data-status="${status}"]`
                    );

                    if (badge) {
                        badge.textContent = count;
                    }
                });
            }

            updateKanbanCounts();
        </script>

</body>
