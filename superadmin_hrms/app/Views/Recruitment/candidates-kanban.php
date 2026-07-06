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
                            class="w-10 h-10 bg-orange-500 rounded-md flex items-center justify-center text-white">
                            <i data-lucide="kanban" class="w-4 h-4"></i>
                        </a>

                        <!-- List View -->
                        <a href="<?= base_url('Recruitment/candidates') ?>"
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-slate-500">
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
                            Candidate Kanban
                        </h3>

                    </div>


                </div>

                <!-- Candidates Kanban -->
                <?php
                $applications = $applications ?? [];

                $columns = [
                    'Applied' => ['dot' => 'bg-purple-500'],
                    'Sent' => ['dot' => 'bg-purple-500'],
                    'Scheduled' => ['dot' => 'bg-pink-500'],
                    'Interviewed' => ['dot' => 'bg-blue-500'],
                    'Offered' => ['dot' => 'bg-yellow-400'],
                    'Hired' => ['dot' => 'bg-green-500'],
                    'Rejected' => ['dot' => 'bg-red-500'],
                ];

                foreach ($applications as $application) {
                    $applicationStatus = $application['application_status'] ?? 'Applied';
                    if (!isset($columns[$applicationStatus])) {
                        $columns[$applicationStatus] = ['dot' => 'bg-slate-500'];
                    }
                }

                ?>

                <div class="overflow-x-auto pb-5">

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">

                        <?php foreach ($columns as $status => $style): ?>

                            <?php
                            $columnApplications = array_filter($applications, static function ($application) use ($status) {
                                return ($application['application_status'] ?? 'Applied') === $status;
                            });
                            $count = count($columnApplications);
                            ?>

                            <div class="bg-slate-100 rounded-lg p-3 min-w-0">

                                <!-- Column Header -->
                                <div class="bg-white rounded-md px-4 py-3 flex items-center justify-between shadow-sm mb-3">

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

                                    <button>

                                        <i data-lucide="more-vertical" class="w-4 h-4 text-slate-500"></i>

                                    </button>

                                </div>

                                <!-- Cards -->

                                <div id="column-<?= strtolower(str_replace(' ', '-', $status)) ?>"
                                    class="kanban-column space-y-4 min-h-[60px]" data-status="<?= $status ?>">

                                    <?php foreach ($columnApplications as $application): ?>
                                        <?php
                                        $candidateName = !empty($application['candidate_name']) ? $application['candidate_name'] : ($application['name'] ?? 'Unknown');
                                        $candidateEmail = !empty($application['candidate_email']) ? $application['candidate_email'] : ($application['email'] ?? '-');
                                        $appliedDate = !empty($application['applied_at']) ? date('d M Y', strtotime($application['applied_at'])) : 'N/A';
                                        ?>

                                        <div class="candidate-card bg-white border border-slate-200 rounded-md shadow-sm hover:shadow-md transition-all duration-200 cursor-move p-4"
                                            data-id="<?= esc($application['application_id'] ?? '') ?>">

                                            <!-- Header -->
                                            <div class="flex items-center justify-between">

                                                <span
                                                    class="inline-flex items-center bg-orange-50 text-orange-500 text-[10px] font-medium px-2 py-1 rounded">
                                                    <?= esc($application['application_id'] ?? 'N/A') ?>
                                                </span>

                                                <button type="button">
                                                    <i data-lucide="more-vertical" class="w-4 h-4 text-slate-500"></i>
                                                </button>

                                            </div>

                                            <div class="border-t border-slate-200 my-3"></div>

                                            <!-- Candidate -->
                                            <div class="flex items-start gap-3 min-w-0">

                                                <div class="w-10 h-10 rounded bg-orange-50 text-orange-500 border border-orange-100 flex items-center justify-center font-semibold shrink-0">
                                                    <?= esc(substr($candidateName, 0, 1)) ?>
                                                </div>

                                                <div class="flex-1 min-w-0">

                                                    <h4 class="text-[15px] font-semibold text-slate-800 leading-tight truncate">

                                                        <?= esc($candidateName) ?>

                                                    </h4>

                                                    <p class="text-[13px] text-slate-500 leading-tight break-words">

                                                        <?= esc($candidateEmail) ?>

                                                    </p>

                                                </div>

                                            </div>

                                            <!-- Footer -->

                                            <div class="grid grid-cols-2 gap-4 mt-5">

                                                <!-- Applied Role -->
                                                <div class="border-r border-slate-200 pr-4">

                                                    <p class="text-[12px] text-slate-500 whitespace-nowrap">
                                                        Applied Role
                                                    </p>

                                                    <p
                                                        class="text-[13px] font-semibold text-slate-800 mt-2 leading-5 whitespace-normal break-normal overflow-wrap-anywhere">
                                                        <?= esc($application['job_title'] ?? '-') ?>
                                                    </p>

                                                </div>

                                                <!-- Applied Date -->
                                                <div class="pl-1">

                                                    <p class="text-[12px] text-slate-500 whitespace-nowrap">
                                                        Applied Date
                                                    </p>

                                                    <p class="text-[13px] font-semibold text-slate-800 mt-2 whitespace-nowrap">
                                                        <?= esc($appliedDate) ?>
                                                    </p>

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

        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
        <script>
            document.querySelectorAll('.kanban-column').forEach(column => {

                new Sortable(column, {
                    group: 'candidates',
                    animation: 200,
                    ghostClass: 'bg-orange-100',
                    dragClass: 'shadow-xl',

                    onEnd: function () {
                        updateKanbanCounts();

                    }
                });

            });

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

            

            // Initial count on page load
            updateKanbanCounts();
        </script>

        <style>
            .drag-ghost {
                opacity: .45;
                transform: rotate(2deg);
            }

            .dragging {
                transform: rotate(3deg);
                box-shadow: 0 15px 35px rgba(0, 0, 0, .18);
            }

            .drag-chosen {
                cursor: grabbing;
            }
        </style>

</body>
