<?php
$status = $requisition['status'] ?? 'Published';
$statusClass = match ($status) {
    'Published', 'Approved' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
    'Pending Approval' => 'bg-sky-50 text-sky-700 ring-sky-200',
    'Rejected' => 'bg-rose-50 text-rose-700 ring-rose-200',
    'Draft' => 'bg-amber-50 text-amber-700 ring-amber-200',
    default => 'bg-slate-100 text-slate-700 ring-slate-200',
};

$salaryRange = (!empty($requisition['salary_from']) && !empty($requisition['salary_to']))
    ? '&#8377;' . number_format((float) $requisition['salary_from']) . ' - &#8377;' . number_format((float) $requisition['salary_to'])
    : 'Not set';
$publishedAt = !empty($requisition['published_at']) ? date('d M Y', strtotime($requisition['published_at'])) : 'Not published';
$targetHireDate = !empty($requisition['target_hire_date']) && $requisition['target_hire_date'] !== '0000-00-00'
    ? date('d M Y', strtotime($requisition['target_hire_date']))
    : 'Not set';
$description = trim((string) ($requisition['description'] ?? ''));
$justification = trim((string) ($requisition['justification_notes'] ?? ''));
$skillsSource = trim((string) ($requisition['mandatory_skills'] ?? $requisition['skills'] ?? ''));
$skills = array_values(array_filter(array_map('trim', preg_split('/[,\\n]+/', $skillsSource))));
$postingChannels = [];
if (!empty($requisition['publish_internal'])) {
    $postingChannels[] = 'Internal';
}
if (!empty($requisition['publish_external'])) {
    $postingChannels[] = 'External';
}
?>

