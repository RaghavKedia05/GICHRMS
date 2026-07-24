<?php
$jobCount = count($jobs ?? []);
$totalOpenings = array_sum(array_map(static fn($job) => (int) ($job['vacancies'] ?? 0), $jobs ?? []));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Job Openings | GICHRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>body{font-family:Inter,system-ui,sans-serif}</style>
</head>
<body class="bg-slate-50">
<div id="sidebarOverlay" class="fixed inset-0 z-40 hidden bg-black/40 lg:hidden"></div>
<div class="flex h-screen overflow-hidden">
    <?php include __DIR__ . '/../sidebar.php'; ?>
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
        <?php include __DIR__ . '/../navbar.php'; ?>
        <main class="flex-1 overflow-y-auto p-4 lg:p-6">
            <div class="mx-auto max-w-[1180px]">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between"><div><p class="text-xs font-extrabold uppercase tracking-[.16em] text-blue-600">Recruitment</p><h1 class="mt-2 text-3xl font-black tracking-tight text-slate-950">Job Openings</h1><p class="mt-2 text-sm text-slate-500">Review published opportunities in a quick-scanning card layout.</p></div><div class="inline-flex self-start rounded-lg border border-slate-200 bg-white p-1 shadow-sm"><a href="<?= base_url('Recruitment/jobs') ?>" class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50"><i data-lucide="list" class="h-4 w-4"></i></a><a href="<?= base_url('Recruitment/jobs-grid') ?>" class="flex h-9 w-9 items-center justify-center rounded-md bg-blue-600 text-white"><i data-lucide="grid-2x2" class="h-4 w-4"></i></a></div></div>

                <form method="get" action="<?= base_url('Recruitment/jobs-grid') ?>" class="mt-6 flex flex-wrap gap-2.5 rounded-2xl border border-slate-200 bg-white p-3 shadow-sm">
                    <label class="relative min-w-[240px] flex-[1_1_280px]"><i data-lucide="search" class="pointer-events-none absolute left-3 top-3 h-4 w-4 text-slate-400"></i><input name="search" value="<?= esc($searchQuery ?? '', 'attr') ?>" placeholder="Search by title, department or keyword..." class="h-10 w-full rounded-lg border border-slate-200 pl-9 pr-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"></label>
                    <select name="role" class="h-10 min-w-36 rounded-lg border border-slate-200 bg-white px-3 text-sm"><option value="">Department</option><?php foreach ($roles ?? [] as $role): ?><option value="<?= esc($role, 'attr') ?>" <?= ($filterRole ?? '') === $role ? 'selected' : '' ?>><?= esc($role) ?></option><?php endforeach; ?></select>
                    <select name="status" class="h-10 min-w-36 rounded-lg border border-slate-200 bg-white px-3 text-sm"><option value="">Job type</option><?php foreach ($statuses ?? [] as $status): ?><option value="<?= esc($status, 'attr') ?>" <?= ($filterStatus ?? '') === $status ? 'selected' : '' ?>><?= esc($status) ?></option><?php endforeach; ?></select>
                    <select name="sort_by" class="h-10 min-w-36 rounded-lg border border-slate-200 bg-white px-3 text-sm"><option value="">Newest first</option><option value="oldest" <?= ($filterSort ?? '') === 'oldest' ? 'selected' : '' ?>>Oldest first</option><option value="title" <?= ($filterSort ?? '') === 'title' ? 'selected' : '' ?>>Job title</option><option value="department" <?= ($filterSort ?? '') === 'department' ? 'selected' : '' ?>>Department</option></select>
                    <button class="h-10 rounded-lg bg-blue-600 px-4 text-sm font-bold text-white hover:bg-blue-700">Filter</button><a href="<?= base_url('Recruitment/jobs-grid') ?>" class="inline-flex h-10 items-center rounded-lg border border-slate-200 px-4 text-sm font-bold text-slate-600">Reset</a>
                </form>

                <div class="mt-6 flex items-center justify-between"><h2 class="text-sm font-extrabold text-slate-700">Published Positions (<?= $jobCount ?>)</h2><span class="text-xs font-semibold text-slate-400"><?= $totalOpenings ?> total openings</span></div>
                <section class="mt-3 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <?php foreach ($jobs ?? [] as $job): ?>
                        <?php $salary = (!empty($job['salary_from']) && !empty($job['salary_to'])) ? 'Rs. ' . number_format($job['salary_from']) . ' - Rs. ' . number_format($job['salary_to']) : 'Salary not set'; ?>
                        <article class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-300 hover:shadow-lg">
                            <div class="flex items-start justify-between gap-3"><span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600"><i data-lucide="briefcase-business" class="h-5 w-5"></i></span><span class="rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-bold text-emerald-700">Published</span></div>
                            <h3 class="mt-5 truncate text-lg font-extrabold text-slate-950 group-hover:text-blue-700"><?= esc($job['job_title']) ?></h3><p class="mt-1 text-xs font-semibold text-slate-500"><?= esc($job['requisition_no'] ?? 'N/A') ?></p>
                            <div class="mt-5 space-y-2.5 text-xs font-medium text-slate-600"><p class="flex items-center gap-2"><i data-lucide="building-2" class="h-3.5 w-3.5 text-slate-400"></i><?= esc($job['department'] ?? 'Department') ?></p><p class="flex items-center gap-2"><i data-lucide="map-pin" class="h-3.5 w-3.5 text-slate-400"></i><?= esc($job['location'] ?? 'Location not set') ?></p><p class="flex items-center gap-2"><i data-lucide="wallet-cards" class="h-3.5 w-3.5 text-slate-400"></i><?= esc($salary) ?></p><p class="flex items-center gap-2"><i data-lucide="users" class="h-3.5 w-3.5 text-slate-400"></i><?= (int) ($job['vacancies'] ?? 1) ?> opening<?= (int) ($job['vacancies'] ?? 1) === 1 ? '' : 's' ?></p></div>
                            <button type="button" onclick="openViewModal(<?= (int) $job['id'] ?>)" class="mt-5 inline-flex h-9 w-full items-center justify-center gap-2 rounded-lg border border-slate-200 text-xs font-bold text-slate-600 hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700"><i data-lucide="eye" class="h-3.5 w-3.5"></i> View job details</button>
                        </article>
                    <?php endforeach; ?>
                </section>
                <?php if (!$jobs): ?><div class="mt-4 rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center"><i data-lucide="search-x" class="mx-auto h-7 w-7 text-slate-400"></i><h3 class="mt-3 font-bold">No matching job openings</h3><p class="mt-1 text-sm text-slate-500">Try changing or clearing the filters.</p></div><?php endif; ?>
            </div>
        </main>
    </div>
</div>
<div id="viewModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/50"><div class="max-h-[90vh] w-[95%] max-w-6xl overflow-y-auto rounded-xl bg-white shadow-2xl"><div id="viewModalContent"></div></div></div>
<script>
lucide.createIcons();function toggleSidebar(){document.getElementById('sidebar').classList.toggle('-translate-x-full');document.getElementById('sidebarOverlay').classList.toggle('hidden')}document.getElementById('sidebarOverlay').addEventListener('click',function(){document.getElementById('sidebar').classList.add('-translate-x-full');this.classList.add('hidden')});function openViewModal(id){fetch("<?= base_url('Recruitment/view-job-modal') ?>/"+id).then(r=>r.text()).then(html=>{document.getElementById('viewModalContent').innerHTML=html;document.getElementById('viewModal').classList.remove('hidden');document.getElementById('viewModal').classList.add('flex');lucide.createIcons()})}function closeViewModal(){document.getElementById('viewModal').classList.add('hidden');document.getElementById('viewModal').classList.remove('flex');document.getElementById('viewModalContent').innerHTML=''}
</script>
</body></html>
