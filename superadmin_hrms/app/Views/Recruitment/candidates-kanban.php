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

                        <!-- Export -->
                        <button
                            class="flex items-center justify-center gap-2 px-3 py-2 text-xs sm:text-sm bg-white border border-slate-200 rounded-md">
                            <i data-lucide="file-down" class="w-4 h-4"></i>

                            Export

                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>

                        <!-- Scroll Top -->
                        <button
                            class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center">
                            <i data-lucide="chevrons-up" class="w-4 h-4"></i>
                        </button>

                    </div>

                </div>



                <!-- Candidates List -->
                <div class="bg-white border border-slate-200 rounded-md shadow-sm">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border-b">


                        <h3 class="text-l font-semibold text-slate-800">
                            Candidate Kanban
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 w-full lg:w-auto">

                            <button
                                class="flex items-center gap-2 border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto">
                                <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                09/06/2026 - 09/06/2026
                            </button>

                            <select class="border rounded-md px-4 py-2 text-[13px] w-full sm:w-auto" ">
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


                </div>

                <!-- Candidates Kanban -->
                <?php



                $candidates = [

                    [
                        'id' => 'Cand-001',
                        'name' => 'Harold Gaynor',
                        'email' => 'harold@example.com',
                        'role' => 'Accountant',
                        'date' => '12 Sep 2024',
                        'status' => 'New',
                        'image' => 'https://i.pravatar.cc/150?img=1'
                    ],

                    [
                        'id' => 'Cand-002',
                        'name' => 'Sandra Ornellas',
                        'email' => 'sandra@example.com',
                        'role' => 'Accountant',
                        'date' => '12 Sep 2024',
                        'status' => 'New',
                        'image' => 'https://i.pravatar.cc/150?img=2'
                    ],

                    [
                        'id' => 'Cand-003',
                        'name' => 'John Harris',
                        'email' => 'john@example.com',
                        'role' => 'Technician',
                        'date' => '12 Sep 2024',
                        'status' => 'Scheduled',
                        'image' => 'https://i.pravatar.cc/150?img=3'
                    ],

                    [
                        'id' => 'Cand-004',
                        'name' => 'Carole Langan',
                        'email' => 'carole@example.com',
                        'role' => 'Web Developer',
                        'date' => '12 Sep 2024',
                        'status' => 'Scheduled',
                        'image' => 'https://i.pravatar.cc/150?img=4'
                    ],

                    [
                        'id' => 'Cand-005',
                        'name' => 'Charles Marks',
                        'email' => 'charles@example.com',
                        'role' => 'SEO',
                        'date' => '12 Sep 2024',
                        'status' => 'Scheduled',
                        'image' => 'https://i.pravatar.cc/150?img=5'
                    ],

                    [
                        'id' => 'Cand-006',
                        'name' => 'Kerry Drake',
                        'email' => 'kerry@example.com',
                        'role' => 'Designer',
                        'date' => '12 Sep 2024',
                        'status' => 'Scheduled',
                        'image' => 'https://i.pravatar.cc/150?img=6'
                    ],

                    [
                        'id' => 'Cand-007',
                        'name' => 'David Carmona',
                        'email' => 'david@example.com',
                        'role' => 'Manager',
                        'date' => '12 Sep 2024',
                        'status' => 'Interviewed',
                        'image' => 'https://i.pravatar.cc/150?img=7'
                    ],

                    [
                        'id' => 'Cand-008',
                        'name' => 'Margaret Soto',
                        'email' => 'margaret@example.com',
                        'role' => 'SEO Analyst',
                        'date' => '12 Sep 2024',
                        'status' => 'Interviewed',
                        'image' => 'https://i.pravatar.cc/150?img=8'
                    ],

                    [
                        'id' => 'Cand-009',
                        'name' => 'Jeffrey Thaler',
                        'email' => 'jeffrey@example.com',
                        'role' => 'Admin',
                        'date' => '12 Sep 2024',
                        'status' => 'Offered',
                        'image' => 'https://i.pravatar.cc/150?img=9'
                    ],

                    [
                        'id' => 'Cand-010',
                        'name' => 'Joyce Golston',
                        'email' => 'joyce@example.com',
                        'role' => 'Business Analyst',
                        'date' => '12 Sep 2024',
                        'status' => 'Hired',
                        'image' => 'https://i.pravatar.cc/150?img=10'
                    ],

                    [
                        'id' => 'Cand-011',
                        'name' => 'Cedric Rosalez',
                        'email' => 'cedric@example.com',
                        'role' => 'Financial Analyst',
                        'date' => '12 Sep 2024',
                        'status' => 'Hired',
                        'image' => 'https://i.pravatar.cc/150?img=11'
                    ],

                    [
                        'id' => 'Cand-012',
                        'name' => 'Lillie Diaz',
                        'email' => 'lillie@example.com',
                        'role' => 'Receptionist',
                        'date' => '12 Sep 2024',
                        'status' => 'Hired',
                        'image' => 'https://i.pravatar.cc/150?img=12'
                    ],

                    [
                        'id' => 'Cand-013',
                        'name' => 'Angela Thomas',
                        'email' => 'angela@example.com',
                        'role' => 'Consultant',
                        'date' => '12 Sep 2024',
                        'status' => 'Rejected',
                        'image' => 'https://i.pravatar.cc/150?img=13'
                    ],

                    [
                        'id' => 'Cand-014',
                        'name' => 'Bruce Wright',
                        'email' => 'bruce@example.com',
                        'role' => 'CEO',
                        'date' => '12 Sep 2024',
                        'status' => 'Rejected',
                        'image' => 'https://i.pravatar.cc/150?img=14'
                    ]

                ];


                $columns = [
                    'New' => ['color' => 'bg-pink-500', 'dot' => 'bg-pink-500'],
                    'Scheduled' => ['color' => 'bg-pink-500', 'dot' => 'bg-pink-500'],
                    'Interviewed' => ['color' => 'bg-blue-500', 'dot' => 'bg-blue-500'],
                    'Offered' => ['color' => 'bg-yellow-400', 'dot' => 'bg-yellow-400'],
                    'Hired' => ['color' => 'bg-green-500', 'dot' => 'bg-green-500'],
                    'Rejected' => ['color' => 'bg-red-500', 'dot' => 'bg-red-500'],
                ];

                ?>

                <div class="overflow-x-auto pb-5">

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">

                        <?php foreach ($columns as $status => $style): ?>

                            <?php
                            $count = 0;
                            foreach ($candidates as $candidate) {
                                if ($candidate['status'] === $status) {
                                    $count++;
                                }
                            }
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

                                    <?php foreach ($candidates as $candidate): ?>


                                        <?php if ($candidate['status'] != $status)
                                            continue; ?>

                                        <div class="candidate-card bg-white border border-slate-200 rounded-md shadow-sm hover:shadow-md transition-all duration-200 cursor-move p-4"
                                            data-id="<?= esc($candidate['id']) ?>">

                                            <!-- Header -->
                                            <div class="flex items-center justify-between">

                                                <span
                                                    class="inline-flex items-center bg-orange-50 text-orange-500 text-[10px] font-medium px-2 py-1 rounded">
                                                    <?= esc($candidate['id']) ?>
                                                </span>

                                                <button type="button">
                                                    <i data-lucide="more-vertical" class="w-4 h-4 text-slate-500"></i>
                                                </button>

                                            </div>

                                            <div class="border-t border-slate-200 my-3"></div>

                                            <!-- Candidate -->
                                            <div class="flex items-start gap-3 min-w-0">

                                                <img src="<?= esc($candidate['image']) ?>" alt="<?= esc($candidate['name']) ?>"
                                                    class="w-10 h-10 rounded object-cover shrink-0">

                                                <div class="flex-1 min-w-0">

                                                    <h4 class="text-[15px] font-semibold text-slate-800 leading-tight truncate">

                                                        <?= esc($candidate['name']) ?>

                                                    </h4>

                                                    <p class="text-[13px] text-slate-500 leading-tight break-words">

                                                        <?= esc($candidate['email']) ?>

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
                                                        <?= esc($candidate['role']) ?>
                                                    </p>

                                                </div>

                                                <!-- Applied Date -->
                                                <div class="pl-1">

                                                    <p class="text-[12px] text-slate-500 whitespace-nowrap">
                                                        Applied Date
                                                    </p>

                                                    <p class="text-[13px] font-semibold text-slate-800 mt-2 whitespace-nowrap">
                                                        <?= esc($candidate['date']) ?>
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
            updateCounts();
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