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
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50">

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
    </div>

    <div class="flex h-screen overflow-hidden">

        <?= $this->include('sidebar') ?>

        <div class="flex-1 flex flex-col overflow-hidden">

            <?= $this->include('navbar') ?>

            <div class="flex-1 overflow-y-auto p-6">
                <div class="max-w-6xl mx-auto">

                    <a href="<?= base_url('/Recruitment/requisitions') ?>"
                        class="inline-flex items-center gap-2 text-sm font-medium mb-5 hover:text-orange-500">
                        <i data-lucide="arrow-left-circle" class="w-4 h-4"></i>
                        Back
                    </a>

                    <div class="bg-white rounded-xl shadow border">

                        <div class="border-b p-6">
                            <h1 class="text-2xl font-bold text-slate-800 text-left">
                                Create Job Requisition
                            </h1>
                            <p class="text-slate-500 mt-1 text-left">
                                Fill all the required details and submit the requisition for approval.
                            </p>
                        </div>

                        <form action="<?= base_url('Recruitment/requisitions/save-draft') ?>" method="POST">

                            <?= csrf_field(); ?>

                            <?php if (session()->getFlashdata('errors')): ?>
                                <div
                                    class="mx-6 mt-6 bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 text-left">
                                    <ul class="list-disc ml-5">
                                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('success')): ?>
                                <div
                                    class="mx-6 mt-6 bg-green-100 border border-green-300 text-green-700 rounded-lg p-4 text-left">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php $selectedDepartment = old('department', $departments[0]['department_name'] ?? ''); ?>

                            <div class="p-6 space-y-10">

                                <div>
                                    <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
                                        1. Request Details (Auto-Populated)
                                    </h2>

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

                                <div>
                                    <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
                                        2. Position Requirements (The Core Data)
                                    </h2>

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

                                <div>
                                    <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
                                        3. Justification & Budgeting (For HR & Finance Review)
                                    </h2>

                                    <div class="space-y-6">
                                        <div>
                                            <label class="font-medium block mb-3">
                                                Reason for Hire
                                            </label>

                                            <div class="grid gap-3 sm:grid-cols-2">
                                                <label class="inline-flex items-center gap-3">
                                                    <input type="radio" name="reason_for_hire" value="New Headcount"
                                                        <?= old('reason_for_hire') === 'New Headcount' ? 'checked' : '' ?>
                                                        onclick="toggleReplacement(false)">
                                                    New Headcount
                                                </label>

                                                <label class="inline-flex items-center gap-3">
                                                    <input type="radio" name="reason_for_hire" value="Replacement"
                                                        <?= old('reason_for_hire') === 'Replacement' ? 'checked' : '' ?>
                                                        onclick="toggleReplacement(true)">
                                                    Replacement
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
                                                    <span class="absolute left-3 top-3 text-slate-500">₹</span>
                                                    <input type="number" name="salary_from"
                                                        value="<?= old('salary_from') ?>"
                                                        class="pl-8 w-full border rounded-lg px-4 py-3">
                                                </div>
                                            </div>

                                            <div>
                                                <label class="font-medium block mb-2">
                                                    Maximum Salary
                                                </label>
                                                <div class="relative">
                                                    <span class="absolute left-3 top-3 text-slate-500">₹</span>
                                                    <input type="number" name="salary_to"
                                                        value="<?= old('salary_to') ?>"
                                                        class="pl-8 w-full border rounded-lg px-4 py-3">
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

                                <div>
                                    <h2 class="text-lg font-semibold text-slate-800 border-b pb-2 mb-5">
                                        4. Skills & Experience Profile
                                    </h2>

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

                            <div class="border-t p-6 flex justify-end gap-4">
                                <button type="submit"
                                    class="bg-slate-700 hover:bg-slate-800 text-white px-6 py-3 rounded-lg">
                                    Save Draft
                                </button>

                                <button formaction="<?= base_url('Recruitment/requisitions/submit') ?>" type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">
                                    Submit For Approval
                                </button>
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
