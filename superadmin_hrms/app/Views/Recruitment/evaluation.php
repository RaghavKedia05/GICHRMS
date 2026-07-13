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
    $canManageCandidates = in_array(session('role'), ['admin', 'hr'], true);

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
                                            <td class="px-5 py-4">
                                                <div class="flex flex-wrap justify-end gap-2">
                                                    <a href="<?= base_url('Recruitment/applications/profile/' . $application['application_id']) ?>"
                                                        class="inline-flex h-9 items-center gap-2 rounded-md bg-slate-900 px-3 text-xs font-semibold text-white hover:bg-slate-700">
                                                        <i data-lucide="folder-open" class="h-4 w-4"></i>
                                                        Open Profile
                                                    </a>

                                                    <?php if ($canManageCandidates && $status !== 'Rejected'): ?>
                                                        <button type="button"
                                                            data-application-id="<?= (int) $application['application_id'] ?>"
                                                            data-candidate-name="<?= esc($candidateName, 'attr') ?>"
                                                            data-job-title="<?= esc($application['job_title'] ?? '-', 'attr') ?>"
                                                            onclick="openEvaluationRejectModal(this)"
                                                            class="inline-flex h-9 items-center gap-2 rounded-md border border-rose-200 bg-white px-3 text-xs font-semibold text-rose-700 transition hover:bg-rose-50"
                                                            title="Reject candidate and send notification email">
                                                            <i data-lucide="user-x" class="h-4 w-4"></i>
                                                            Reject
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
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

    <div id="evaluationRejectModal"
        class="fixed inset-0 z-[70] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm"
        role="dialog" aria-modal="true" aria-labelledby="evaluationRejectTitle">
        <div class="w-full max-w-lg overflow-hidden rounded-xl border border-white/20 bg-white shadow-2xl">
            <div class="flex items-start justify-between gap-4 border-b border-slate-200 px-5 py-5 sm:px-6">
                <div class="flex items-start gap-3">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-rose-50 text-rose-600">
                        <i data-lucide="user-x" class="h-5 w-5"></i>
                    </span>
                    <div>
                        <h2 id="evaluationRejectTitle" class="text-lg font-semibold text-slate-950">Reject Candidate</h2>
                        <p class="mt-1 text-sm text-slate-500">This removes the candidate from the evaluation pipeline.</p>
                    </div>
                </div>
                <button type="button" onclick="closeEvaluationRejectModal()" aria-label="Close rejection dialog"
                    class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>

            <form id="evaluationRejectForm" method="post">
                <?= csrf_field() ?>

                <div class="space-y-5 px-5 py-5 sm:px-6">
                    <div class="rounded-lg border border-rose-200 bg-rose-50 p-4">
                        <p id="evaluationRejectCandidate" class="font-semibold text-rose-950">Candidate</p>
                        <p id="evaluationRejectRole" class="mt-1 text-sm text-rose-700">Applied role</p>
                    </div>

                    <div class="flex gap-3 rounded-lg border border-sky-200 bg-sky-50 p-4 text-sm text-sky-800">
                        <i data-lucide="mail" class="mt-0.5 h-5 w-5 shrink-0 text-sky-600"></i>
                        <p class="leading-6">
                            Once confirmed, the candidate will be marked as rejected and a rejection email will be sent automatically.
                        </p>
                    </div>

                    <div>
                        <label for="evaluationRejectionReason" class="block text-sm font-semibold text-slate-700">
                            Rejection reason <span class="text-rose-500">*</span>
                        </label>
                        <textarea id="evaluationRejectionReason" name="rejection_reason" rows="4" required
                            placeholder="Add concise, professional feedback for the candidate..."
                            class="mt-2 w-full resize-y rounded-lg border border-slate-300 px-3.5 py-3 text-sm leading-6 text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10"></textarea>
                        <p class="mt-2 text-xs text-slate-500">This feedback will be included in the candidate's email.</p>
                    </div>
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-5 py-4 sm:flex-row sm:justify-end sm:px-6">
                    <button type="button" onclick="closeEvaluationRejectModal()"
                        class="inline-flex h-10 items-center justify-center rounded-lg border border-slate-300 bg-white px-4 text-sm font-semibold text-slate-700 hover:bg-slate-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-rose-600 px-4 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">
                        <i data-lucide="mail-x" class="h-4 w-4"></i>
                        Reject & Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => $successMessage,
        'toastError' => $errorMessage,
    ]) ?>

    <script>
        lucide.createIcons();

        function openEvaluationRejectModal(button) {
            const modal = document.getElementById('evaluationRejectModal');
            const form = document.getElementById('evaluationRejectForm');

            form.action = "<?= base_url('Recruitment/applications/reject/') ?>" + button.dataset.applicationId;
            document.getElementById('evaluationRejectCandidate').textContent = button.dataset.candidateName;
            document.getElementById('evaluationRejectRole').textContent = button.dataset.jobTitle;
            document.getElementById('evaluationRejectionReason').value = '';

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            document.getElementById('evaluationRejectionReason').focus();
        }

        function closeEvaluationRejectModal() {
            const modal = document.getElementById('evaluationRejectModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        document.getElementById('evaluationRejectModal').addEventListener('click', function (event) {
            if (event.target === this) {
                closeEvaluationRejectModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeEvaluationRejectModal();
            }
        });

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
