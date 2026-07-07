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

                    <?php if (session()->getFlashdata('error')): ?>

                        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 rounded-lg p-4">

                            <?= session()->getFlashdata('error') ?>

                        </div>

                    <?php endif; ?>


                    <form action="<?= base_url('Recruitment/submit-application') ?>" method="post"
                        enctype="multipart/form-data">

                        <?= csrf_field() ?>

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

                                <input type="file" name="resume" accept=".pdf,.doc,.docx" required
                                    class="w-full rounded-lg border px-4 py-3">

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

    <script>
        lucide.createIcons();
    </script>

</body>

</html>
