<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Apply for <?= esc($job['job_title']) ?> | GICHRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>body{font-family:Inter,system-ui,sans-serif}</style>
</head>
<body class="bg-slate-50">
<?php $toastError = session()->getFlashdata('error'); ?>
<div id="sidebarOverlay" class="fixed inset-0 z-40 hidden bg-black/40 lg:hidden"></div>
<div class="flex h-screen overflow-hidden">
    <?= $this->include('sidebar') ?>
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
        <?= $this->include('navbar') ?>
        <main class="flex-1 overflow-y-auto p-4 lg:p-6">
            <div class="mx-auto max-w-[1180px]">
                <a href="<?= base_url('Recruitment/employee-jobs') ?>" class="inline-flex items-center gap-2 text-sm font-bold text-slate-600 hover:text-blue-700"><i data-lucide="arrow-left" class="h-4 w-4"></i> Back to opportunities</a>
                <div class="mt-5"><p class="text-xs font-extrabold uppercase tracking-[.16em] text-blue-600">Internal application</p><h1 class="mt-2 text-3xl font-black tracking-tight text-slate-950">Apply for <?= esc($job['job_title']) ?></h1><p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">Complete your profile and share the experience that makes you a strong fit for this role.</p></div>

                <div class="mt-6 grid items-start gap-6 lg:grid-cols-[minmax(0,1fr)_320px]">
                    <form id="jobApplicationForm" action="<?= base_url('Recruitment/submit-application') ?>" method="post" enctype="multipart/form-data" class="space-y-5">
                        <?= csrf_field() ?>
                        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                        <input type="hidden" name="requisition_id" value="<?= (int) $job['id'] ?>">
                        <input type="hidden" name="application_source" value="Internal Career Portal">

                        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4 sm:px-6"><span class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600"><i data-lucide="user-round" class="h-4 w-4"></i></span><div><h2 class="text-[15px] font-extrabold text-slate-950">Candidate details</h2><p class="mt-0.5 text-xs text-slate-500">Tell the hiring team how to reach you.</p></div></div>
                            <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-6">
                                <?php foreach ([
                                    ['candidate_name','Full name *','text','Your full name'],
                                    ['candidate_email','Email address *','email','you@example.com'],
                                    ['phone','Phone number *','tel','Your contact number'],
                                    ['current_company','Current company','text','Company name'],
                                    ['experience_years','Experience (years)','number','e.g. 3.5'],
                                    ['current_location','Current location','text','City, state'],
                                    ['linkedin_url','LinkedIn URL','url','https://linkedin.com/in/...'],
                                    ['portfolio_url','Portfolio URL','url','https://...'],
                                ] as [$name,$label,$type,$placeholder]): ?>
                                    <label class="block text-sm font-bold text-slate-700"><?= esc($label) ?><input type="<?= esc($type) ?>" name="<?= esc($name) ?>" value="<?= esc(old($name), 'attr') ?>" placeholder="<?= esc($placeholder, 'attr') ?>" <?= in_array($name, ['candidate_name','candidate_email','phone'], true) ? 'required' : '' ?> <?= $name === 'experience_years' ? 'min="0" max="60" step="0.1"' : '' ?> class="mt-2 h-11 w-full rounded-xl border border-slate-300 px-3.5 font-normal text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"></label>
                                <?php endforeach; ?>
                            </div>
                        </section>

                        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4 sm:px-6"><span class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600"><i data-lucide="file-pen-line" class="h-4 w-4"></i></span><div><h2 class="text-[15px] font-extrabold text-slate-950">Application message</h2><p class="mt-0.5 text-xs text-slate-500">Highlight your interest and relevant strengths.</p></div></div>
                            <div class="p-5 sm:p-6"><label class="block text-sm font-bold text-slate-700">Cover letter<textarea name="cover_letter" rows="6" maxlength="5000" class="mt-2 w-full rounded-xl border border-slate-300 p-4 font-normal leading-6 text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100" placeholder="Share a short note for the hiring team."><?= esc(old('cover_letter')) ?></textarea></label></div>
                        </section>

                        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4 sm:px-6"><span class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600"><i data-lucide="file-up" class="h-4 w-4"></i></span><div><h2 class="text-[15px] font-extrabold text-slate-950">Resume</h2><p class="mt-0.5 text-xs text-slate-500">Attach the latest version of your resume.</p></div></div>
                            <div class="p-5 sm:p-6"><label for="resumeFile" class="flex min-h-32 cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 px-4 text-center transition hover:border-blue-400 hover:bg-blue-50"><span class="flex h-10 w-10 items-center justify-center rounded-full bg-white text-blue-600 shadow-sm"><i data-lucide="upload-cloud" class="h-5 w-5"></i></span><span class="mt-3 text-sm font-bold text-slate-700">Choose your resume</span><span class="mt-1 text-xs text-slate-500">PDF, DOC or DOCX · maximum 5 MB</span><input id="resumeFile" type="file" name="resume" accept=".pdf,.doc,.docx" required class="sr-only"></label><p id="resumeFileName" class="mt-3 hidden text-sm font-semibold text-emerald-700"></p><p id="resumeFileError" class="mt-3 hidden text-sm font-semibold text-rose-600" role="alert"></p></div>
                        </section>

                        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end"><a href="<?= base_url('Recruitment/employee-jobs') ?>" class="inline-flex h-11 items-center justify-center rounded-xl border border-slate-300 px-6 text-sm font-bold text-slate-600 hover:bg-slate-50">Cancel</a><button type="submit" class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 px-7 text-sm font-extrabold text-white shadow-lg shadow-blue-100 hover:from-blue-700 hover:to-blue-800">Submit application <i data-lucide="send" class="h-4 w-4"></i></button></div>
                    </form>

                    <aside class="space-y-4 lg:sticky lg:top-6">
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><p class="text-xs font-extrabold uppercase tracking-[.14em] text-blue-600">Position summary</p><h2 class="mt-2 text-xl font-black text-slate-950"><?= esc($job['job_title']) ?></h2><div class="mt-5 space-y-2.5 text-xs font-semibold text-slate-600"><?php foreach ([['building-2',$job['department'] ?? 'Department'],['map-pin',$job['location'] ?? 'Location flexible'],['briefcase',$job['employment_type'] ?? 'Employment type'],['users',((int) ($job['vacancies'] ?? 1)) . ' opening' . ((int) ($job['vacancies'] ?? 1) === 1 ? '' : 's')]] as [$icon,$text]): ?><div class="flex items-center gap-2.5 rounded-lg bg-slate-50 px-3 py-2.5"><i data-lucide="<?= esc($icon) ?>" class="h-4 w-4 text-blue-600"></i><span><?= esc($text) ?></span></div><?php endforeach; ?></div></section>
                        <?php if (!empty($job['description'])): ?><section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><h3 class="text-[15px] font-extrabold text-slate-950">About the role</h3><p class="mt-3 line-clamp-[10] whitespace-pre-line text-xs leading-6 text-slate-600"><?= esc($job['description']) ?></p></section><?php endif; ?>
                        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5"><h3 class="text-[15px] font-extrabold text-slate-950">Before you submit</h3><div class="mt-3 space-y-2.5"><?php foreach (['Confirm your contact details are correct.','Use your most recent resume.','Review your cover letter for this role.'] as $tip): ?><div class="flex gap-2 text-xs leading-5 text-slate-600"><i data-lucide="check" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-emerald-600"></i><span><?= esc($tip) ?></span></div><?php endforeach; ?></div></section>
                    </aside>
                </div>
            </div>
        </main>
    </div>
