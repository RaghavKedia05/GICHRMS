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
                            Candidate Grid
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

                <!-- Candidates Section -->
                <?php
                $candidates = [

                    [
                        'id' => 'Cand-001',
                        'name' => 'Harold Gaynor',
                        'email' => 'harold@example.com',
                        'role' => 'Accountant',
                        'date' => '12 Sep 2024',
                        'status' => 'New',
                        'image' => 'https://placehold.co/80x80/f1f5f9/334155?text=HG'
                    ],

                    [

                        'id' => 'Cand-002',
                        'name' => 'Sandra Ornellas',
                        'email' => 'sandra@example.com',
                        'role' => 'Accountant',
                        'date' => '12 Sep 2024',
                        'status' => 'Scheduled',
                        'image' => 'https://placehold.co/80x80/f1f5f9/334155?text=HG'
                    ],

                    // Add as many candidates as you want...
                
                ];

                function statusBadge($status)
                {
                    return match ($status) {
                        'New' => 'bg-purple-500 text-white font-semibold',
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

                    <?php foreach ($candidates as $candidate): ?>

                        <div
                            class="bg-white border border-slate-200 rounded-md shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">

                            <!-- Card Header -->
                            <div class="flex items-start gap-3 p-5">

                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($candidate['name']) ?>&background=FF6B35&color=fff"
                                    class="w-10 h-10 rounded object-cover border border-slate-200"
                                    alt="<?= esc($candidate['name']) ?>">

                                <div class="flex-1">

                                    <div class="flex items-center gap-2 flex-wrap">

                                        <h3 class="text-[16px] font-semibold text-slate-800 leading-none">
                                            <?= esc($candidate['name']) ?>
                                        </h3>

                                        <span
                                            class="bg-orange-50 text-orange-500 text-[10px] px-2 py-0.5 rounded font-medium">
                                            <?= esc($candidate['id']) ?>
                                        </span>

                                    </div>

                                    <p class="text-[14px] text-slate-500 mt-1">
                                        <?= esc($candidate['email']) ?>
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
                                            <?= esc($candidate['role']) ?>
                                        </span>

                                    </div>

                                    <div class="flex justify-between items-center text-[14px] mb-3">

                                        <span class="text-slate-500">
                                            Applied Date
                                        </span>

                                        <span class="font-medium text-slate-800">
                                            <?= esc($candidate['date']) ?>
                                        </span>

                                    </div>

                                    <div class="flex justify-between items-center">

                                        <span class="text-slate-500 text-[14px]">
                                            Status
                                        </span>

                                        <span
                                            class="px-3 py-1 rounded text-[11px] font-medium <?= statusBadge($candidate['status']) ?>">
                                            • <?= esc($candidate['status']) ?>
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

                <!-- Load More Button -->
                <div class="flex justify-center mt-6">

                    <button
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md text-sm font-medium flex items-center gap-2">

                        <i data-lucide="loader-circle" class="w-4 h-4"></i>

                        Load More

                    </button>

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