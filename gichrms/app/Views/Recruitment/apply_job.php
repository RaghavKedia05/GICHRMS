<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body class="bg-slate-50">
    <?php $toastError = session()->getFlashdata('error'); ?>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <div class="flex h-screen overflow-hidden">

        <?= $this->include('sidebar') ?>

        <div class="flex-1 flex flex-col overflow-hidden">

            <?= $this->include('navbar') ?>

            <div class="flex-1 overflow-y-auto">

                <div class="p-8 max-w-7xl mx-auto">

                    <!-- Back -->
                    <a href="<?= base_url('/Recruitment/employee-jobs') ?>"
                        class="inline-flex items-center gap-2 text-sm font-medium mb-5 hover:text-orange-500">
                        <i data-lucide="arrow-left-circle" class="w-4 h-4"></i>
                        Back
                    </a>

                    <div class="mb-8">

                        <h1 class="text-3xl font-bold text-slate-800">
                            Apply for Job
                        </h1>

                        <p class="text-slate-500 mt-2">
                            Complete the form below to apply for this position.
                        </p>

                    </div>

                    <form id="jobApplicationForm" action="<?= base_url('Recruitment/submit-application') ?>" method="post"
                        enctype="multipart/form-data">

                        <?= csrf_field() ?>

                        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">

                        <input type="hidden" name="requisition_id" value="<?= $job['id'] ?>">
                        <input type="hidden" name="application_source" value="Internal Career Portal">


                        <!-- JOB DETAILS -->

                        <div class="bg-white rounded-xl shadow-sm border">

                            <div class="px-6 py-4 border-b">

                                <h2 class="text-xl font-semibold">
                                    Job Details
                                </h2>

                            </div>

                            <div class="p-6 grid grid-cols-2 gap-6">

                                <div>

                                    <label class="text-sm text-slate-500">
                                        Job Title
                                    </label>

                                    <input type="text" value="<?= esc($job['job_title']) ?>" disabled
                                        class="mt-2 w-full rounded-lg border bg-slate-100 px-4 py-3">

                                </div>

                                <div>

                                    <label class="text-sm text-slate-500">
                                        Department
                                    </label>

                                    <input type="text" value="<?= esc($job['department']) ?>" disabled
                                        class="mt-2 w-full rounded-lg border bg-slate-100 px-4 py-3">

                                </div>

                                <div>

                                    <label class="text-sm text-slate-500">
                                        Location
                                    </label>

                                    <input type="text" value="<?= esc($job['location']) ?>" disabled
                                        class="mt-2 w-full rounded-lg border bg-slate-100 px-4 py-3">

                                </div>

                                <div>

                                    <label class="text-sm text-slate-500">
                                        Employment Type
                                    </label>

                                    <input type="text" value="<?= esc($job['employment_type']) ?>" disabled
                                        class="mt-2 w-full rounded-lg border bg-slate-100 px-4 py-3">

                                </div>

                            </div>

                        </div>


                        <!-- CANDIDATE DETAILS -->

                        <div class="bg-white rounded-xl shadow-sm border mt-8">

                            <div class="px-6 py-4 border-b">

                                <h2 class="text-xl font-semibold">
                                    Candidate Details
                                </h2>

                            </div>

                            <div class="p-6 grid grid-cols-2 gap-6">

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        Full Name *
                                    </label>

                                    <input type="text" name="candidate_name" required
                                        class="w-full rounded-lg border px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        Email *
                                    </label>

                                    <input type="email" name="candidate_email" required
                                        class="w-full rounded-lg border px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        Phone Number *
                                    </label>

                                    <input type="text" name="phone" required class="w-full rounded-lg border px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        Current Company
                                    </label>

                                    <input type="text" name="current_company"
                                        class="w-full rounded-lg border px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        Experience (Years)
                                    </label>

                                    <input type="number" step="0.1" name="experience_years"
                                        class="w-full rounded-lg border px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        Current Location
                                    </label>

                                    <input type="text" name="current_location"
                                        class="w-full rounded-lg border px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        LinkedIn URL
                                    </label>

                                    <input type="url" name="linkedin_url" class="w-full rounded-lg border px-4 py-3">

                                </div>

                                <div>

                                    <label class="block text-sm font-medium mb-2">
                                        Portfolio URL
                                    </label>

                                    <input type="url" name="portfolio_url" class="w-full rounded-lg border px-4 py-3">

                                </div>

                            </div>

                        </div>


                        <!-- COVER LETTER -->

                        <div class="bg-white rounded-xl shadow-sm border mt-8">

                            <div class="px-6 py-4 border-b">

                                <h2 class="text-xl font-semibold">
                                    Cover Letter
                                </h2>

                            </div>

                            <div class="p-6">

                                <label class="block text-sm font-medium mb-3">
                                    Cover Letter
                                </label>

                                <textarea name="cover_letter" rows="5"
                                    class="w-full rounded-lg border px-4 py-3"
                                    placeholder="Share a short note for the hiring team."></textarea>

                            </div>

                        </div>


                        <!-- RESUME -->

                        <div class="bg-white rounded-xl shadow-sm border mt-8">

                            <div class="px-6 py-4 border-b">

                                <h2 class="text-xl font-semibold">
                                    Resume
                                </h2>

                            </div>

                            <div class="p-6">

                                <label class="block text-sm font-medium mb-3">

                                    Upload Resume (PDF, DOC, DOCX)

                                </label>

                                <input id="resumeFile" type="file" name="resume" accept=".pdf,.doc,.docx" required
                                    class="w-full rounded-lg border px-4 py-3">
                                <p class="mt-2 text-sm text-slate-500">Maximum file size: 5 MB.</p>
                                <p id="resumeFileError" class="mt-2 hidden text-sm font-medium text-rose-600" role="alert"></p>

                            </div>

                        </div>


                        <div class="flex justify-end gap-4 mt-8">

                            <a href="<?= base_url('Recruitment/employee-jobs') ?>" class="px-6 py-3 rounded-lg border">

                                Cancel

                            </a>

                            <button type="submit"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-lg">

                                Submit Application

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <?= view('partials/flash_toast', [
        'toastError' => $toastError,
    ]) ?>

    <script>
        lucide.createIcons();

        const applicationForm = document.getElementById('jobApplicationForm');
        const resumeFile = document.getElementById('resumeFile');
        const resumeFileError = document.getElementById('resumeFileError');
        const maxResumeBytes = 5 * 1024 * 1024;
        const allowedResumeExtensions = ['pdf', 'doc', 'docx'];

        function validateResumeFile() {
            const file = resumeFile.files[0];
            resumeFileError.classList.add('hidden');
            resumeFileError.textContent = '';
            resumeFile.classList.remove('border-rose-500', 'ring-2', 'ring-rose-100');

            if (!file) {
                return true;
            }

            const extension = file.name.split('.').pop().toLowerCase();
            let message = '';

            if (!allowedResumeExtensions.includes(extension)) {
                message = 'Please upload a PDF, DOC, or DOCX resume.';
            } else if (file.size > maxResumeBytes) {
                message = 'The resume must be 5 MB or smaller.';
            }

            if (!message) {
                return true;
            }

            resumeFileError.textContent = message;
            resumeFileError.classList.remove('hidden');
            resumeFile.classList.add('border-rose-500', 'ring-2', 'ring-rose-100');
            return false;
        }

        resumeFile.addEventListener('change', validateResumeFile);
        applicationForm.addEventListener('submit', function (event) {
            if (!validateResumeFile()) {
                event.preventDefault();
                resumeFile.focus();
            }
        });
    </script>

</body>

</html>
