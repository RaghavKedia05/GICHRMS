<div class="p-6 space-y-8">

    <!-- ============================= -->
    <!-- Request Details -->
    <!-- ============================= -->

    <div>
        <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
            1. Request Details
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="text-sm text-slate-500">Requisition No</label>
                <p class="font-semibold"><?= esc($requisition['requisition_no']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Requested By</label>
                <p class="font-semibold"><?= esc($requisition['requested_by']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Department</label>
                <p><?= esc($requisition['department']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Request Date</label>
                <p><?= esc($requisition['request_date']) ?></p>
            </div>

        </div>
    </div>

    <!-- ============================= -->
    <!-- Position Requirements -->
    <!-- ============================= -->

    <div>
        <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
            2. Position Requirements
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="text-sm text-slate-500">Job Title</label>
                <p class="font-semibold"><?= esc($requisition['job_title']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Number of Openings</label>
                <p><?= esc($requisition['vacancies']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Target Hire Date</label>
                <p><?= esc($requisition['target_hire_date']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Employment Type</label>
                <p><?= esc($requisition['employment_type']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Work Mode</label>
                <p><?= esc($requisition['work_mode']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Location</label>
                <p><?= esc($requisition['location']) ?></p>
            </div>

        </div>
    </div>

    <!-- ============================= -->
    <!-- Justification & Budget -->
    <!-- ============================= -->

    <div>
        <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
            3. Justification & Budget
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="text-sm text-slate-500">Reason for Hire</label>
                <p><?= esc($requisition['reason_for_hire']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Previous Employee</label>
                <p><?= esc($requisition['previous_employee']) ?: '-' ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Budget Status</label>
                <p><?= esc($requisition['budget_status']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Salary Range</label>
                <p>
                    ₹<?= number_format($requisition['salary_from']) ?>
                    -
                    ₹<?= number_format($requisition['salary_to']) ?>
                </p>
            </div>

        </div>

        <div class="mt-6">
            <label class="text-sm text-slate-500">Justification Notes</label>
            <div class="mt-2 p-4 bg-slate-50 rounded-lg border">
                <?= nl2br(esc($requisition['justification_notes'])) ?>
            </div>
        </div>

    </div>

    <!-- ============================= -->
    <!-- Skills & Experience -->
    <!-- ============================= -->

    <div>
        <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
            4. Skills & Experience
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="text-sm text-slate-500">Minimum Experience</label>
                <p><?= esc($requisition['experience']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Education</label>
                <p><?= esc($requisition['education']) ?></p>
            </div>

        </div>

        <div class="mt-6">
            <label class="text-sm text-slate-500">Mandatory Skills</label>

            <div class="mt-2 p-4 bg-slate-50 border rounded-lg">
                <?= nl2br(esc($requisition['mandatory_skills'])) ?>
            </div>
        </div>

        <div class="mt-6">
            <label class="text-sm text-slate-500">Preferred Skills</label>

            <div class="mt-2 p-4 bg-slate-50 border rounded-lg">
                <?= nl2br(esc($requisition['preferred_skills'])) ?>
            </div>
        </div>

        <div class="mt-6">
            <label class="text-sm text-slate-500">Job Description</label>

            <div class="mt-2 p-4 bg-slate-50 border rounded-lg whitespace-pre-line">
                <?= esc($requisition['description']) ?>
            </div>
        </div>

    </div>

    <!-- ============================= -->
    <!-- Approval Information -->
    <!-- ============================= -->

    <div>
        <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
            Approval Information
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div>
                <label class="text-sm text-slate-500">Status</label>
                <p class="font-semibold"><?= esc($requisition['status']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">HOD Status</label>
                <p><?= esc($requisition['hod_status']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">HR Status</label>
                <p><?= esc($requisition['hr_status']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Submitted At</label>
                <p><?= esc($requisition['submitted_at']) ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Published At</label>
                <p><?= esc($requisition['published_at']) ?: '-' ?></p>
            </div>

            <div>
                <label class="text-sm text-slate-500">Rejection Reason</label>
                <p><?= esc($requisition['rejection_reason']) ?: '-' ?></p>
            </div>

        </div>

    </div>

</div>