</div>
<?= view('partials/flash_toast', ['toastError' => $toastError]) ?>
<script>
lucide.createIcons();
function toggleSidebar(){document.getElementById('sidebar').classList.toggle('-translate-x-full');document.getElementById('sidebarOverlay').classList.toggle('hidden')}
document.getElementById('sidebarOverlay').addEventListener('click',function(){document.getElementById('sidebar').classList.add('-translate-x-full');this.classList.add('hidden')});
const applicationForm=document.getElementById('jobApplicationForm'),resumeFile=document.getElementById('resumeFile'),resumeFileError=document.getElementById('resumeFileError'),resumeFileName=document.getElementById('resumeFileName'),maxResumeBytes=5*1024*1024,allowedResumeExtensions=['pdf','doc','docx'];
function validateResumeFile(){const file=resumeFile.files[0];resumeFileError.classList.add('hidden');resumeFileError.textContent='';resumeFileName.classList.add('hidden');resumeFileName.textContent='';if(!file)return true;const extension=file.name.split('.').pop().toLowerCase();let message='';if(!allowedResumeExtensions.includes(extension))message='Please upload a PDF, DOC, or DOCX resume.';else if(file.size>maxResumeBytes)message='The resume must be 5 MB or smaller.';if(message){resumeFileError.textContent=message;resumeFileError.classList.remove('hidden');return false}resumeFileName.textContent='Selected: '+file.name;resumeFileName.classList.remove('hidden');return true}
resumeFile.addEventListener('change',validateResumeFile);applicationForm.addEventListener('submit',function(event){if(!validateResumeFile()){event.preventDefault();resumeFile.focus()}});
</script>
</body></html>
