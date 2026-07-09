<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Evaluation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-[#f8fafc]">
    <?php
    $applications = $applications ?? [];
    $stats = $stats ?? [];
    $successMessage = session()->getFlashdata('success');
    $errorMessage = session()->getFlashdata('error');

    function evaluationBadge($status)
    {
        return match ($status) {
            'Shortlisted' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
            'Interview Scheduled' => 'bg-pink-50 text-pink-700 border-pink-200',
            'Selected' => 'bg-green-50 text-green-700 border-green-200',
            'Rejected' => 'bg-rose-50 text-rose-700 border-rose-200',
            default => 'bg-violet-50 text-violet-700 border-violet-200',
        };
    }
    ?>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>
    <div class="flex h-screen overflow-hidden">
        <?php include __DIR__ . '/../sidebar.php'; ?>

        <div class="flex-1 flex flex-col overflow-hidden">
            <?php include __DIR__ . '/../navbar.php'; ?>

            <main class="flex-1 overflow-y-auto p-4 lg:p-5">
                <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">Evaluation & Interviews</h1>
                        <div class="mt-2 flex flex-wrap items-center gap-2 text-sm text-slate-500">
                            <i data-lucide="house" class="h-4 w-4"></i>
                            <i data-lucide="chevron-right" class="h-4 w-4"></i>
                            <span>Recruitment</span>
                            <i data-lucide="chevron-right" class="h-4 w-4"></i>
                            <span class="text-slate-700">Evaluation</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">
                        <a href="<?= base_url('Recruitment/candidates') ?>"
                            class="inline-flex h-10 items-center gap-2 rounded-md border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                            <i data-lucide="users" class="h-4 w-4"></i>
                            All Candidates
                        </a>
                        <a href="<?= base_url('Recruitment/candidates-kanban') ?>"
                            class="inline-flex h-10 items-center gap-2 rounded-md bg-orange-500 px-4 text-sm font-semibold text-white hover:bg-orange-600">
                            <i data-lucide="kanban" class="h-4 w-4"></i>
                            Kanban Board
                        </a>
                    </div>
                </div>

                <?php if ($successMessage || $errorMessage): ?>
                    <div class="mb-5 rounded-md border px-4 py-3 text-sm font-semibold <?= $successMessage ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-rose-200 bg-rose-50 text-rose-700' ?>">
                        <?= esc($successMessage ?: $errorMessage) ?>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
                    <?php foreach (['Applied', 'Shortlisted', 'Interview Scheduled', 'Selected', 'Rejected'] as $status): ?>
                        <div class="rounded-md border border-slate-200 bg-white p-4 shadow-sm">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold uppercase tracking-wide text-slate-500"><?= esc($status) ?></span>
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-md bg-slate-100 text-slate-600">
                                    <i data-lucide="<?= $status === 'Rejected' ? 'user-x' : ($status === 'Selected' ? 'badge-check' : 'clipboard-list') ?>" class="h-4 w-4"></i>
                                </span>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-900"><?= (int) ($stats[$status] ?? 0) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-5 rounded-md border border-slate-200 bg-white shadow-sm">
                    <div class="flex flex-col gap-3 border-b border-slate-200 p-5 lg:flex-row lg:items-center lg:justify-between">
                        <h2 class="text-lg font-semibold text-slate-900">Candidate Evaluation Queue</h2>
                        <div class="flex flex-wrap gap-2 text-xs font-semibold">
                            <span class="rounded-md border border-violet-200 bg-violet-50 px-3 py-1 text-violet-700">Applied</span>
                            <span class="rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-emerald-700">Shortlisted</span>
                            <span class="rounded-md border border-pink-200 bg-pink-50 px-3 py-1 text-pink-700">Interview Scheduled</span>
                            <span class="rounded-md border border-green-200 bg-green-50 px-3 py-1 text-green-700">Selected</span>
                            <span class="rounded-md border border-rose-200 bg-rose-50 px-3 py-1 text-rose-700">Rejected</span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-100 text-left text-slate-700">
                                <tr>
                                    <th class="px-5 py-4 font-semibold">Candidate</th>
                                    <th class="px-5 py-4 font-semibold">Role</th>
                                    <th class="px-5 py-4 font-semibold">Interview</th>
                                    <th class="px-5 py-4 font-semibold">Score</th>
                                    <th class="px-5 py-4 font-semibold">Status</th>
                                    <th class="px-5 py-4 text-right font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                <?php if (!empty($applications)): ?>
                                    <?php foreach ($applications as $application): ?>
                                        <?php
                                        $candidateName = $application['candidate_name'] ?: ($application['name'] ?? 'Unknown');
                                        $candidateEmail = $application['candidate_email'] ?: ($application['email'] ?? '-');
                                        $status = $application['application_status'] ?? 'Applied';
                                        ?>
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-5 py-4">
                                                <p class="font-semibold text-slate-900"><?= esc($candidateName) ?></p>
                                                <p class="mt-1 text-xs text-slate-500"><?= esc($candidateEmail) ?></p>
                                            </td>
                                            <td class="px-5 py-4 text-slate-700">
                                                <p class="font-semibold"><?= esc($application['job_title'] ?? '-') ?></p>
                                                <p class="mt-1 text-xs text-slate-500"><?= esc($application['department'] ?? '-') ?></p>
                                            </td>
                                            <td class="px-5 py-4 text-slate-700">
                                                <p class="font-semibold"><?= esc($application['interview_round'] ?? 'Not scheduled') ?></p>
                                                <p class="mt-1 text-xs text-slate-500">
                                                    <?= !empty($application['interview_date']) ? date('d M Y, h:i A', strtotime($application['interview_date'])) : 'No date set' ?>
                                                </p>
                                            </td>
                                            <td class="px-5 py-4">
                                                <span class="text-sm font-semibold text-slate-900">
                                                    <?= isset($application['total_score']) && $application['total_score'] !== null ? esc($application['total_score']) . '/100' : '-' ?>
                                                </span>
                                            </td>
                                            <td class="px-5 py-4">
                                                <span class="inline-flex rounded-md border px-3 py-1 text-xs font-semibold <?= evaluationBadge($status) ?>">
                                                    <?= esc($status) ?>
                                                </span>
                                            </td>
                                            <td class="px-5 py-4 text-right">
                                                <a href="<?= base_url('Recruitment/applications/profile/' . $application['application_id']) ?>"
                                                    class="inline-flex h-9 items-center gap-2 rounded-md bg-slate-900 px-3 text-xs font-semibold text-white hover:bg-slate-700">
                                                    <i data-lucide="folder-open" class="h-4 w-4"></i>
                                                    Open Profile
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="px-5 py-8 text-center text-slate-500">No candidate applications found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }

        document.getElementById('sidebarOverlay').addEventListener('click', function () {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            this.classList.add('hidden');
        });
    </script>
</body>

</html>
