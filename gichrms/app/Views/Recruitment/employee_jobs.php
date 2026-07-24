<?php
$jobCount = count($jobs ?? []);
$appliedCount = count($appliedIds ?? []);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Career Opportunities | GICHRMS</title>
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
                    <div><p class="text-xs font-extrabold uppercase tracking-[.16em] text-blue-600">Internal opportunities</p><h1 class="mt-2 text-3xl font-black tracking-tight text-slate-950">Grow your career with us</h1><p class="mt-2 text-sm text-slate-500">Explore open roles and take the next step in your journey.</p></div>
                    <div class="inline-flex self-start rounded-lg border border-slate-200 bg-white p-1 shadow-sm"><a href="<?= base_url('Recruitment/employee-jobs') ?>" class="flex h-9 w-9 items-center justify-center rounded-md bg-blue-600 text-white" title="List view"><i data-lucide="list" class="h-4 w-4"></i></a><a href="<?= base_url('Recruitment/employee-jobs-grid') ?>" class="flex h-9 w-9 items-center justify-center rounded-md text-slate-500 hover:bg-slate-50" title="Grid view"><i data-lucide="grid-2x2" class="h-4 w-4"></i></a></div>
                </div>

                <div class="mt-6 flex flex-wrap gap-2.5 rounded-2xl border border-slate-200 bg-white p-3 shadow-sm">
                    <label class="relative min-w-[240px] flex-1"><i data-lucide="search" class="pointer-events-none absolute left-3 top-3 h-4 w-4 text-slate-400"></i><input id="jobSearch" type="search" placeholder="Search by job title, skill or keyword..." class="h-10 w-full rounded-lg border border-slate-200 pl-9 pr-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"></label>
                    <select id="departmentFilter" class="h-10 min-w-40 rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700"><option value="">Department</option><?php foreach (array_unique(array_filter(array_column($jobs ?? [], 'department'))) as $department): ?><option value="<?= esc(strtolower($department), 'attr') ?>"><?= esc($department) ?></option><?php endforeach; ?></select>
                    <button id="resetFilters" type="button" class="h-10 rounded-lg border border-slate-200 px-4 text-sm font-bold text-slate-600 hover:bg-slate-50">Reset</button>
                </div>

                <div class="mt-6 grid items-start gap-6 lg:grid-cols-[minmax(0,1.6fr)_minmax(280px,1fr)]">
                    <section>
                        <div class="mb-3 flex items-center justify-between"><h2 class="text-sm font-extrabold text-slate-700">Open Positions (<span id="visibleJobCount"><?= $jobCount ?></span>)</h2><span class="text-xs font-semibold text-slate-400"><?= $appliedCount ?> applied</span></div>
                        <div id="jobList" class="space-y-2.5">
                            <?php foreach ($jobs ?? [] as $job): ?>
                                <?php $hasApplied = in_array($job['id'], $appliedIds ?? []); ?>
                                <article class="job-row rounded-xl border border-slate-200 bg-white p-4 transition" data-job-row data-title="<?= esc(strtolower(($job['job_title'] ?? '') . ' ' . ($job['mandatory_skills'] ?? '')), 'attr') ?>" data-department="<?= esc(strtolower($job['department'] ?? ''), 'attr') ?>">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600"><i data-lucide="briefcase-business" class="h-[18px] w-[18px]"></i></span>
                                        <div class="min-w-0 flex-1"><h3 class="truncate text-[15px] font-bold text-slate-950"><?= esc($job['job_title']) ?></h3><p class="mt-1 truncate text-xs text-slate-500"><?= esc(implode(' · ', array_filter([$job['department'] ?? '', $job['location'] ?? '', $job['employment_type'] ?? '']))) ?></p></div>
                                        <?php if ($hasApplied): ?><span class="rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-bold text-emerald-700">Applied</span><?php else: ?><i data-lucide="chevron-right" class="h-4 w-4 text-slate-300"></i><?php endif; ?>
                                    </div>
                                    <div class="mt-4 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-3">
                                        <?php if (!empty($job['experience'])): ?><span class="inline-flex items-center gap-1 rounded-full bg-slate-50 px-2.5 py-1 text-[11px] font-semibold text-slate-600"><i data-lucide="clock-3" class="h-3 w-3"></i><?= esc($job['experience']) ?></span><?php endif; ?>
                                        <span class="inline-flex items-center gap-1 rounded-full bg-slate-50 px-2.5 py-1 text-[11px] font-semibold text-slate-600"><i data-lucide="users" class="h-3 w-3"></i><?= (int) ($job['vacancies'] ?? 1) ?> opening<?= (int) ($job['vacancies'] ?? 1) === 1 ? '' : 's' ?></span>
                                        <span class="ml-auto flex gap-2"><button type="button" onclick="openViewModal(<?= (int) $job['id'] ?>)" class="inline-flex h-8 items-center gap-1.5 rounded-lg border border-slate-200 px-3 text-xs font-bold text-slate-600 hover:bg-slate-50"><i data-lucide="eye" class="h-3.5 w-3.5"></i> View</button><?php if (!$hasApplied): ?><a href="<?= base_url('Recruitment/apply-job/' . $job['id']) ?>" class="inline-flex h-8 items-center rounded-lg bg-blue-600 px-3 text-xs font-bold text-white hover:bg-blue-700">Apply now</a><?php endif; ?></span>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                            <div id="emptyJobs" class="<?= $jobs ? 'hidden ' : '' ?>rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center"><i data-lucide="search-x" class="mx-auto h-7 w-7 text-slate-400"></i><h3 class="mt-3 font-bold text-slate-800">No matching opportunities</h3><p class="mt-1 text-sm text-slate-500">Try another search or department.</p></div>
                        </div>
                    </section>

                    <aside class="space-y-4 lg:sticky lg:top-6">
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="text-[15px] font-extrabold">Why explore internal roles?</h3><div class="mt-4 space-y-4"><?php foreach ([['trending-up','Career Growth','Build on your experience and advance within the company.'],['sparkles','New Challenges','Use your strengths in a fresh team or domain.'],['users','Known Culture','Grow without leaving the people and values you know.'],['badge-check','Recognized Impact','Bring your proven contributions into your next role.']] as [$icon,$title,$text]): ?><div class="flex gap-3"><span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600"><i data-lucide="<?= $icon ?>" class="h-4 w-4"></i></span><div><h4 class="text-[13px] font-bold text-slate-950"><?= esc($title) ?></h4><p class="mt-0.5 text-xs leading-5 text-slate-500"><?= esc($text) ?></p></div></div><?php endforeach; ?></div></section>
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="text-[15px] font-extrabold">Application Tips</h3><div class="mt-4 space-y-3"><?php foreach (['Review the role requirements carefully.','Highlight transferable skills and recent impact.','Keep your profile and resume current.','Speak with your manager about your growth goals.'] as $tip): ?><div class="flex gap-2 text-xs leading-5 text-slate-600"><i data-lucide="check" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-emerald-600"></i><span><?= esc($tip) ?></span></div><?php endforeach; ?></div></section>
                        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5"><h3 class="text-[15px] font-extrabold">Need help?</h3><p class="mt-2 text-xs leading-5 text-slate-600">Contact HR if you need help understanding a role or the internal application process.</p><a href="mailto:hr@gic.com" class="mt-4 inline-flex items-center gap-2 rounded-lg border border-blue-200 bg-white px-4 py-2.5 text-xs font-bold text-blue-700"><i data-lucide="mail" class="h-3.5 w-3.5"></i> Contact HR</a></section>
                    </aside>
                </div>
            </div>
        </main>
    </div>
