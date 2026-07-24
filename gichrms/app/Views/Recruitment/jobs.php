<?php
$jobCount = count($jobs ?? []);
$totalOpenings = array_sum(array_map(static fn($job) => (int) ($job['vacancies'] ?? 0), $jobs ?? []));
$departmentCount = count(array_unique(array_filter(array_column($jobs ?? [], 'department'))));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Job Openings | GICHRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>body{font-family:Inter,system-ui,sans-serif}.job-row:hover{border-color:#2563eb;box-shadow:0 5px 20px rgba(37,99,235,.07)}</style>
</head>
<body class="bg-slate-50">
<div id="sidebarOverlay" class="fixed inset-0 z-40 hidden bg-black/40 lg:hidden"></div>
<div class="flex h-screen overflow-hidden">
    <?php include __DIR__ . '/../sidebar.php'; ?>
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
        <?php include __DIR__ . '/../navbar.php'; ?>
        <main class="flex-1 overflow-y-auto p-4 lg:p-6">
            <div class="mx-auto max-w-[1180px]">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div><p class="text-xs font-extrabold uppercase tracking-[.16em] text-blue-600">Recruitment</p><h1 class="mt-2 text-3xl font-black tracking-tight text-slate-950">Job Openings</h1><p class="mt-2 text-sm text-slate-500">Review every published external opportunity from one focused workspace.</p></div>
                    <div class="inline-flex self-start rounded-lg border border-slate-200 bg-white p-1 shadow-sm"><a href="<?= base_url('Recruitment/jobs') ?>" class="flex h-9 w-9 items-center justify-center rounded-md bg-blue-600 text-white" title="List view"><i data-lucide="list" class="h-4 w-4"></i></a><a href="<?= base_url('Recruitment/jobs-grid') ?>" class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50" title="Grid view"><i data-lucide="grid-2x2" class="h-4 w-4"></i></a></div>
                </div>

                <form method="get" action="<?= base_url('Recruitment/jobs') ?>" class="mt-6 flex flex-wrap gap-2.5 rounded-2xl border border-slate-200 bg-white p-3 shadow-sm">
                    <label class="relative min-w-[240px] flex-[1_1_280px]"><i data-lucide="search" class="pointer-events-none absolute left-3 top-3 h-4 w-4 text-slate-400"></i><input name="search" value="<?= esc($searchQuery ?? '', 'attr') ?>" placeholder="Search by title, department or keyword..." class="h-10 w-full rounded-lg border border-slate-200 pl-9 pr-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"></label>
                    <select name="role" class="h-10 min-w-36 rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700"><option value="">Department</option><?php foreach ($roles ?? [] as $role): ?><option value="<?= esc($role, 'attr') ?>" <?= ($filterRole ?? '') === $role ? 'selected' : '' ?>><?= esc($role) ?></option><?php endforeach; ?></select>
                    <select name="status" class="h-10 min-w-36 rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700"><option value="">Job type</option><?php foreach ($statuses ?? [] as $status): ?><option value="<?= esc($status, 'attr') ?>" <?= ($filterStatus ?? '') === $status ? 'selected' : '' ?>><?= esc($status) ?></option><?php endforeach; ?></select>
                    <select name="sort_by" class="h-10 min-w-36 rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700"><option value="">Newest first</option><option value="oldest" <?= ($filterSort ?? '') === 'oldest' ? 'selected' : '' ?>>Oldest first</option><option value="title" <?= ($filterSort ?? '') === 'title' ? 'selected' : '' ?>>Job title</option><option value="department" <?= ($filterSort ?? '') === 'department' ? 'selected' : '' ?>>Department</option></select>
                    <button class="h-10 rounded-lg bg-blue-600 px-4 text-sm font-bold text-white hover:bg-blue-700">Filter</button><a href="<?= base_url('Recruitment/jobs') ?>" class="inline-flex h-10 items-center rounded-lg border border-slate-200 px-4 text-sm font-bold text-slate-600 hover:bg-slate-50">Reset</a>
                </form>

                <div class="mt-6 grid items-start gap-6 lg:grid-cols-[minmax(0,1.6fr)_minmax(280px,1fr)]">
                    <section>
                        <div class="mb-3 flex items-center justify-between"><h2 class="text-sm font-extrabold text-slate-700">Published Positions (<?= $jobCount ?>)</h2><span class="text-xs font-semibold text-slate-400"><?= $totalOpenings ?> total openings</span></div>
                        <div class="space-y-2.5">
                            <?php foreach ($jobs ?? [] as $job): ?>
                                <?php $posted = !empty($job['published_at']) ? date('d M Y', strtotime($job['published_at'])) : 'Not dated'; ?>
                                <article class="job-row rounded-xl border border-slate-200 bg-white p-4 transition">
                                    <div class="flex items-center gap-3"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600"><i data-lucide="briefcase-business" class="h-[18px] w-[18px]"></i></span><div class="min-w-0 flex-1"><h3 class="truncate text-[15px] font-bold text-slate-950"><?= esc($job['job_title']) ?></h3><p class="mt-1 truncate text-xs text-slate-500"><?= esc(implode(' · ', array_filter([$job['department'] ?? '', $job['location'] ?? '', $job['employment_type'] ?? '']))) ?></p></div><span class="hidden text-[11px] font-medium text-slate-400 sm:block"><?= esc($posted) ?></span></div>
                                    <div class="mt-4 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-3"><span class="rounded-full bg-slate-50 px-2.5 py-1 text-[11px] font-semibold text-slate-600"><?= esc($job['requisition_no'] ?? 'N/A') ?></span><span class="inline-flex items-center gap-1 rounded-full bg-slate-50 px-2.5 py-1 text-[11px] font-semibold text-slate-600"><i data-lucide="users" class="h-3 w-3"></i><?= (int) ($job['vacancies'] ?? 1) ?> opening<?= (int) ($job['vacancies'] ?? 1) === 1 ? '' : 's' ?></span><button type="button" onclick="openViewModal(<?= (int) $job['id'] ?>)" class="ml-auto inline-flex h-8 items-center gap-1.5 rounded-lg border border-slate-200 px-3 text-xs font-bold text-slate-600 hover:bg-slate-50"><i data-lucide="eye" class="h-3.5 w-3.5"></i> View details</button></div>
                                </article>
                            <?php endforeach; ?>
                            <?php if (!$jobs): ?><div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center"><i data-lucide="search-x" class="mx-auto h-7 w-7 text-slate-400"></i><h3 class="mt-3 font-bold">No matching job openings</h3><p class="mt-1 text-sm text-slate-500">Try changing or clearing the filters.</p></div><?php endif; ?>
                        </div>
                    </section>
                    <aside class="space-y-4 lg:sticky lg:top-6">
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="text-[15px] font-extrabold">Opening Summary</h3><div class="mt-4 grid grid-cols-3 gap-2"><div class="rounded-xl bg-blue-50 p-3 text-center"><strong class="block text-xl font-black text-blue-700"><?= $jobCount ?></strong><span class="text-[10px] font-bold text-slate-500">Jobs</span></div><div class="rounded-xl bg-emerald-50 p-3 text-center"><strong class="block text-xl font-black text-emerald-700"><?= $totalOpenings ?></strong><span class="text-[10px] font-bold text-slate-500">Openings</span></div><div class="rounded-xl bg-violet-50 p-3 text-center"><strong class="block text-xl font-black text-violet-700"><?= $departmentCount ?></strong><span class="text-[10px] font-bold text-slate-500">Teams</span></div></div></section>
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="text-[15px] font-extrabold">Publishing Checklist</h3><div class="mt-4 space-y-3"><?php foreach (['Confirm the job description is current.','Check department, location and job type.','Verify openings and experience requirements.','Review the candidate-facing job details.'] as $item): ?><div class="flex gap-2 text-xs leading-5 text-slate-600"><i data-lucide="check" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-emerald-600"></i><span><?= esc($item) ?></span></div><?php endforeach; ?></div></section>
                        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5"><h3 class="text-[15px] font-extrabold">External careers portal</h3><p class="mt-2 text-xs leading-5 text-slate-600">These published external jobs are available on the public careers page.</p><a href="<?= base_url('careers') ?>" target="_blank" class="mt-4 inline-flex items-center gap-2 rounded-lg border border-blue-200 bg-white px-4 py-2.5 text-xs font-bold text-blue-700"><i data-lucide="external-link" class="h-3.5 w-3.5"></i> Open careers page</a></section>
                    </aside>
                </div>
            </div>
        </main>
    </div>
</div>
<div id="viewModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/50"><div class="max-h-[90vh] w-[95%] max-w-6xl overflow-y-auto rounded-xl bg-white shadow-2xl"><div id="viewModalContent"></div></div></div>
<script>
lucide.createIcons();function toggleSidebar(){document.getElementById('sidebar').classList.toggle('-translate-x-full');document.getElementById('sidebarOverlay').classList.toggle('hidden')}document.getElementById('sidebarOverlay').addEventListener('click',function(){document.getElementById('sidebar').classList.add('-translate-x-full');this.classList.add('hidden')});function openViewModal(id){fetch("<?= base_url('Recruitment/view-job-modal') ?>/"+id).then(r=>r.text()).then(html=>{document.getElementById('viewModalContent').innerHTML=html;document.getElementById('viewModal').classList.remove('hidden');document.getElementById('viewModal').classList.add('flex');lucide.createIcons()})}function closeViewModal(){document.getElementById('viewModal').classList.add('hidden');document.getElementById('viewModal').classList.remove('flex');document.getElementById('viewModalContent').innerHTML=''}
</script>
</body></html>
