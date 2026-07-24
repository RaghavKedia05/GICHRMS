<?php
$jobCount = count($jobs ?? []);
$companyName = $jobCount > 0 ? ($jobs[0]['company_name'] ?? 'GICHRMS') : 'GICHRMS';
$appliedIds = array_map('intval', $appliedIds ?? []);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careers at <?= esc($companyName) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body{font-family:Inter,system-ui,sans-serif}.job-row:hover{border-color:#2563eb;box-shadow:0 5px 20px rgba(37,99,235,.07)}</style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
<main class="mx-auto max-w-[1180px] px-5 py-9 sm:px-6 sm:py-12">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <p class="text-xs font-extrabold uppercase tracking-[.18em] text-blue-600">Join our team</p>
            <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-950">Careers at <?= esc($companyName) ?></h1>
            <p class="mt-2 text-sm text-slate-500">Explore opportunities and grow your career with us.</p>
        </div>
        <a href="<?= base_url('login') ?>" class="inline-flex items-center gap-2 self-start rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 hover:border-blue-200 hover:text-blue-700">
            <i data-lucide="user-round" class="h-4 w-4"></i> Employee sign in
        </a>
    </div>

    <?php if ($message = session()->getFlashdata('error')): ?>
        <div class="mt-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-700"><?= esc($message) ?></div>
    <?php endif; ?>
    <?php if ($message = session()->getFlashdata('info')): ?>
        <div class="mt-6 rounded-xl border border-blue-200 bg-blue-50 p-4 text-sm font-medium text-blue-700"><?= esc($message) ?></div>
    <?php endif; ?>

    <form method="get" action="<?= base_url('careers') ?>" class="mt-6 flex flex-wrap gap-2.5 rounded-2xl border border-slate-200 bg-white p-3 shadow-sm">
        <label class="relative min-w-[240px] flex-[1_1_280px]">
            <i data-lucide="search" class="pointer-events-none absolute left-3 top-3 h-4 w-4 text-slate-400"></i>
            <span class="sr-only">Search roles</span>
            <input name="search" value="<?= esc($filters['search'], 'attr') ?>" placeholder="Search by job title, skill or keyword..." class="h-10 w-full rounded-lg border border-slate-200 pl-9 pr-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </label>
        <?php foreach ([['department','Department',$departments],['location','Location',$locations],['type','Job type',$types]] as [$name,$label,$options]): ?>
            <label><span class="sr-only"><?= esc($label) ?></span><select name="<?= esc($name) ?>" class="h-10 min-w-36 rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700 outline-none focus:border-blue-500"><option value=""><?= esc($label) ?></option><?php foreach ($options as $option): ?><option value="<?= esc($option, 'attr') ?>" <?= $filters[$name] === $option ? 'selected' : '' ?>><?= esc($option) ?></option><?php endforeach; ?></select></label>
        <?php endforeach; ?>
        <button class="h-10 rounded-lg bg-blue-600 px-4 text-sm font-bold text-white hover:bg-blue-700">Search</button>
        <a href="<?= base_url('careers') ?>" class="inline-flex h-10 items-center rounded-lg border border-slate-200 px-4 text-sm font-bold text-slate-600 hover:bg-slate-50">Reset</a>
    </form>

    <div class="mt-6 grid items-start gap-6 lg:grid-cols-[minmax(0,1.6fr)_minmax(280px,1fr)]">
        <section>
            <h2 class="mb-3 text-sm font-extrabold text-slate-700">Open Positions (<?= $jobCount ?>)</h2>
            <div class="space-y-2.5">
                <?php foreach ($jobs as $index => $job): ?>
                    <?php
                    $hasApplied = in_array((int) $job['id'], $appliedIds, true);
                    $posted = !empty($job['published_at']) ? strtotime($job['published_at']) : null;
                    $days = $posted ? max(0, (int) floor((time() - $posted) / 86400)) : null;
                    $postedLabel = $days === null ? 'Recently posted' : ($days === 0 ? 'Posted today' : 'Posted ' . $days . ' day' . ($days === 1 ? '' : 's') . ' ago');
                    ?>
                    <<?= $hasApplied ? 'div' : 'a href="' . base_url('careers/jobs/' . $job['id']) . '"' ?> class="job-row flex items-center gap-3 rounded-xl border <?= $index === 0 ? 'border-blue-600 bg-blue-50' : 'border-slate-200 bg-white' ?> p-4 transition">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600"><i data-lucide="briefcase-business" class="h-[18px] w-[18px]"></i></span>
                        <span class="min-w-0 flex-1">
                            <span class="block truncate text-[15px] font-bold text-slate-950"><?= esc($job['job_title']) ?></span>
                            <span class="mt-1 block truncate text-xs text-slate-500"><?= esc(implode(' · ', array_filter([$job['department'], $job['location'], $job['employment_type']]))) ?></span>
                        </span>
                        <?php if ($hasApplied): ?><span class="shrink-0 rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-extrabold text-emerald-700">Applied</span><?php else: ?><span class="hidden shrink-0 items-center gap-2 sm:flex"><span class="text-[11px] text-slate-400"><?= esc($postedLabel) ?></span><i data-lucide="chevron-right" class="h-4 w-4 text-slate-300"></i></span><?php endif; ?>
                    </<?= $hasApplied ? 'div' : 'a' ?>>
                <?php endforeach; ?>
            </div>

            <?php if (!$jobs): ?>
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center"><span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400"><i data-lucide="search-x" class="h-6 w-6"></i></span><h3 class="mt-4 font-extrabold">No matching openings</h3><p class="mt-2 text-sm text-slate-500">Try removing one or more filters, or check back soon.</p></div>
            <?php else: $featured = $jobs[0]; $featuredApplied = in_array((int) $featured['id'], $appliedIds, true); ?>
                <article class="mt-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-7">
                    <div class="flex items-start justify-between gap-4"><div><h2 class="text-xl font-extrabold text-slate-950"><?= esc($featured['job_title']) ?></h2><p class="mt-1 text-sm font-semibold text-slate-500"><?= esc(implode(' · ', array_filter([$featured['department'], $featured['location'], $featured['employment_type']]))) ?></p></div><button type="button" onclick="navigator.clipboard?.writeText('<?= base_url('careers/jobs/' . $featured['id']) ?>')" class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500" title="Copy job link"><i data-lucide="share-2" class="h-4 w-4"></i></button></div>
                    <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2 border-b border-slate-100 pb-5 text-xs font-semibold text-slate-600"><span class="inline-flex items-center gap-1.5"><i data-lucide="briefcase" class="h-3.5 w-3.5 text-slate-400"></i><?= esc($featured['experience'] ?: 'Experience discussed during screening') ?></span><span class="inline-flex items-center gap-1.5"><i data-lucide="laptop" class="h-3.5 w-3.5 text-slate-400"></i><?= esc($featured['work_mode'] ?: 'On-site') ?></span><span class="inline-flex items-center gap-1.5"><i data-lucide="users" class="h-3.5 w-3.5 text-slate-400"></i><?= (int) ($featured['vacancies'] ?? 1) ?> opening<?= (int) ($featured['vacancies'] ?? 1) === 1 ? '' : 's' ?></span></div>
                    <h3 class="mt-5 text-sm font-extrabold">Job Overview</h3><p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600"><?= esc($featured['description'] ?: 'Join our team and contribute to meaningful work in this role.') ?></p>
                    <?php if (!empty($featured['mandatory_skills'])): ?><h3 class="mt-5 text-sm font-extrabold">Key Skills</h3><div class="mt-3 flex flex-wrap gap-2"><?php foreach (preg_split('/[,\n]+/', $featured['mandatory_skills']) as $skill): ?><?php if (trim($skill) !== ''): ?><span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700"><?= esc(trim($skill)) ?></span><?php endif; ?><?php endforeach; ?></div><?php endif; ?>
                    <?php if ($featuredApplied): ?><span class="mt-6 inline-flex w-full cursor-not-allowed items-center justify-center gap-2 rounded-xl bg-emerald-100 px-5 py-3 text-sm font-extrabold text-emerald-700"><i data-lucide="circle-check-big" class="h-4 w-4"></i> Applied</span><?php else: ?><a href="<?= base_url('careers/jobs/' . $featured['id']) ?>" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 px-5 py-3 text-sm font-extrabold text-white hover:from-blue-700 hover:to-blue-800">View details and apply <i data-lucide="arrow-right" class="h-4 w-4"></i></a><?php endif; ?>
                </article>
            <?php endif; ?>
        </section>

        <aside class="space-y-4 lg:sticky lg:top-6">
            <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="text-[15px] font-extrabold">Why join <?= esc($companyName) ?>?</h3><div class="mt-4 space-y-4"><?php foreach ([['trending-up','Growth Opportunities','Learn, grow, and advance your career.'],['lightbulb','Innovative Culture','Work on meaningful projects with passionate people.'],['heart','Employee Well-being','A culture that values balance and well-being.'],['gift','Great Benefits','Competitive rewards and employee benefits.']] as [$icon,$title,$text]): ?><div class="flex gap-3"><span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600"><i data-lucide="<?= $icon ?>" class="h-4 w-4"></i></span><div><h4 class="text-[13px] font-bold"><?= esc($title) ?></h4><p class="mt-0.5 text-xs leading-5 text-slate-500"><?= esc($text) ?></p></div></div><?php endforeach; ?></div></section>
            <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="text-[15px] font-extrabold">Application Tips</h3><div class="mt-4 space-y-3"><?php foreach (['Keep your contact details and resume up to date.','Tailor your resume to the role and required skills.','Use your cover letter to explain why you are a great fit.','Review every detail before submitting.'] as $tip): ?><div class="flex gap-2 text-xs leading-5 text-slate-600"><i data-lucide="check" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-emerald-600"></i><span><?= esc($tip) ?></span></div><?php endforeach; ?></div></section>
            <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5"><h3 class="text-[15px] font-extrabold">Need help?</h3><p class="mt-2 text-xs leading-5 text-slate-600">If you face any issue while applying, our recruitment team will be happy to assist.</p><a href="mailto:hr@gic.com" class="mt-4 inline-flex items-center gap-2 rounded-lg border border-blue-200 bg-white px-4 py-2.5 text-xs font-bold text-blue-700"><i data-lucide="mail" class="h-3.5 w-3.5"></i> Contact HR</a></section>
        </aside>
    </div>
    <footer class="mt-10 text-center text-xs text-slate-400">Powered by <strong class="text-slate-500">GICHRMS</strong></footer>
</main>
<script>lucide.createIcons()</script>
</body>
</html>
