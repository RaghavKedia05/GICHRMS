<?php
$state = $state ?? 'invalid';
$accepted = $state === 'accepted';
$declined = $state === 'declined';
$title = $accepted ? 'Offer accepted' : ($declined ? 'Offer declined' : 'Offer link unavailable');
$message = $accepted
    ? 'Thank you. Your signed acceptance has been recorded and the recruitment team can now continue your onboarding.'
    : ($declined
        ? 'Your decision has been recorded. Thank you for letting the recruitment team know.'
        : 'This secure link is invalid, expired, or has already been used. Contact the recruitment team if you need assistance.');
$tone = $accepted ? 'bg-emerald-100 text-emerald-700' : ($declined ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700');
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?= esc($title) ?></title><script src="https://cdn.tailwindcss.com"></script></head><body class="flex min-h-screen items-center justify-center bg-slate-100 p-4"><main class="w-full max-w-lg rounded-2xl border bg-white p-8 text-center shadow-xl"><div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full <?= $tone ?> text-2xl"><?= $accepted ? '&#10003;' : '&#8212;' ?></div><h1 class="mt-5 text-2xl font-bold text-slate-950"><?= esc($title) ?></h1><p class="mt-3 text-sm leading-6 text-slate-600"><?= esc($message) ?></p><p class="mt-6 text-xs text-slate-400">You may safely close this page.</p></main></body></html>