</div>

<?= view('partials/flash_toast', ['toastSuccess' => session()->getFlashdata('success'), 'toastError' => session()->getFlashdata('error')]) ?>
<div id="viewModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/50"><div class="max-h-[90vh] w-[95%] max-w-6xl overflow-y-auto rounded-xl bg-white shadow-2xl"><div id="viewModalContent"></div></div></div>
<script>
lucide.createIcons();
function toggleSidebar(){document.getElementById('sidebar').classList.toggle('-translate-x-full');document.getElementById('sidebarOverlay').classList.toggle('hidden')}
document.getElementById('sidebarOverlay').addEventListener('click',function(){document.getElementById('sidebar').classList.add('-translate-x-full');this.classList.add('hidden')});
function openViewModal(id){fetch("<?= base_url('Recruitment/view-job-modal') ?>/"+id).then(r=>r.text()).then(html=>{document.getElementById('viewModalContent').innerHTML=html;document.getElementById('viewModal').classList.remove('hidden');document.getElementById('viewModal').classList.add('flex');lucide.createIcons()})}
function closeViewModal(){document.getElementById('viewModal').classList.add('hidden');document.getElementById('viewModal').classList.remove('flex');document.getElementById('viewModalContent').innerHTML=''}
const search=document.getElementById('jobSearch'),department=document.getElementById('departmentFilter'),rows=[...document.querySelectorAll('[data-job-row]')];
function filterJobs(){const query=search.value.trim().toLowerCase(),dept=department.value;let visible=0;rows.forEach(row=>{const show=(!query||row.dataset.title.includes(query))&&(!dept||row.dataset.department===dept);row.classList.toggle('hidden',!show);if(show)visible++});document.getElementById('visibleJobCount').textContent=visible;document.getElementById('emptyJobs').classList.toggle('hidden',visible!==0)}
search.addEventListener('input',filterJobs);department.addEventListener('change',filterJobs);document.getElementById('resetFilters').addEventListener('click',()=>{search.value='';department.value='';filterJobs()});
</script>
</body>
</html>
