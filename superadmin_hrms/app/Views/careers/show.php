<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($job['job_title']) ?> | GICHRMS Careers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">
            <a href="<?= base_url('careers') ?>" class="flex items-center gap-3 font-bold">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white">
                    <i data-lucide="building-2" class="h-5 w-5"></i>
                </span>
                GICHRMS Careers
            </a>
            <a href="<?= base_url('careers') ?>" class="text-sm font-semibold text-slate-600 hover:text-indigo-700">← All jobs</a>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-5 py-10 lg:px-8">
        <div class="grid items-start gap-8 lg:grid-cols-[minmax(0,1fr)_25rem]">
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="border-b border-slate-200 pb-6">
                    <p class="text-sm font-bold uppercase tracking-wider text-indigo-600">Candidate details</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight">Apply for <?= esc($job['job_title']) ?></h1>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">Complete your profile below. Fields marked * are required, and your information is shared only with the recruitment team.</p>
                </div>

                <?php if ($message = session()->getFlashdata('error')): ?>
                    <div class="mt-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700"><?= esc($message) ?></div>
                <?php endif; ?>
                <?php $errors = session()->getFlashdata('errors') ?? []; ?>
                <?php if ($errors): ?>
                    <div class="mt-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                        <ul class="list-disc space-y-1 pl-5"><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul>
                    </div>
                <?php endif; ?>

                <form method="post" enctype="multipart/form-data" action="<?= base_url('careers/jobs/' . $job['id'] . '/apply') ?>" class="mt-7 space-y-7">
                    <?= csrf_field() ?>

                    <fieldset>
                        <legend class="text-base font-bold text-slate-900">Contact information</legend>
                        <div class="mt-4 grid gap-5 sm:grid-cols-2">
                            <?php foreach ([
                                ['candidate_name', 'Full name *', 'text'],
                                ['candidate_email', 'Email address *', 'email'],
                                ['phone', 'Phone number *', 'tel'],
                                ['current_location', 'Current location *', 'text'],
                            ] as [$name, $label, $type]): ?>
                                <label class="block text-sm font-semibold text-slate-700">
                                    <?= esc($label) ?>
                                    <input name="<?= esc($name) ?>" type="<?= esc($type) ?>" value="<?= esc(old($name), 'attr') ?>"
                                        class="mt-2 h-12 w-full rounded-xl border border-slate-300 px-4 font-normal outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <fieldset class="border-t border-slate-200 pt-7">
                        <legend class="text-base font-bold text-slate-900">Professional profile</legend>
                        <div class="mt-4 grid gap-5 sm:grid-cols-2">
                            <?php foreach ([
                                ['current_company', 'Current company', 'text'],
                                ['experience_years', 'Years of experience', 'number'],
                                ['linkedin_url', 'LinkedIn URL', 'url'],
                                ['portfolio_url', 'Portfolio URL', 'url'],
                            ] as [$name, $label, $type]): ?>
                                <label class="block text-sm font-semibold text-slate-700">
                                    <?= esc($label) ?>
                                    <input name="<?= esc($name) ?>" type="<?= esc($type) ?>" value="<?= esc(old($name), 'attr') ?>"
                                        <?= $name === 'experience_years' ? 'min="0" max="60" step="0.1"' : '' ?>
                                        class="mt-2 h-12 w-full rounded-xl border border-slate-300 px-4 font-normal outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>

                    <fieldset class="border-t border-slate-200 pt-7">
                        <legend class="text-base font-bold text-slate-900">Application documents</legend>
                        <div class="mt-4 grid gap-5 sm:grid-cols-2">
                            <label class="block text-sm font-semibold text-slate-700 sm:col-span-2">
                                Cover letter
                                <textarea name="cover_letter" rows="5" maxlength="5000" class="mt-2 w-full rounded-xl border border-slate-300 p-4 font-normal outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"><?= esc(old('cover_letter')) ?></textarea>
                            </label>
                            <label class="block text-sm font-semibold text-slate-700 sm:col-span-2">
                                Resume *
                                <span class="mt-2 flex min-h-24 items-center rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4">
                                    <input name="resume" type="file" required accept=".pdf,.doc,.docx" class="block w-full text-sm font-normal text-slate-600">
                                </span>
                                <span class="mt-2 block text-xs font-normal text-slate-500">PDF, DOC, or DOCX · maximum 5 MB</span>
                            </label>
                        </div>
                    </fieldset>

                    <div class="border-t border-slate-200 pt-6">
                        <label class="flex gap-3 text-sm leading-6 text-slate-600">
                            <input type="checkbox" required class="mt-1 h-4 w-4 rounded border-slate-300 text-indigo-600">
                            <span>I confirm the information provided is accurate and consent to its use for recruitment.</span>
                        </label>
                        <button class="mt-5 flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 font-bold text-white shadow-lg shadow-indigo-100 transition hover:bg-indigo-700 sm:w-auto">
                            Submit application <i data-lucide="send" class="h-4 w-4"></i>
                        </button>
                    </div>
                </form>
            </section>

            <aside class="lg:sticky lg:top-6">
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-indigo-600"><?= esc($job['company_name']) ?></p>
                    <h2 class="mt-2 text-2xl font-bold tracking-tight"><?= esc($job['job_title']) ?></h2>

                    <div class="mt-5 grid gap-2 text-sm text-slate-600">
                        <?php foreach ([
                            ['building', $job['department']],
                            ['map-pin', $job['location'] ?: 'Location flexible'],
                            ['briefcase', $job['employment_type']],
                            ['laptop', $job['work_mode'] ?: 'On-site'],
                        ] as [$icon, $text]): ?>
                            <span class="flex items-center gap-2 rounded-lg bg-slate-50 px-3 py-2.5">
                                <i data-lucide="<?= esc($icon) ?>" class="h-4 w-4 text-indigo-600"></i><?= esc($text) ?>
                            </span>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-7 space-y-6 border-t border-slate-200 pt-6">
                        <section>
                            <h3 class="font-bold">About the role</h3>
                            <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600"><?= esc($job['description'] ?: 'Details for this opportunity will be discussed during the recruitment process.') ?></p>
                        </section>
                        <?php foreach ([
                            ['Experience', $job['experience']],
                            ['Education', $job['education']],
                            ['Required skills', $job['mandatory_skills']],
                            ['Preferred skills', $job['preferred_skills']],
                        ] as [$heading, $content]): ?>
                            <?php if (trim((string) $content) !== ''): ?>
                                <section>
                                    <h3 class="font-bold"><?= esc($heading) ?></h3>
                                    <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600"><?= esc($content) ?></p>
                                </section>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>
        </div>
    </main>
    <script>lucide.createIcons()</script>
</body>
</html>
