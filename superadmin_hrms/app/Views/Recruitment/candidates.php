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
                            Candidates List
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
                    $candidates = [
                        [
                            'id' => 'Cand-001',
                            'name' => 'Harold Gaynor',
                            'email' => 'harold@example.com',
                            'role' => 'Accountant',
                            'phone' => '(146) 8964 278',
                            'date' => '12 Sep 2024',
                            'status' => 'Sent',
                            'image' => 'assets/images/users/user-01.jpg'
                        ],
                        [
                            'id' => 'Cand-002',
                            'name' => 'Sandra Ornellas',
                            'email' => 'sandra@example.com',
                            'role' => 'App Developer',
                            'phone' => '(148) 9648 218',
                            'date' => '24 Oct 2024',
                            'status' => 'Scheduled',
                            'image' => 'assets/images/users/user-02.jpg'
                        ],
                        [
                            'id' => 'Cand-003',
                            'name' => 'John Harris',
                            'email' => 'john@example.com',
                            'role' => 'Technician',
                            'phone' => '(196) 2348 947',
                            'date' => '18 Feb 2024',
                            'status' => 'Interviewed',
                            'image' => 'assets/images/users/user-03.jpg'
                        ],
                        [
                            'id' => 'Cand-004',
                            'name' => 'Carole Langan',
                            'email' => 'carole@example.com',
                            'role' => 'Web Developer',
                            'phone' => '(138) 6487 295',
                            'date' => '17 Oct 2024',
                            'status' => 'Offered',
                            'image' => 'assets/images/users/user-04.jpg'
                        ],
                        [
                            'id' => 'Cand-005',
                            'name' => 'Charles Marks',
                            'email' => 'charles@example.com',
                            'role' => 'Sales Executive Officer',
                            'phone' => '(154) 6485 218',
                            'date' => '20 Jul 2024',
                            'status' => 'Hired',
                            'image' => 'assets/images/users/user-05.jpg'
                        ],
                        [
                            'id' => 'Cand-006',
                            'name' => 'Kerry Drake',
                            'email' => 'kerry@example.com',
                            'role' => 'Designer',
                            'phone' => '(185) 5947 097',
                            'date' => '20 Jul 2024',
                            'status' => 'Rejected',
                            'image' => 'assets/images/users/user-06.jpg'
                        ],
                        [
                            'id' => 'Cand-007',
                            'name' => 'David Carmona',
                            'email' => 'david@example.com',
                            'role' => 'Account Manager',
                            'phone' => '(106) 3485 978',
                            'date' => '29 Aug 2024',
                            'status' => 'Hired',
                            'image' => 'assets/images/users/user-07.jpg'
                        ],
                        [
                            'id' => 'Cand-008',
                            'name' => 'Margaret Soto',
                            'email' => 'margaret@example.com',
                            'role' => 'SEO Analyst',
                            'phone' => '(174) 3795 107',
                            'date' => '22 Feb 2024',
                            'status' => 'Scheduled',
                            'image' => 'assets/images/users/user-08.jpg'
                        ],
                        [
                            'id' => 'Cand-009',
                            'name' => 'Jeffrey Thaler',
                            'email' => 'jeffrey@example.com',
                            'role' => 'Admin',
                            'phone' => '(128) 0975 348',
                            'date' => '03 Nov 2024',
                            'status' => 'App Received',
                            'image' => 'assets/images/users/user-09.jpg'
                        ],
                        [
                            'id' => 'Cand-010',
                            'name' => 'Joyce Golston',
                            'email' => 'joyce@example.com',
                            'role' => 'Business Analyst',
                            'phone' => '(132) 1876 304',
                            'date' => '17 Dec 2024',
                            'status' => 'Hired',
                            'image' => 'assets/images/users/user-10.jpg'
                        ]
                    ];

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

                                        <th class="text-left font-semibold">Phone</th>

                                        <th class="text-left font-semibold">Applied Date</th>
                                
                                        <th class="text-center font-semibold">Resume</th>

                                        <th class="px-6 py-4 text-left font-semibold w-44">Status</th>

                                        <th class="text-center font-semibold w-16"></th>

                                    </tr>

                                </thead>

                                <tbody class="divide-y divide-slate-200 bg-white">

                                    <?php foreach ($candidates as $candidate): ?>

                                        <tr class="hover:bg-slate-50 transition">

                                            <td class="px-5 py-4">
                                                <input type="checkbox" class="rounded border-slate-300">
                                            </td>

                                            <td class="font-medium text-slate-600">
                                                <?= $candidate['id'] ?>
                                            </td>

                                            <td>

                                                <div class="flex items-center gap-3">

                                                    <img src="<?= base_url($candidate['image']) ?>"
                                                        class="w-10 h-10 rounded-full object-cover">

                                                    <div>

                                                        <h4 class="font-semibold text-slate-800">
                                                            <?= $candidate['name'] ?>
                                                        </h4>

                                                        <p class="text-slate-500">
                                                            <?= $candidate['email'] ?>
                                                        </p>

                                                    </div>

                                                </div>

                                            </td>

                                            <td class="text-slate-600">
                                                <?= $candidate['role'] ?>
                                            </td>

                                            <td class="text-slate-600">
                                                <?= $candidate['phone'] ?>
                                            </td>

                                            <td class="text-slate-600">
                                                <?= $candidate['date'] ?>
                                            </td>

                                            <td>

                                                <div class="flex justify-center gap-3">

                                                    <button class="text-slate-500 hover:text-orange-500">
                                                        <i data-lucide="file-text" class="w-4 h-4"></i>
                                                    </button>

                                                    <button class="text-slate-500 hover:text-blue-600">
                                                        <i data-lucide="download" class="w-4 h-4"></i>
                                                    </button>

                                                </div>

                                            </td>

                                            <td class="px-6 py-4 w-44">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-md text-xs font-medium <?= statusBadge($candidate['status']) ?>">
                                                    • <?= $candidate['status'] ?>
                                                </span>
                                            </td>

                                            <td>

                                                <div class="flex justify-center">

                                                    <button class="text-slate-400 hover:text-red-500">
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
                                Showing 1 - <?= count($candidates) ?> of <?= count($candidates) ?> entries
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

    <script>
        const selectAll = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');

        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });

        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', function () {
                const allChecked =
                    [...rowCheckboxes].every(c => c.checked);

                selectAll.checked = allChecked;
            });
        });
    </script>






</body>