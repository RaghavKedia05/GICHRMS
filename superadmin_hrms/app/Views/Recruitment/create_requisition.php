<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job Requisition</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .requisition-form input:not([type="radio"]),
        .requisition-form select,
        .requisition-form textarea {
            width: 100%;
            border: 1px solid rgb(203 213 225);
            border-radius: 0.75rem;
            background: white;
            color: rgb(15 23 42);
            outline: none;
            transition: border-color 150ms ease, box-shadow 150ms ease, background-color 150ms ease;
        }

        .requisition-form input:not([type="radio"]):focus,
        .requisition-form select:focus,
        .requisition-form textarea:focus {
            border-color: rgb(79 70 229);
            box-shadow: 0 0 0 4px rgb(79 70 229 / 0.12);
        }

        .requisition-form input[readonly],
        .requisition-form select:disabled {
            background: rgb(248 250 252);
            color: rgb(71 85 105);
        }
    </style>

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-100 text-slate-900">

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
    </div>

    <div class="flex h-screen overflow-hidden">

        <?= $this->include('sidebar') ?>

        <div class="flex-1 flex flex-col overflow-hidden">

            <?= $this->include('navbar') ?>

            <div class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">

                    <a href="<?= base_url('/Recruitment/requisitions') ?>"
                        class="inline-flex items-center gap-2 text-sm font-semibold mb-4 text-slate-600 hover:text-indigo-600">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Requisitions
                    </a>

                    <div class="mb-5 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <div class="flex flex-wrap items-center gap-3">
                                <h1 class="text-2xl sm:text-3xl font-semibold text-slate-950">
                                    Create Job Requisition
                                </h1>
                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full border border-amber-200 bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                                    <i data-lucide="clock-3" class="w-3.5 h-3.5"></i>
                                    Draft
                                </span>
                            </div>
                            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                                Capture the hiring request, budget details, and candidate profile in one structured flow.
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-3 sm:flex">
                            <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 shadow-sm">
                                <p class="text-xs font-medium text-slate-500">Requisition ID</p>
                                <p class="mt-1 text-sm font-semibold text-slate-900">
                                    <?= esc(old('requisition_no', $requisition_id)) ?>
                                </p>
                            </div>
                            <div class="rounded-lg border border-slate-200 bg-white px-4 py-3 shadow-sm">
                                <p class="text-xs font-medium text-slate-500">Requested By</p>
                                <p class="mt-1 max-w-36 truncate text-sm font-semibold text-slate-900">
                                    <?= esc(session()->get('name')) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5">

                        <div class="sticky top-0 z-20 rounded-lg border border-slate-200 bg-white/95 px-4 py-3 shadow-sm backdrop-blur sm:px-6">
                            <nav class="flex gap-2 overflow-x-auto text-sm font-semibold">
                                <a href="#request-details"
                                    class="inline-flex shrink-0 items-center gap-2 rounded-md px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-indigo-600">
                                    <i data-lucide="file-text" class="w-4 h-4"></i>
                                    Request
                                </a>
                                <a href="#position"
                                    class="inline-flex shrink-0 items-center gap-2 rounded-md px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-indigo-600">
                                    <i data-lucide="briefcase-business" class="w-4 h-4"></i>
                                    Position
                                </a>
                                <a href="#budget"
                                    class="inline-flex shrink-0 items-center gap-2 rounded-md px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-indigo-600">
                                    <i data-lucide="wallet" class="w-4 h-4"></i>
                                    Budget
                                </a>
                                <a href="#skills"
                                    class="inline-flex shrink-0 items-center gap-2 rounded-md px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-indigo-600">
                                    <i data-lucide="sparkles" class="w-4 h-4"></i>
                                    Skills
                                </a>
                            </nav>
                        </div>

                        <form action="<?= base_url('Recruitment/requisitions/save-draft') ?>" method="POST"
                            class="requisition-form">

                            <?= csrf_field(); ?>

                            <?php if (session()->getFlashdata('errors')): ?>
                                <div class="mx-4 mt-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700 sm:mx-6">
                                    <div class="flex gap-3">
                                        <i data-lucide="circle-alert" class="mt-0.5 h-5 w-5 shrink-0"></i>
                                        <ul class="list-disc space-y-1 pl-4">
                                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="mx-4 mt-4 rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700 sm:mx-6">
                                    <div class="flex items-center gap-3">
                                        <i data-lucide="circle-check" class="h-5 w-5 shrink-0"></i>
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php $selectedDepartment = old('department', $departments[0]['department_name'] ?? ''); ?>

                            <div class="p-4 space-y-6 sm:p-6 lg:p-8">

                                <div id="request-details" class="scroll-mt-24 rounded-lg border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
                                    <div class="mb-5 flex items-center gap-3 border-b border-slate-200 pb-4">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                                            <i data-lucide="file-text" class="h-5 w-5"></i>
                                        </span>
                                        <div>
                                            <h2 class="text-base font-semibold text-slate-950">
                                                Request Details
                                            </h2>
                                            <p class="text-sm text-slate-500">
                                                Ownership, department, and request date.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Requisition ID
                                            </label>

                                            <input type="text" name="requisition_no" value="<?= esc(old('requisition_no', $requisition_id)) ?>"
                                                readonly class="w-full bg-slate-100 border rounded-lg px-4 py-3">
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Requested By
                                            </label>

                                            <select disabled class="w-full bg-slate-100 border rounded-lg px-4 py-3">
                                                <option><?= esc(session()->get('name')) ?></option>
                                            </select>
                                            <input type="hidden" name="requested_by"
                                                value="<?= esc(session()->get('name')) ?>">
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Department / Cost Center
                                            </label>

                                            <select disabled class="w-full bg-slate-100 border rounded-lg px-4 py-3">
                                                <?php foreach ($departments as $department): ?>
                                                    <option value="<?= esc($department['department_name']) ?>"
                                                        <?= esc($department['department_name'] === $selectedDepartment ? 'selected' : '') ?>>
                                                        <?= esc($department['department_name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" name="department"
                                                value="<?= esc($selectedDepartment) ?>">
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Request Date
                                            </label>

                                            <input type="date" name="request_date" value="<?= old('request_date', date('Y-m-d')) ?>"
                                                class="w-full border rounded-lg px-4 py-3">
                                        </div>

                                    </div>
                                </div>

                                <div id="position" class="scroll-mt-24 rounded-lg border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
                                    <div class="mb-5 flex items-center gap-3 border-b border-slate-200 pb-4">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                                            <i data-lucide="briefcase-business" class="h-5 w-5"></i>
                                        </span>
                                        <div>
                                            <h2 class="text-base font-semibold text-slate-950">
                                                Position Requirements
                                            </h2>
                                            <p class="text-sm text-slate-500">
                                                Role, openings, location, and working model.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Job Title
                                            </label>

                                            <input type="text" name="job_title" value="<?= old('job_title') ?>"
                                                class="w-full border rounded-lg px-4 py-3" required>
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Number of Openings
                                            </label>

                                            <input type="number" name="vacancies" min="1"
                                                value="<?= old('vacancies') ?>"
                                                class="w-full border rounded-lg px-4 py-3">
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Target Hire Date
                                            </label>

                                            <input type="date" name="target_hire_date"
                                                value="<?= old('target_hire_date') ?>"
                                                class="w-full border rounded-lg px-4 py-3">
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Employment Type
                                            </label>

                                            <select name="employment_type" class="w-full border rounded-lg px-4 py-3">
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Contract">Contract</option>
                                                <option value="Internship">Internship</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Work Mode
                                            </label>

                                            <select name="work_mode" class="w-full border rounded-lg px-4 py-3">
                                                <option <?= old('work_mode') === 'On-site' ? 'selected' : '' ?>>On-site
                                                </option>
                                                <option <?= old('work_mode') === 'Remote' ? 'selected' : '' ?>>Remote
                                                </option>
                                                <option <?= old('work_mode') === 'Hybrid' ? 'selected' : '' ?>>Hybrid
                                                </option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Job Location / Branch
                                            </label>

                                            <select name="location" class="w-full border rounded-lg px-4 py-3">
                                                <?php if (!empty($locations)): ?>
                                                    <?php foreach ($locations as $location): ?>
                                                        <option value="<?= esc($location) ?>" <?= old('location') === $location ? 'selected' : '' ?>>
                                                            <?= esc($location) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option <?= old('location') === 'Head Office' ? 'selected' : '' ?>>Head
                                                        Office</option>
                                                    <option <?= old('location') === 'Regional Office' ? 'selected' : '' ?>>
                                                        Regional Office</option>
                                                    <option <?= old('location') === 'Remote' ? 'selected' : '' ?>>Remote
                                                    </option>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div id="budget" class="scroll-mt-24 rounded-lg border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
                                    <div class="mb-5 flex items-center gap-3 border-b border-slate-200 pb-4">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                                            <i data-lucide="wallet" class="h-5 w-5"></i>
                                        </span>
                                        <div>
                                            <h2 class="text-base font-semibold text-slate-950">
                                                Justification & Budget
                                            </h2>
                                            <p class="text-sm text-slate-500">
                                                Hiring reason, budget status, and salary range.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <div>
                                            <label class="font-medium block mb-3">
                                                Reason for Hire
                                            </label>

                                            <div class="grid gap-3 sm:grid-cols-2">
                                                <label
                                                    class="flex cursor-pointer items-center gap-3 rounded-lg border border-slate-200 bg-white p-4 transition hover:border-indigo-300 hover:bg-indigo-50/70">
                                                    <input type="radio" name="reason_for_hire" value="New Headcount"
                                                        <?= old('reason_for_hire') === 'New Headcount' ? 'checked' : '' ?>
                                                        onclick="toggleReplacement(false)"
                                                        class="h-4 w-4 border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                                    <span class="font-medium text-slate-800">New Headcount</span>
                                                </label>

                                                <label
                                                    class="flex cursor-pointer items-center gap-3 rounded-lg border border-slate-200 bg-white p-4 transition hover:border-indigo-300 hover:bg-indigo-50/70">
                                                    <input type="radio" name="reason_for_hire" value="Replacement"
                                                        <?= old('reason_for_hire') === 'Replacement' ? 'checked' : '' ?>
                                                        onclick="toggleReplacement(true)"
                                                        class="h-4 w-4 border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                                    <span class="font-medium text-slate-800">Replacement</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div id="replacementGroup" class="space-y-2"
                                            style="display: <?= old('reason_for_hire') === 'Replacement' ? 'block' : 'none' ?>;">
                                            <label class="font-medium block mb-2">
                                                Previous Employee Name
                                            </label>
                                            <input type="text" name="previous_employee"
                                                value="<?= old('previous_employee') ?>"
                                                class="w-full border rounded-lg px-4 py-3">
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Budget Status
                                            </label>

                                            <select name="budget_status" class="w-full border rounded-lg px-4 py-3">
                                                <option <?= old('budget_status') === 'Budgeted' ? 'selected' : '' ?>>
                                                    Budgeted</option>
                                                <option <?= old('budget_status') === 'Unbudgeted' ? 'selected' : '' ?>>
                                                    Unbudgeted</option>
                                            </select>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="font-medium block mb-2">
                                                    Minimum Salary
                                                </label>
                                                <div class="relative">
                                                    <span class="absolute left-3 top-3 text-sm font-semibold text-slate-500">₹</span>
                                                    <input type="number" name="salary_from"
                                                        value="<?= old('salary_from') ?>"
                                                        class="pl-9 w-full border rounded-lg px-4 py-3">
                                                </div>
                                            </div>

                                            <div>
                                                <label class="font-medium block mb-2">
                                                    Maximum Salary
                                                </label>
                                                <div class="relative">
                                                    <span class="absolute left-3 top-3 text-sm font-semibold text-slate-500">₹</span>
                                                    <input type="number" name="salary_to"
                                                        value="<?= old('salary_to') ?>"
                                                        class="pl-9 w-full border rounded-lg px-4 py-3">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Justification Notes
                                            </label>
                                            <textarea name="justification_notes" rows="4"
                                                class="w-full border rounded-lg px-4 py-3"><?= esc(old('justification_notes')) ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id="skills" class="scroll-mt-24 rounded-lg border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
                                    <div class="mb-5 flex items-center gap-3 border-b border-slate-200 pb-4">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-violet-50 text-violet-600">
                                            <i data-lucide="sparkles" class="h-5 w-5"></i>
                                        </span>
                                        <div>
                                            <h2 class="text-base font-semibold text-slate-950">
                                                Skills & Experience
                                            </h2>
                                            <p class="text-sm text-slate-500">
                                                Experience, education, skills, and job description.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="font-medium block mb-2">
                                                Minimum Experience Required
                                            </label>

                                            <select name="experience" class="w-full border rounded-lg px-4 py-3">
                                                <option <?= old('experience') === '0-2 Years' ? 'selected' : '' ?>>0-2
                                                    Years</option>
                                                <option <?= old('experience') === '3-5 Years' ? 'selected' : '' ?>>3-5
                                                    Years</option>
                                                <option <?= old('experience') === '5-8 Years' ? 'selected' : '' ?>>5-8
                                                    Years</option>
                                                <option <?= old('experience') === '8+ Years' ? 'selected' : '' ?>>8+ Years
                                                </option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="font-medium block mb-2">
                                                Minimum Education Level
                                            </label>

                                            <select name="education" class="w-full border rounded-lg px-4 py-3">
                                                <option <?= old('education') === "Bachelor's Degree" ? 'selected' : '' ?>>
                                                    Bachelor's Degree</option>
                                                <option <?= old('education') === "Master's Degree" ? 'selected' : '' ?>>
                                                    Master's Degree</option>
                                                <option <?= old('education') === 'Diploma' ? 'selected' : '' ?>>Diploma
                                                </option>
                                                <option <?= old('education') === 'Certification' ? 'selected' : '' ?>>
                                                    Certification</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <label class="font-medium block mb-2">
                                            Mandatory Skills (Must Have)
                                        </label>
                                        <input type="text" name="mandatory_skills"
                                            value="<?= old('mandatory_skills') ?>"
                                            placeholder="E.g. JavaScript, Node.js, AWS"
                                            class="w-full border rounded-lg px-4 py-3">
                                        <p class="text-sm text-slate-500 mt-2">Enter comma-separated skills for easy
                                            filtering.</p>
                                    </div>

                                    <div class="mt-6">
                                        <label class="font-medium block mb-2">
                                            Preferred Skills (Nice to Have)
                                        </label>
                                        <input type="text" name="preferred_skills"
                                            value="<?= old('preferred_skills') ?>"
                                            placeholder="E.g. Docker, Azure, UI/UX"
                                            class="w-full border rounded-lg px-4 py-3">
                                        <p class="text-sm text-slate-500 mt-2">Optional skills that improve candidate
                                            fit.</p>
                                    </div>

                                    <div class="mt-6">
                                        <label class="font-medium block mb-2">
                                            Job Description (JD)
                                        </label>
                                        <textarea name="description" rows="8"
                                            class="w-full border rounded-lg px-4 py-3"><?= esc(old('description')) ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sticky bottom-4 z-20 rounded-lg border border-slate-200 bg-white/95 p-4 shadow-[0_-8px_30px_rgba(15,23,42,0.10)] backdrop-blur sm:p-5">
                                <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                                    <i data-lucide="save" class="h-4 w-4"></i>
                                    Save Draft
                                </button>

                                <button formaction="<?= base_url('Recruitment/requisitions/submit') ?>" type="submit"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
                                    <i data-lucide="send" class="h-4 w-4"></i>
                                    Submit For Approval
                                </button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <script>
                        function toggleReplacement(show) {
                            var replacementGroup = document.getElementById('replacementGroup');
                            replacementGroup.style.display = show ? 'block' : 'none';
                        }

                        document.addEventListener('DOMContentLoaded', function () {
                            var radios = document.querySelectorAll('input[name="reason_for_hire"]');
                            radios.forEach(function (radio) {
                                radio.addEventListener('change', function () {
                                    toggleReplacement(this.value === 'Replacement');
                                });
                            });
                        });
                    </script>

                </div>

            </div>

        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>
