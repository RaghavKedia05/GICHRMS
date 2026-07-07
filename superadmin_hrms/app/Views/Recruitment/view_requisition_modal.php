<div class="bg-white rounded-3xl shadow-xl border border-slate-200 max-w-6xl mx-auto">

    <!-- Header -->
    <div class="px-8 py-6 bg-slate-50 border-b border-slate-200">
        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">
            <div class="space-y-3">
                <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Requisition Overview</p>
                <h1 class="text-3xl font-semibold text-slate-900 leading-tight"><?= esc($requisition['job_title']) ?></h1>
                <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500">
                    <span class="font-semibold text-slate-700"><?= esc($requisition['requisition_no']) ?></span>
                    <span class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span><?= esc($requisition['department']) ?></span>
                    <span class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span><?= esc($requisition['employment_type']) ?></span>
                    <span class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span><?= esc($requisition['location']) ?></span>
                </div>
            </div>

            <?php
            $badge = 'bg-slate-100 text-slate-700';
            switch ($requisition['status']) {
                case 'Draft':
                    $badge = 'bg-yellow-100 text-yellow-800';
                    break;
                case 'Pending Approval':
                    $badge = 'bg-blue-100 text-blue-700';
                    break;
                case 'Approved':
                case 'Published':
                    $badge = 'bg-green-100 text-green-700';
                    break;
                case 'Rejected':
                    $badge = 'bg-red-100 text-red-700';
                    break;
            }
            ?>

            <div class="flex flex-col items-start sm:items-end gap-2">
                <span class="<?= $badge ?> inline-flex items-center justify-center rounded-full px-4 py-2 text-sm font-semibold">
                    <?= esc($requisition['status']) ?>
                </span>
                <p class="text-xs text-slate-500">Last updated <?= date('d M Y, h:i A', strtotime($requisition['updated_at'])) ?></p>
            </div>
        </div>
    </div>

    <!-- Summary Panel -->
    <div class="px-8 py-6 grid gap-4 sm:grid-cols-3">
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 text-center">
            <p class="text-xs uppercase tracking-[0.3em] text-slate-400 mb-3">Vacancies</p>
            <p class="text-3xl font-semibold text-slate-900"><?= esc($requisition['vacancies']) ?></p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 text-center">
            <p class="text-xs uppercase tracking-[0.3em] text-slate-400 mb-3">Experience</p>
            <p class="text-3xl font-semibold text-slate-900"><?= esc($requisition['experience']) ?></p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 text-center">
            <p class="text-xs uppercase tracking-[0.3em] text-slate-400 mb-3">Salary Range</p>
            <p class="text-3xl font-semibold text-slate-900">₹<?= number_format($requisition['salary_from']) ?> - ₹<?= number_format($requisition['salary_to']) ?></p>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="px-8 pb-8 space-y-6">
        <div class="grid gap-6 lg:grid-cols-[1.6fr_1fr]">
            <div class="space-y-6">
                <section class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center">
                            <i data-lucide="file-text" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Job Description</p>
                            <h2 class="mt-2 text-xl font-semibold text-slate-900">Role Summary</h2>
                        </div>
                    </div>
                    <div class="text-slate-700 leading-7 whitespace-pre-line">
                        <?= nl2br(esc($requisition['description'])) ?>
                    </div>
                </section>

                <section class="rounded-3xl border border-slate-200 bg-white p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-2xl bg-amber-100 flex items-center justify-center">
                            <i data-lucide="clipboard-list" class="w-5 h-5 text-amber-600"></i>
                        </div>
                        <div>
                            <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Hiring Justification</p>
                            <h2 class="mt-2 text-xl font-semibold text-slate-900">Why This Role Matters</h2>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 text-slate-700 min-h-[130px]">
                        <?= !empty($requisition['hiring_justification'])
                            ? nl2br(esc($requisition['hiring_justification']))
                            : '<span class="text-slate-400 italic">No hiring justification provided.</span>' ?>
                    </div>
                </section>
            </div>

            <div class="space-y-6">
                <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-2xl bg-emerald-100 flex items-center justify-center">
                            <i data-lucide="badge-check" class="w-5 h-5 text-emerald-600"></i>
                        </div>
                        <div>
                            <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Required Skills</p>
                            <h2 class="mt-2 text-xl font-semibold text-slate-900">Core Competencies</h2>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <?php
                        $skills = explode(',', $requisition['skills']);
                        foreach ($skills as $skill):
                            $skill = trim($skill);
                            if ($skill === '') continue;
                        ?>
                            <span class="rounded-full border border-indigo-100 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-700">
                                <?= esc($skill) ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-2xl bg-slate-100 flex items-center justify-center">
                            <i data-lucide="briefcase" class="w-5 h-5 text-slate-600"></i>
                        </div>
                        <div>
                            <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Job Snapshot</p>
                            <h2 class="mt-2 text-xl font-semibold text-slate-900">Quick Facts</h2>
                        </div>
                    </div>
                    <div class="grid gap-4 text-sm text-slate-600">
                        <div class="rounded-3xl border border-slate-200 bg-white p-4">
                            <p class="text-slate-500">Department</p>
                            <p class="font-semibold text-slate-900"><?= esc($requisition['department']) ?></p>
                        </div>
                        <div class="rounded-3xl border border-slate-200 bg-white p-4">
                            <p class="text-slate-500">Employment Type</p>
                            <p class="font-semibold text-slate-900"><?= esc($requisition['employment_type']) ?></p>
                        </div>
                        <div class="rounded-3xl border border-slate-200 bg-white p-4">
                            <p class="text-slate-500">Location</p>
                            <p class="font-semibold text-slate-900"><?= esc($requisition['location']) ?></p>
                        </div>
                        <div class="rounded-3xl border border-slate-200 bg-white p-4">
                            <p class="text-slate-500">Request Date</p>
                            <p class="font-semibold text-slate-900"><?= date('d M Y', strtotime($requisition['request_date'] ?? $requisition['created_at'])) ?></p>
                        </div>
                    </div>
                </section>

                <?php if (($requisition['status'] ?? '') === 'Published'): ?>
                    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-11 h-11 rounded-2xl bg-indigo-100 flex items-center justify-center">
                                <i data-lucide="radio-tower" class="w-5 h-5 text-indigo-600"></i>
                            </div>
                            <div>
                                <p class="text-sm uppercase tracking-[0.25em] text-slate-400">Posting Channels</p>
                                <h2 class="mt-2 text-xl font-semibold text-slate-900">Sourcing</h2>
                            </div>
                        </div>
                        <div class="grid gap-3 text-sm text-slate-600">
                            <p><span class="font-semibold text-slate-900">Internal:</span> <?= !empty($requisition['publish_internal']) ? 'Published' : 'Not published' ?></p>
                            <p><span class="font-semibold text-slate-900">External:</span> <?= !empty($requisition['publish_external']) ? 'Published' : 'Not published' ?></p>
                            <p><span class="font-semibold text-slate-900">Boards:</span> <?= esc($requisition['external_boards'] ?? '-') ?: '-' ?></p>
                            <p><span class="font-semibold text-slate-900">Notes:</span> <?= esc($requisition['posting_notes'] ?? '-') ?: '-' ?></p>
                        </div>
                    </section>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="px-8 py-6 bg-slate-50 border-t border-slate-200">
        <div class="flex flex-col items-center gap-4">
            <?php if ($requisition['status'] == 'Draft'): ?>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 w-full max-w-3xl">
                    <button onclick="closeViewModal();openEditModal(<?= $requisition['id'] ?>)"
                        class="w-full sm:w-auto rounded-2xl bg-amber-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-amber-600">
                        <i data-lucide="square-pen" class="w-4 h-4 inline mr-2"></i>
                        Edit Draft
                    </button>

                    <form action="<?= base_url('Recruitment/requisitions/update/' . $requisition['id']) ?>" method="post" class="w-full sm:w-auto">
                        <input type="hidden" name="status" value="Pending Approval">
                        <button type="submit"
                            class="w-full rounded-2xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700">
                            <i data-lucide="send" class="w-4 h-4 inline mr-2"></i>
                            Submit For Approval
                        </button>
                    </form>
                </div>
            <?php endif; ?>

            <button onclick="closeViewModal()"
                class="rounded-2xl border border-slate-300 bg-white px-12 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                Close
            </button>
        </div>
    </div>

</div>
