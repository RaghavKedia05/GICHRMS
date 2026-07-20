<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-[#f8fafc]">
    <?php
    $candidateName = $application['candidate_name'] ?: ($application['name'] ?? 'Unknown');
    $candidateEmail = $application['candidate_email'] ?: ($application['email'] ?? '-');
    $status = $application['application_status'] ?? 'Applied';
    $hasResume = !empty($application['resume_file']);
    $successMessage = session()->getFlashdata('success');
    $errorMessage = session()->getFlashdata('error');
    ?>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>
    <div class="flex h-screen overflow-hidden">
        <?php include __DIR__ . '/../sidebar.php'; ?>

        <div class="flex-1 flex flex-col overflow-hidden">
            <?php include __DIR__ . '/../navbar.php'; ?>

            <main class="flex-1 overflow-y-auto p-4 lg:p-5">
                <div class="mb-5 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <a href="<?= base_url('Recruitment/evaluation') ?>" class="mb-3 inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-orange-600">
                            <i data-lucide="arrow-left" class="h-4 w-4"></i>
                            Evaluation Queue
                        </a>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-900"><?= esc($candidateName) ?></h1>
                        <div class="mt-2 flex flex-wrap items-center gap-2 text-sm text-slate-500">
                            <span><?= esc($candidateEmail) ?></span>
                            <span class="h-1.5 w-1.5 rounded-full bg-slate-300"></span>
                            <span><?= esc($application['job_title'] ?? '-') ?></span>
                            <span class="h-1.5 w-1.5 rounded-full bg-slate-300"></span>
                            <span class="font-semibold text-slate-700"><?= esc($status) ?></span>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <a href="<?= $hasResume ? base_url('Recruitment/applications/resume/' . $application['application_id']) : '#' ?>"
                            target="_blank"
                            class="<?= $hasResume ? 'bg-white text-slate-700 hover:bg-slate-50' : 'pointer-events-none bg-slate-100 text-slate-300' ?> inline-flex h-10 items-center gap-2 rounded-md border border-slate-200 px-4 text-sm font-semibold">
                            <i data-lucide="file-text" class="h-4 w-4"></i>
                            View Resume
                        </a>
                        <a href="<?= $hasResume ? base_url('Recruitment/applications/resume-download/' . $application['application_id']) : '#' ?>"
                            class="<?= $hasResume ? 'bg-slate-900 text-white hover:bg-slate-700' : 'pointer-events-none bg-slate-200 text-slate-400' ?> inline-flex h-10 items-center gap-2 rounded-md px-4 text-sm font-semibold">
                            <i data-lucide="download" class="h-4 w-4"></i>
                            Download Resume
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 xl:grid-cols-[1fr_380px]">
                    <section class="space-y-5">
                        <div class="rounded-md border border-slate-200 bg-white shadow-sm">
                            <div class="border-b border-slate-200 px-5 py-4">
                                <h2 class="text-lg font-semibold text-slate-900">Candidate Details</h2>
                            </div>
                            <div class="grid gap-4 p-5 md:grid-cols-2">
                                <?php
                                $details = [
                                    'Phone' => $application['phone'] ?? '-',
                                    'Current Company' => $application['current_company'] ?? '-',
                                    'Experience' => !empty($application['experience_years']) ? $application['experience_years'] . ' years' : '-',
                                    'Current Location' => $application['current_location'] ?? '-',
                                    'LinkedIn' => $application['linkedin_url'] ?? '-',
                                    'Portfolio' => $application['portfolio_url'] ?? '-',
                                ];
                                ?>
                                <?php foreach ($details as $label => $value): ?>
                                    <div class="rounded-md bg-slate-50 p-4">
                                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500"><?= esc($label) ?></p>
                                        <p class="mt-2 text-sm font-semibold text-slate-900 break-words"><?= esc($value ?: '-') ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="rounded-md border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                                <div>
                                    <h2 class="text-lg font-semibold text-slate-900">Round-by-Round Scores</h2>
                                    <p class="mt-1 text-xs text-slate-500">Saved evaluation results for every completed interview round</p>
                                </div>
                                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700"><?= count($roundEvaluations ?? []) ?> completed</span>
                            </div>
                            <div class="space-y-3 p-5">
                                <?php if (!empty($roundEvaluations)): ?>
                                    <?php foreach ($roundEvaluations as $roundEvaluation): ?>
                                        <article class="rounded-lg border border-slate-200 p-4">
                                            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                                <div>
                                                    <h3 class="font-semibold text-slate-900"><?= esc($roundEvaluation['round_name']) ?></h3>
                                                    <p class="mt-1 text-xs text-slate-500"><?= date('d M Y, h:i A', strtotime($roundEvaluation['evaluated_at'])) ?> · <?= esc($roundEvaluation['decision']) ?></p>
                                                </div>
                                                <span class="text-2xl font-bold text-indigo-700"><?= (int) $roundEvaluation['total_score'] ?><span class="text-sm text-slate-400">/100</span></span>
                                            </div>
                                            <div class="mt-4 grid grid-cols-3 gap-2 text-center">
                                                <?php foreach ([['Technical', 'technical_score'], ['Communication', 'communication_score'], ['Culture', 'culture_score']] as [$label, $field]): ?>
                                                    <div class="rounded-md bg-slate-50 p-3"><p class="text-xs text-slate-500"><?= $label ?></p><p class="mt-1 font-bold text-slate-900"><?= (int) $roundEvaluation[$field] ?></p></div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php if (!empty($roundEvaluation['notes'])): ?><p class="mt-3 text-sm leading-6 text-slate-600"><?= nl2br(esc($roundEvaluation['notes'])) ?></p><?php endif; ?>
                                        </article>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="rounded-lg bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">No interview rounds have been evaluated yet.</div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="rounded-md border border-slate-200 bg-white shadow-sm">
                            <div class="border-b border-slate-200 px-5 py-4">
                                <h2 class="text-lg font-semibold text-slate-900">Applied Role</h2>
                            </div>
                            <div class="grid gap-4 p-5 md:grid-cols-3">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Job Title</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($application['job_title'] ?? '-') ?></p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Department</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($application['department'] ?? '-') ?></p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Location</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($application['location'] ?? '-') ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-md border border-slate-200 bg-white shadow-sm">
                            <div class="border-b border-slate-200 px-5 py-4">
                                <h2 class="text-lg font-semibold text-slate-900">Interview Record</h2>
                            </div>
                            <div class="grid gap-4 p-5 md:grid-cols-2">
                                <div class="rounded-md bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Interview Round</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($application['interview_round'] ?? 'Not scheduled') ?></p>
                                </div>
                                <div class="rounded-md bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Interview Date</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-900"><?= !empty($application['interview_date']) ? date('d M Y, h:i A', strtotime($application['interview_date'])) : 'No date set' ?></p>
                                </div>
                                <div class="rounded-md bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Interviewer</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($application['interviewer_name'] ?? '-') ?></p>
                                </div>
                                <div class="rounded-md bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Final Score</p>
                                    <p class="mt-2 text-sm font-semibold text-slate-900"><?= $application['total_score'] !== null ? esc($application['total_score']) . '/100' : '-' ?></p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <aside class="space-y-5">
                        <form method="post" action="<?= base_url('Recruitment/applications/shortlist/' . $application['application_id']) ?>" class="rounded-md border border-slate-200 bg-white shadow-sm">
                            <?= csrf_field() ?>
                            <div class="border-b border-slate-200 px-5 py-4">
                                <h2 class="text-lg font-semibold text-slate-900">Shortlist Candidate</h2>
                            </div>
                            <div class="p-5">
                                <label class="block text-sm font-semibold text-slate-700">Screening Notes</label>
                                <textarea name="screening_notes" rows="3" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100"><?= esc($application['screening_notes'] ?? '') ?></textarea>
                                <button type="submit" class="mt-4 inline-flex h-10 w-full items-center justify-center gap-2 rounded-md bg-emerald-600 px-4 text-sm font-semibold text-white hover:bg-emerald-700">
                                    <i data-lucide="user-check" class="h-4 w-4"></i>
                                    Mark as Shortlisted
                                </button>
                            </div>
                        </form>

                        <form method="post" action="<?= base_url('Recruitment/applications/schedule/' . $application['application_id']) ?>" class="rounded-md border border-slate-200 bg-white shadow-sm">
                            <?= csrf_field() ?>
                            <div class="border-b border-slate-200 px-5 py-4">
                                <h2 class="text-lg font-semibold text-slate-900">Schedule Interview</h2>
                            </div>
                            <div class="space-y-4 p-5">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700">Round</label>
                                    <select name="interview_round" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                        <?php foreach (['Round 1 - HR Screening', 'Round 2 - Technical Evaluation', 'Round 3 - Management Round'] as $round): ?>
                                            <option <?= ($application['interview_round'] ?? '') === $round ? 'selected' : '' ?>><?= esc($round) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700">Date and Time</label>
                                    <input type="datetime-local" name="interview_date" required value="<?= !empty($application['interview_date']) ? date('Y-m-d\TH:i', strtotime($application['interview_date'])) : '' ?>" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700">Mode</label>
                                    <select name="interview_mode" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                        <?php foreach (['Online', 'In Person', 'Phone'] as $mode): ?>
                                            <option <?= ($application['interview_mode'] ?? '') === $mode ? 'selected' : '' ?>><?= esc($mode) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700">Interviewer Name</label>
                                    <input type="text" name="interviewer_name" value="<?= esc($application['interviewer_name'] ?? '') ?>" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                </div>
                                <button type="submit" class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md bg-pink-600 px-4 text-sm font-semibold text-white hover:bg-pink-700">
                                    <i data-lucide="calendar-clock" class="h-4 w-4"></i>
                                    Save Interview Schedule
                                </button>
                            </div>
                        </form>

                        <form method="post" action="<?= base_url('Recruitment/applications/evaluate/' . $application['application_id']) ?>" class="rounded-md border border-slate-200 bg-white shadow-sm">
                            <?= csrf_field() ?>
                            <div class="border-b border-slate-200 px-5 py-4">
                                <h2 class="text-lg font-semibold text-slate-900">Save Evaluation</h2>
                            </div>
                            <div class="space-y-4 p-5">
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-700">Technical</label>
                                        <input type="number" name="technical_score" min="0" max="100" required value="<?= esc($application['technical_score'] ?? '') ?>" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-700">Communication</label>
                                        <input type="number" name="communication_score" min="0" max="100" required value="<?= esc($application['communication_score'] ?? '') ?>" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-700">Culture</label>
                                        <input type="number" name="culture_score" min="0" max="100" required value="<?= esc($application['culture_score'] ?? '') ?>" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700">Decision</label>
                                    <select name="evaluation_status" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm">
                                        <option value="Advanced">Advance to Next Round</option>
                                        <option <?= ($application['evaluation_status'] ?? '') === 'Selected' ? 'selected' : '' ?>>Selected</option>
                                        <option <?= ($application['evaluation_status'] ?? '') === 'Rejected' ? 'selected' : '' ?>>Rejected</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700">Evaluation Notes</label>
                                    <textarea name="interview_notes" rows="3" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm"><?= esc($application['interview_notes'] ?? '') ?></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700">Rejection Reason</label>
                                    <textarea name="rejection_reason" rows="2" class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm"><?= esc($application['rejection_reason'] ?? '') ?></textarea>
                                </div>
                                <button type="submit" class="inline-flex h-10 w-full items-center justify-center gap-2 rounded-md bg-blue-600 px-4 text-sm font-semibold text-white hover:bg-blue-700">
                                    <i data-lucide="clipboard-check" class="h-4 w-4"></i>
                                    Save Evaluation Result
                                </button>
                            </div>
                        </form>
                    </aside>
                </div>
            </main>
        </div>
    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => $successMessage,
        'toastError' => $errorMessage,
    ]) ?>

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
