<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Review Employment Offer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 px-4 py-8 text-slate-800">
    <main class="mx-auto max-w-3xl overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">
        <header class="bg-slate-950 px-6 py-7 text-white sm:px-9">
            <p class="text-sm font-semibold text-indigo-300"><?= esc($companyName) ?></p>
            <h1 class="mt-2 text-2xl font-bold sm:text-3xl">Employment Offer</h1>
            <p class="mt-2 text-sm text-slate-300">Please review the details and submit your decision below.</p>
        </header>
        <div class="p-6 sm:p-9">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-700"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            <p>Dear <strong><?= esc($application['candidate_name'] ?: $application['name']) ?></strong>,</p>
            <p class="mt-2 text-sm leading-6 text-slate-600">We are pleased to offer you the following position.</p>
            <dl class="mt-6 grid gap-4 rounded-xl bg-slate-50 p-5 sm:grid-cols-2">
                <div><dt class="text-xs font-semibold uppercase text-slate-400">Position</dt><dd class="mt-1 font-semibold"><?= esc($application['job_title']) ?></dd></div>
                <div><dt class="text-xs font-semibold uppercase text-slate-400">Department</dt><dd class="mt-1 font-semibold"><?= esc($application['department']) ?></dd></div>
                <div><dt class="text-xs font-semibold uppercase text-slate-400">Annual compensation</dt><dd class="mt-1 font-semibold"><?= number_format((float) $application['offered_salary'], 2) ?></dd></div>
                <div><dt class="text-xs font-semibold uppercase text-slate-400">Proposed joining date</dt><dd class="mt-1 font-semibold"><?= esc(date('d F Y', strtotime($application['proposed_joining_date']))) ?></dd></div>
            </dl>
            <?php if (!empty($application['salary_notes'])): ?><div class="mt-5 text-sm leading-6 text-slate-600"><strong class="text-slate-800">Additional terms</strong><br><?= nl2br(esc($application['salary_notes'])) ?></div><?php endif; ?>
            <form method="post" action="<?= current_url() ?>" class="mt-7 space-y-4">
                <?= csrf_field() ?>
                <label class="block text-sm font-semibold">Full legal name
                    <input name="signature_name" value="<?= esc(old('signature_name')) ?>" autocomplete="name" class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" placeholder="Required when accepting">
                </label>
                <label class="flex items-start gap-3 rounded-xl border border-slate-200 p-4 text-sm">
                    <input type="checkbox" name="consent" value="1" class="mt-1"> <span>I agree that my typed name is my electronic signature and confirms my acceptance of this offer.</span>
                </label>
                <label class="block text-sm font-semibold">Decline reason
                    <textarea name="offer_decline_reason" rows="3" class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" placeholder="Required only when declining"><?= esc(old('offer_decline_reason')) ?></textarea>
                </label>
                <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                    <button name="decision" value="accept" class="rounded-xl bg-emerald-600 px-5 py-3 font-semibold text-white hover:bg-emerald-700">Accept and Sign Offer</button>
                    <button name="decision" value="decline" class="rounded-xl bg-rose-600 px-5 py-3 font-semibold text-white hover:bg-rose-700">Decline Offer</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