<div class="relative bg-white">
    <button type="button"
        onclick="if (typeof closeViewModal === 'function') { closeViewModal(); } else { history.back(); }"
        class="absolute right-4 top-4 z-20 inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 shadow-sm transition hover:bg-slate-50 hover:text-slate-900"
        title="Close">
        <i data-lucide="x" class="h-4 w-4"></i>
    </button>

    <div class="border-b border-slate-200 bg-slate-50 px-5 py-5 sm:px-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
            <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ring-1 <?= $statusClass ?>">
                        <?= esc($status) ?>
                    </span>
                    <span class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        <?= esc($requisition['requisition_no'] ?? 'N/A') ?>
                    </span>
                </div>
                <h1 class="mt-3 text-2xl font-semibold leading-tight text-slate-950 sm:text-3xl">
                    <?= esc($requisition['job_title'] ?? 'Untitled role') ?>
                </h1>
                <div class="mt-3 flex flex-wrap gap-x-4 gap-y-2 text-sm text-slate-600">
                    <span class="inline-flex items-center gap-2">
                        <i data-lucide="building-2" class="h-4 w-4 text-slate-400"></i>
                        <?= esc($requisition['department'] ?? 'N/A') ?>
                    </span>
                    <span class="inline-flex items-center gap-2">
                        <i data-lucide="map-pin" class="h-4 w-4 text-slate-400"></i>
                        <?= esc($requisition['location'] ?? 'N/A') ?>
                    </span>
                    <span class="inline-flex items-center gap-2">
                        <i data-lucide="briefcase-business" class="h-4 w-4 text-slate-400"></i>
                        <?= esc($requisition['employment_type'] ?? 'N/A') ?>
                    </span>
                    <span class="inline-flex items-center gap-2">
                        <i data-lucide="calendar-days" class="h-4 w-4 text-slate-400"></i>
                        Posted <?= esc($publishedAt) ?>
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-3 rounded-lg border border-slate-200 bg-white p-3 shadow-sm">
                <div class="min-w-20 text-center">
                    <p class="text-xs font-medium text-slate-500">Openings</p>
                    <p class="mt-1 text-xl font-semibold text-slate-950"><?= esc($requisition['vacancies'] ?? 0) ?></p>
                </div>
                <div class="min-w-24 border-x border-slate-200 px-3 text-center">
                    <p class="text-xs font-medium text-slate-500">Experience</p>
                    <p class="mt-1 text-sm font-semibold text-slate-950"><?= esc($requisition['experience'] ?? 'N/A') ?></p>
                </div>
                <div class="min-w-28 text-center">
                    <p class="text-xs font-medium text-slate-500">Target</p>
                    <p class="mt-1 text-sm font-semibold text-slate-950"><?= esc($targetHireDate) ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 px-5 py-6 sm:px-6 lg:grid-cols-[1.6fr_1fr]">
        <div class="space-y-6">
            <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center gap-3 border-b border-slate-200 px-5 py-4">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <i data-lucide="file-text" class="h-4 w-4"></i>
                    </span>
                    <div>
                        <h2 class="text-base font-semibold text-slate-950">Role Summary</h2>
                        <p class="text-sm text-slate-500">Published job description and hiring context.</p>
                    </div>
                </div>
                <div class="space-y-5 p-5">
                    <div>
                        <h3 class="text-sm font-semibold text-slate-800">Job Description</h3>
                        <div class="mt-2 rounded-lg border border-slate-200 bg-slate-50 p-4 text-sm leading-6 text-slate-700 whitespace-pre-line">
                            <?= $description !== '' ? nl2br(esc($description)) : '<span class="text-slate-400">No job description provided.</span>' ?>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-slate-800">Hiring Justification</h3>
                        <div class="mt-2 rounded-lg border border-slate-200 bg-white p-4 text-sm leading-6 text-slate-700">
                            <?= $justification !== '' ? nl2br(esc($justification)) : '<span class="text-slate-400">No justification notes provided.</span>' ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center gap-3 border-b border-slate-200 px-5 py-4">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <i data-lucide="badge-check" class="h-4 w-4"></i>
                    </span>
                    <div>
                        <h2 class="text-base font-semibold text-slate-950">Skills & Qualifications</h2>
                        <p class="text-sm text-slate-500">Core requirements for candidate matching.</p>
                    </div>
                </div>
                <div class="grid gap-5 p-5 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Mandatory Skills</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <?php if (!empty($skills)): ?>
                                <?php foreach ($skills as $skill): ?>
                                    <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-indigo-100">
                                        <?= esc($skill) ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="text-sm text-slate-400">No mandatory skills listed.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Preferred Skills</p>
                        <div class="mt-3 rounded-lg border border-slate-200 bg-slate-50 p-4 text-sm leading-6 text-slate-700 whitespace-pre-line">
                            <?= !empty($requisition['preferred_skills']) ? nl2br(esc($requisition['preferred_skills'])) : '<span class="text-slate-400">No preferred skills listed.</span>' ?>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Education</p>
                        <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($requisition['education'] ?? 'N/A') ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Work Mode</p>
                        <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($requisition['work_mode'] ?? 'N/A') ?></p>
                    </div>
                </div>
            </section>
        </div>

        <aside class="space-y-6">
            <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-5 py-4">
                    <h2 class="text-base font-semibold text-slate-950">Job Snapshot</h2>
                    <p class="mt-1 text-sm text-slate-500">Operational details for this opening.</p>
                </div>
                <div class="divide-y divide-slate-100 px-5">
                    <?php
                    $facts = [
                        ['label' => 'Salary Range', 'value' => $salaryRange, 'icon' => 'wallet'],
                        ['label' => 'Reason for Hire', 'value' => $requisition['reason_for_hire'] ?? 'N/A', 'icon' => 'user-plus'],
                        ['label' => 'Budget Status', 'value' => $requisition['budget_status'] ?? 'N/A', 'icon' => 'circle-dollar-sign'],
                        ['label' => 'Request Date', 'value' => !empty($requisition['request_date']) ? date('d M Y', strtotime($requisition['request_date'])) : 'N/A', 'icon' => 'calendar'],
                        ['label' => 'Requested By', 'value' => $requisition['requested_by'] ?? 'N/A', 'icon' => 'user-round'],
                    ];
                    ?>
                    <?php foreach ($facts as $fact): ?>
                        <div class="flex items-start gap-3 py-4">
                            <span class="mt-0.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                                <i data-lucide="<?= esc($fact['icon']) ?>" class="h-4 w-4"></i>
                            </span>
                            <div class="min-w-0">
                                <p class="text-xs font-medium text-slate-500"><?= esc($fact['label']) ?></p>
                                <p class="mt-1 break-words text-sm font-semibold text-slate-900"><?= $fact['label'] === 'Salary Range' ? $fact['value'] : esc($fact['value']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-5 py-4">
                    <h2 class="text-base font-semibold text-slate-950">Approval & Posting</h2>
                    <p class="mt-1 text-sm text-slate-500">Workflow and sourcing visibility.</p>
                </div>
                <div class="space-y-4 p-5">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="rounded-lg border border-slate-200 bg-slate-50 p-3">
                            <p class="text-xs font-medium text-slate-500">HOD</p>
                            <p class="mt-1 text-sm font-semibold text-slate-900"><?= esc($requisition['hod_status'] ?? 'N/A') ?></p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-slate-50 p-3">
                            <p class="text-xs font-medium text-slate-500">HR</p>
                            <p class="mt-1 text-sm font-semibold text-slate-900"><?= esc($requisition['hr_status'] ?? 'N/A') ?></p>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Posting Channels</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <?php if (!empty($postingChannels)): ?>
                                <?php foreach ($postingChannels as $channel): ?>
                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-100">
                                        <?= esc($channel) ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="text-sm text-slate-400">No channels selected.</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">External Boards</p>
                        <p class="mt-2 text-sm font-semibold text-slate-900"><?= esc($requisition['external_boards'] ?? '-') ?: '-' ?></p>
                    </div>
                </div>
            </section>
        </aside>
    </div>

</div>
