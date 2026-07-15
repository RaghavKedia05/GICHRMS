<?php
$fieldClass = 'w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10';
$labelClass = 'mb-2 block text-sm font-semibold text-slate-700';
$employmentTypes = ['Full Time', 'Part Time', 'Contract', 'Internship'];
$workModes = ['On-site', 'Remote', 'Hybrid'];
$experienceLevels = ['0-2 Years', '3-5 Years', '5-8 Years', '8+ Years'];
$educationLevels = ["Bachelor's Degree", "Master's Degree", 'Diploma', 'Certification'];
$status = $requisition['status'] ?? 'Draft';
$statusClass = $status === 'Draft'
    ? 'border-amber-200 bg-amber-50 text-amber-700'
    : 'border-indigo-200 bg-indigo-50 text-indigo-700';
?>

<form method="post" action="<?= base_url('Recruitment/requisitions/update/' . $requisition['id']) ?>"
    class="text-left">
    <?= csrf_field() ?>

    <input type="hidden" name="requisition_no" value="<?= esc($requisition['requisition_no'] ?? '') ?>">

    <div class="space-y-5">
        <div class="flex flex-col gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                    <p class="truncate text-base font-semibold text-slate-950">
                        <?= esc($requisition['job_title'] ?? 'Untitled requisition') ?>
                    </p>
                    <span class="inline-flex rounded-full border px-2.5 py-1 text-xs font-semibold <?= $statusClass ?>">
                        <?= esc($status) ?>
                    </span>
                </div>
                <p class="mt-1 text-sm text-slate-500">
                    Requisition <?= esc($requisition['requisition_no'] ?? ('#' . $requisition['id'])) ?>
                </p>
            </div>
            <div class="flex shrink-0 items-center gap-2 text-xs font-medium text-slate-500">
                <i data-lucide="info" class="h-4 w-4 text-indigo-500"></i>
                Fields marked <span class="font-bold text-rose-500">*</span> are required
            </div>
        </div>

        <section class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:p-6">
            <div class="mb-6 flex items-start gap-3 border-b border-slate-200 pb-4">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                    <i data-lucide="briefcase-business" class="h-5 w-5"></i>
                </span>
                <div>
                    <h3 class="text-base font-semibold text-slate-950">Position details</h3>
                    <p class="mt-1 text-sm text-slate-500">Define the role, working arrangement, and hiring timeline.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label for="edit-job-title" class="<?= $labelClass ?>">
                        Job title <span class="text-rose-500">*</span>
                    </label>
                    <input id="edit-job-title" type="text" name="job_title" required
                        value="<?= esc($requisition['job_title'] ?? '') ?>" placeholder="e.g. Senior Software Engineer"
                        class="<?= $fieldClass ?>">
                </div>

                <div>
                    <label for="edit-department" class="<?= $labelClass ?>">
                        Department <span class="text-rose-500">*</span>
                    </label>
                    <select id="edit-department" name="department" required class="<?= $fieldClass ?>">
                        <?php foreach ($departments as $dept): ?>
                            <option value="<?= esc($dept['department_name']) ?>"
                                <?= ($dept['department_name'] ?? '') === ($requisition['department'] ?? '') ? 'selected' : '' ?>>
                                <?= esc($dept['department_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="edit-employment-type" class="<?= $labelClass ?>">
                        Employment type <span class="text-rose-500">*</span>
                    </label>
                    <select id="edit-employment-type" name="employment_type" required class="<?= $fieldClass ?>">
                        <?php foreach ($employmentTypes as $type): ?>
                            <option value="<?= esc($type) ?>" <?= $type === ($requisition['employment_type'] ?? '') ? 'selected' : '' ?>>
                                <?= esc($type) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="edit-vacancies" class="<?= $labelClass ?>">
                        Number of vacancies <span class="text-rose-500">*</span>
                    </label>
                    <input id="edit-vacancies" type="number" name="vacancies" min="1" required
                        value="<?= esc($requisition['vacancies'] ?? 1) ?>" class="<?= $fieldClass ?>">
                </div>

                <div>
                    <label for="edit-target-date" class="<?= $labelClass ?>">Target hire date</label>
                    <input id="edit-target-date" type="date" name="target_hire_date"
                        value="<?= esc($requisition['target_hire_date'] ?? '') ?>" class="<?= $fieldClass ?>">
                </div>

                <div>
                    <label for="edit-work-mode" class="<?= $labelClass ?>">Work mode</label>
                    <select id="edit-work-mode" name="work_mode" class="<?= $fieldClass ?>">
                        <option value="">Select work mode</option>
                        <?php foreach ($workModes as $mode): ?>
                            <option value="<?= esc($mode) ?>" <?= $mode === ($requisition['work_mode'] ?? '') ? 'selected' : '' ?>>
                                <?= esc($mode) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="edit-location" class="<?= $labelClass ?>">Job location / branch</label>
                    <input id="edit-location" type="text" name="location"
                        value="<?= esc($requisition['location'] ?? '') ?>" placeholder="e.g. Head Office, Mumbai"
                        class="<?= $fieldClass ?>">
                </div>

                <div>
                    <label for="edit-request-date" class="<?= $labelClass ?>">Request date</label>
                    <input id="edit-request-date" type="date" name="request_date"
                        value="<?= esc($requisition['request_date'] ?? '') ?>" class="<?= $fieldClass ?>">
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:p-6">
            <div class="mb-6 flex items-start gap-3 border-b border-slate-200 pb-4">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <i data-lucide="wallet-cards" class="h-5 w-5"></i>
                </span>
                <div>
                    <h3 class="text-base font-semibold text-slate-950">Hiring reason & budget</h3>
                    <p class="mt-1 text-sm text-slate-500">Record the business need and approved compensation range.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <fieldset class="md:col-span-2">
                    <legend class="<?= $labelClass ?>">Reason for hire</legend>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <?php foreach (['New Headcount', 'Replacement'] as $reason): ?>
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 transition hover:border-indigo-300 hover:bg-indigo-50/50">
                                <input type="radio" name="reason_for_hire" value="<?= esc($reason) ?>"
                                    <?= $reason === ($requisition['reason_for_hire'] ?? '') ? 'checked' : '' ?>
                                    class="h-4 w-4 border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                <span class="text-sm font-semibold text-slate-700"><?= esc($reason) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </fieldset>

                <div>
                    <label for="edit-previous-employee" class="<?= $labelClass ?>">Previous employee</label>
                    <input id="edit-previous-employee" type="text" name="previous_employee"
                        value="<?= esc($requisition['previous_employee'] ?? '') ?>" placeholder="Required only for a replacement"
                        class="<?= $fieldClass ?>">
                </div>

                <div>
                    <label for="edit-budget-status" class="<?= $labelClass ?>">Budget status</label>
                    <select id="edit-budget-status" name="budget_status" class="<?= $fieldClass ?>">
                        <option value="">Select budget status</option>
                        <?php foreach (['Budgeted', 'Unbudgeted'] as $budgetStatus): ?>
                            <option value="<?= esc($budgetStatus) ?>" <?= $budgetStatus === ($requisition['budget_status'] ?? '') ? 'selected' : '' ?>>
                                <?= esc($budgetStatus) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="edit-salary-from" class="<?= $labelClass ?>">Minimum salary</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-slate-400">Rs.</span>
                        <input id="edit-salary-from" type="number" name="salary_from" min="0"
                            value="<?= esc($requisition['salary_from'] ?? '') ?>" class="<?= $fieldClass ?> pl-12">
                    </div>
                </div>

                <div>
                    <label for="edit-salary-to" class="<?= $labelClass ?>">Maximum salary</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-slate-400">Rs.</span>
                        <input id="edit-salary-to" type="number" name="salary_to" min="0"
                            value="<?= esc($requisition['salary_to'] ?? '') ?>" class="<?= $fieldClass ?> pl-12">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label for="edit-justification" class="<?= $labelClass ?>">Justification notes</label>
                    <textarea id="edit-justification" name="justification_notes" rows="4"
                        placeholder="Explain the business need, urgency, or budget context..."
                        class="<?= $fieldClass ?> resize-y leading-6"><?= esc($requisition['justification_notes'] ?? '') ?></textarea>
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:p-6">
            <div class="mb-6 flex items-start gap-3 border-b border-slate-200 pb-4">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                    <i data-lucide="sparkles" class="h-5 w-5"></i>
                </span>
                <div>
                    <h3 class="text-base font-semibold text-slate-950">Candidate profile</h3>
                    <p class="mt-1 text-sm text-slate-500">Describe the experience, education, and skills needed for success.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div>
                    <label for="edit-experience" class="<?= $labelClass ?>">Minimum experience</label>
                    <select id="edit-experience" name="experience" class="<?= $fieldClass ?>">
                        <option value="">Select experience</option>
                        <?php foreach ($experienceLevels as $level): ?>
                            <option value="<?= esc($level) ?>" <?= $level === ($requisition['experience'] ?? '') ? 'selected' : '' ?>>
                                <?= esc($level) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="edit-education" class="<?= $labelClass ?>">Minimum education</label>
                    <select id="edit-education" name="education" class="<?= $fieldClass ?>">
                        <option value="">Select education</option>
                        <?php foreach ($educationLevels as $level): ?>
                            <option value="<?= esc($level) ?>" <?= $level === ($requisition['education'] ?? '') ? 'selected' : '' ?>>
                                <?= esc($level) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="edit-mandatory-skills" class="<?= $labelClass ?>">Mandatory skills</label>
                    <input id="edit-mandatory-skills" type="text" name="mandatory_skills"
                        value="<?= esc($requisition['mandatory_skills'] ?? ($requisition['skills'] ?? '')) ?>"
                        placeholder="e.g. JavaScript, Node.js, AWS" class="<?= $fieldClass ?>">
                    <p class="mt-2 text-xs text-slate-500">Separate skills with commas for easier candidate filtering.</p>
                </div>

                <div class="md:col-span-2">
                    <label for="edit-preferred-skills" class="<?= $labelClass ?>">Preferred skills</label>
                    <input id="edit-preferred-skills" type="text" name="preferred_skills"
                        value="<?= esc($requisition['preferred_skills'] ?? '') ?>" placeholder="e.g. Docker, Azure, UI/UX"
                        class="<?= $fieldClass ?>">
                </div>

                <div class="md:col-span-2">
                    <label for="edit-description" class="<?= $labelClass ?>">Job description</label>
                    <textarea id="edit-description" name="description" rows="7"
                        placeholder="Summarize the role, responsibilities, and expected outcomes..."
                        class="<?= $fieldClass ?> resize-y leading-6"><?= esc($requisition['description'] ?? '') ?></textarea>
                </div>
            </div>
        </section>
    </div>

    <div class="sticky bottom-0 z-10 -mx-4 mt-6 border-t border-slate-200 bg-white/95 px-4 py-4 shadow-[0_-10px_30px_rgba(15,23,42,0.08)] backdrop-blur sm:-mx-6 sm:px-6">
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
            <button type="button" onclick="closeEditModal()"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                <i data-lucide="x" class="h-4 w-4"></i>
                Cancel
            </button>

            <div class="flex flex-col-reverse gap-3 sm:flex-row">
                <button type="submit" name="action" value="draft"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-amber-300 hover:bg-amber-50 hover:text-amber-700">
                    <i data-lucide="save" class="h-4 w-4"></i>
                    Save as Draft
                </button>

                <button type="submit" name="action" value="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/20">
                    <i data-lucide="send" class="h-4 w-4"></i>
                    Submit for Approval
                </button>
            </div>
        </div>
    </div>
</form>
