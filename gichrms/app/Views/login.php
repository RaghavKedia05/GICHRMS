<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light">
    <title>Sign in | GICHRMS</title>
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: Inter, ui-sans-serif, system-ui, sans-serif; }
        .auth-pattern {
            background-image: radial-gradient(circle at 20% 20%, rgba(129, 140, 248, .24), transparent 32%),
                radial-gradient(circle at 85% 75%, rgba(16, 185, 129, .16), transparent 30%);
        }
    </style>
</head>
<body class="min-h-screen bg-slate-950 text-slate-900">
    <main class="grid min-h-screen lg:grid-cols-[1.05fr_.95fr]">
        <section class="auth-pattern relative hidden overflow-hidden bg-slate-950 px-12 py-10 text-white lg:flex lg:flex-col lg:justify-between xl:px-20 xl:py-14">
            <div class="absolute inset-0 opacity-[.08]" style="background-image:linear-gradient(rgba(255,255,255,.2) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.2) 1px,transparent 1px);background-size:42px 42px"></div>
            <div class="relative flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-500 shadow-lg shadow-indigo-950/40">
                    <i data-lucide="waypoints" class="h-6 w-6"></i>
                </div>
                <div>
                    <p class="font-bold tracking-tight">GICHRMS</p>
                    <p class="text-xs font-medium text-slate-400">Human Resource Management</p>
                </div>
            </div>

            <div class="relative max-w-xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-semibold text-indigo-200 backdrop-blur">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    One workspace for your people operations
                </span>
                <h1 class="mt-6 text-4xl font-bold leading-tight tracking-tight xl:text-5xl">Manage your workforce with clarity and confidence.</h1>
                <p class="mt-5 max-w-lg text-base leading-7 text-slate-300">Recruitment, attendance, performance reviews, staff management, and communication—connected in one secure HR platform.</p>

                <div class="mt-10 grid max-w-lg grid-cols-2 gap-3">
                    <?php foreach ([['users-round', 'Company-scoped access'], ['briefcase-business', 'Recruitment workflow'], ['clock-3', 'Live attendance'], ['shield-check', 'Role-based security']] as [$icon, $label]): ?>
                        <div class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3.5 backdrop-blur-sm">
                            <i data-lucide="<?= esc($icon) ?>" class="h-4 w-4 text-indigo-300"></i>
                            <span class="text-xs font-semibold text-slate-200"><?= esc($label) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <p class="relative text-xs text-slate-500">Secure access for administrators, HR teams, managers, and employees.</p>
        </section>

        <section class="flex min-h-screen items-center justify-center bg-slate-50 px-5 py-10 sm:px-10">
            <div class="w-full max-w-md">
                <div class="mb-9 flex items-center gap-3 lg:hidden">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white"><i data-lucide="waypoints" class="h-5 w-5"></i></div>
                    <div><p class="font-bold text-slate-900">GICHRMS</p><p class="text-xs text-slate-500">Human Resource Management</p></div>
                </div>

                <div class="mb-8">
                    <p class="text-sm font-semibold text-indigo-600">Welcome back</p>
                    <h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-950">Employee login</h2>
                    <p class="mt-3 text-sm leading-6 text-slate-500">Use the credentials provided by your company to continue.</p>
                </div>

                <?php if ($message = session()->getFlashdata('success')): ?>
                    <div id="successAlert" role="status" class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                        <i data-lucide="circle-check" class="mt-0.5 h-5 w-5 shrink-0"></i><span><?= esc($message) ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($message = session()->getFlashdata('error')): ?>
                    <div role="alert" class="mb-5 flex items-start gap-3 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                        <i data-lucide="circle-alert" class="mt-0.5 h-5 w-5 shrink-0"></i><span><?= esc($message) ?></span>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post" class="space-y-5">
                    <?= csrf_field() ?>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Work email</label>
                        <div class="relative">
                            <i data-lucide="mail" class="pointer-events-none absolute left-3.5 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"></i>
                            <input id="email" type="email" name="email" value="<?= esc(old('email'), 'attr') ?>" autocomplete="username" required autofocus placeholder="name@company.com" class="h-12 w-full rounded-xl border border-slate-300 bg-white pl-11 pr-4 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                        <div class="relative">
                            <i data-lucide="lock-keyhole" class="pointer-events-none absolute left-3.5 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"></i>
                            <input id="password" type="password" name="password" autocomplete="current-password" required placeholder="Enter your password" class="h-12 w-full rounded-xl border border-slate-300 bg-white pl-11 pr-12 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                            <button id="passwordToggle" type="button" aria-label="Show password" aria-pressed="false" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center rounded-r-xl text-slate-400 transition hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <i data-lucide="eye" class="h-5 w-5"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="group flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 text-sm font-semibold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200">
                        Sign in securely
                        <i data-lucide="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-0.5"></i>
                    </button>
                </form>

                <div class="mt-7 rounded-xl border border-slate-200 bg-white p-4 text-center">
                    <p class="text-sm text-slate-600">New to GICHRMS?</p>
                    <a href="<?= base_url('register') ?>" class="mt-3 inline-flex items-center justify-center text-sm font-semibold text-indigo-600 transition hover:text-indigo-800">Register as a new company</a>
                </div>

                <div class="mt-8 flex items-center justify-center gap-2 text-xs text-slate-400">
                    <i data-lucide="shield-check" class="h-4 w-4"></i>
                    Protected by role-based access controls
                </div>
            </div>
        </section>
    </main>

    <script>
        lucide.createIcons();
        const password = document.getElementById('password');
        const toggle = document.getElementById('passwordToggle');
        toggle.addEventListener('click', function () {
            const showing = password.type === 'text';
            password.type = showing ? 'password' : 'text';
            this.setAttribute('aria-pressed', String(!showing));
            this.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
            this.innerHTML = `<i data-lucide="${showing ? 'eye' : 'eye-off'}" class="h-5 w-5"></i>`;
            lucide.createIcons();
            password.focus();
        });
    </script>
</body>
</html>
