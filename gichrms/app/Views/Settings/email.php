<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Email Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-slate-50">
    <?php
    $successMessage = session()->getFlashdata('success');
    $errorMessage = session()->getFlashdata('error');
    $validationErrors = session()->getFlashdata('errors') ?? [];
    $settings = $settings ?? [];
    $fieldClass = 'mt-2 w-full rounded-xl border border-slate-300 bg-white px-3.5 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10';
    ?>

    <div id="sidebarOverlay" class="fixed inset-0 z-40 hidden bg-black/40 lg:hidden"></div>

    <div class="flex h-screen overflow-hidden">
        <?= view('sidebar') ?>

        <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
            <?= view('navbar') ?>

            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <div class="mx-auto max-w-6xl">
                    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <div class="mb-2 flex items-center gap-2 text-sm font-medium text-indigo-600">
                                <i data-lucide="settings" class="h-4 w-4"></i>
                                Company Settings
                            </div>
                            <h1 class="text-2xl font-semibold text-slate-950 sm:text-3xl">Recruitment Email</h1>
                            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                                Send candidate notifications through your company's official HR mailbox. These settings apply only to your company.
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 self-start rounded-full border px-3 py-1.5 text-xs font-semibold <?= !empty($settings) && !empty($settings['is_active']) ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-amber-200 bg-amber-50 text-amber-700' ?>">
                            <span class="h-2 w-2 rounded-full <?= !empty($settings) && !empty($settings['is_active']) ? 'bg-emerald-500' : 'bg-amber-500' ?>"></span>
                            <?= !empty($settings) && !empty($settings['is_active']) ? 'Email enabled' : 'Setup required' ?>
                        </div>
                    </div>

                    <?php if (empty($hasEncryptionKey)): ?>
                        <div class="mb-6 flex gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900">
                            <i data-lucide="shield-alert" class="mt-0.5 h-5 w-5 shrink-0 text-amber-600"></i>
                            <div>
                                <p class="font-semibold">Encryption key required</p>
                                <p class="mt-1 leading-6">Run <code class="rounded bg-amber-100 px-1.5 py-0.5">php spark key:generate</code> from the project folder before saving the SMTP password.</p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_340px]">
                        <form action="<?= base_url('settings/email/save') ?>" method="post" class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                            <?= csrf_field() ?>

                            <div class="border-b border-slate-200 px-5 py-5 sm:px-7">
                                <div class="flex items-start gap-3">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                        <i data-lucide="mail-cog" class="h-5 w-5"></i>
                                    </span>
                                    <div>
                                        <h2 class="font-semibold text-slate-950">Sender and SMTP details</h2>
                                        <p class="mt-1 text-sm text-slate-500">Use the credentials supplied by your company's email provider.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-7 p-5 sm:p-7">
                                <section>
                                    <h3 class="text-sm font-semibold text-slate-900">Company identity</h3>
                                    <div class="mt-4 grid gap-5 md:grid-cols-2">
                                        <div>
                                            <label for="companyName" class="text-sm font-medium text-slate-700">Company name</label>
                                            <input id="companyName" name="company_name" required maxlength="150"
                                                value="<?= esc(old('company_name') ?: ($company['name'] ?? '')) ?>"
                                                class="<?= $fieldClass ?>" placeholder="Global Info Cloud">
                                        </div>
                                        <div>
                                            <label for="fromName" class="text-sm font-medium text-slate-700">Sender name</label>
                                            <input id="fromName" name="from_name" required maxlength="150"
                                                value="<?= esc(old('from_name') ?: ($settings['from_name'] ?? 'HR Recruitment')) ?>"
                                                class="<?= $fieldClass ?>" placeholder="Global Info Cloud HR">
                                            <p class="mt-2 text-xs text-slate-500">The name candidates see in their inbox.</p>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="fromEmail" class="text-sm font-medium text-slate-700">Official HR email address</label>
                                            <input id="fromEmail" name="from_email" type="email" required maxlength="190"
                                                value="<?= esc(old('from_email') ?: ($settings['from_email'] ?? '')) ?>"
                                                class="<?= $fieldClass ?>" placeholder="hr@yourcompany.com">
                                        </div>
                                    </div>
                                </section>

                                <div class="border-t border-slate-200"></div>

                                <section>
                                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                        <div>
                                            <h3 class="text-sm font-semibold text-slate-900">SMTP connection</h3>
                                            <p class="mt-1 text-xs text-slate-500">Select a preset or enter the values supplied by your provider.</p>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            <button type="button" onclick="applySmtpPreset('google')" class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700">Google Workspace</button>
                                            <button type="button" onclick="applySmtpPreset('microsoft')" class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700">Microsoft 365</button>
                                        </div>
                                    </div>

                                    <div class="mt-4 grid gap-5 md:grid-cols-2">
                                        <div>
                                            <label for="smtpHost" class="text-sm font-medium text-slate-700">SMTP server</label>
                                            <input id="smtpHost" name="smtp_host" required maxlength="190"
                                                value="<?= esc(old('smtp_host') ?: ($settings['smtp_host'] ?? 'smtp.gmail.com')) ?>"
                                                class="<?= $fieldClass ?>" placeholder="smtp.gmail.com">
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label for="smtpPort" class="text-sm font-medium text-slate-700">Port</label>
                                                <input id="smtpPort" name="smtp_port" type="number" min="1" max="65535" required
                                                    value="<?= esc(old('smtp_port') ?: ($settings['smtp_port'] ?? 587)) ?>"
                                                    class="<?= $fieldClass ?>">
                                            </div>
                                            <div>
                                                <label for="smtpEncryption" class="text-sm font-medium text-slate-700">Encryption</label>
                                                <?php $encryption = old('smtp_encryption') ?: ($settings['smtp_encryption'] ?? 'tls'); ?>
                                                <select id="smtpEncryption" name="smtp_encryption" class="<?= $fieldClass ?>">
                                                    <option value="tls" <?= $encryption === 'tls' ? 'selected' : '' ?>>TLS</option>
                                                    <option value="ssl" <?= $encryption === 'ssl' ? 'selected' : '' ?>>SSL</option>
                                                    <option value="none" <?= $encryption === 'none' ? 'selected' : '' ?>>None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="smtpUsername" class="text-sm font-medium text-slate-700">SMTP username</label>
                                            <input id="smtpUsername" name="smtp_username" required maxlength="190" autocomplete="username"
                                                value="<?= esc(old('smtp_username') ?: ($settings['smtp_username'] ?? '')) ?>"
                                                class="<?= $fieldClass ?>" placeholder="hr@yourcompany.com">
                                        </div>
                                        <div>
                                            <label for="smtpPassword" class="text-sm font-medium text-slate-700">SMTP password</label>
                                            <div class="relative">
                                                <input id="smtpPassword" name="smtp_password" type="password" minlength="8" autocomplete="new-password"
                                                    class="<?= $fieldClass ?> pr-12"
                                                    placeholder="<?= !empty($hasSavedPassword) ? 'Leave blank to keep saved password' : 'Enter app password' ?>">
                                                <button type="button" onclick="togglePassword()" class="absolute bottom-3 right-3 text-slate-400 hover:text-slate-700" aria-label="Show or hide SMTP password">
                                                    <i id="passwordIcon" data-lucide="eye" class="h-5 w-5"></i>
                                                </button>
                                            </div>
                                            <p class="mt-2 text-xs <?= !empty($hasSavedPassword) ? 'text-emerald-600' : 'text-slate-500' ?>">
                                                <?= !empty($hasSavedPassword) ? 'An encrypted password is already saved.' : 'Google accounts must use an App Password.' ?>
                                            </p>
                                        </div>
                                    </div>
                                </section>

                                <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4">
                                    <input type="checkbox" name="is_active" value="1" class="mt-1 h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" <?= old('is_active') || (!empty($settings) && !empty($settings['is_active'])) || empty($settings) ? 'checked' : '' ?>>
                                    <span>
                                        <span class="block text-sm font-semibold text-slate-800">Enable company recruitment email</span>
                                        <span class="mt-1 block text-xs leading-5 text-slate-500">When disabled, candidate statuses can still be updated but automatic company emails will not be sent.</span>
                                    </span>
                                </label>
                            </div>

                            <div class="flex justify-end border-t border-slate-200 bg-slate-50 px-5 py-4 sm:px-7">
                                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20">
                                    <i data-lucide="save" class="h-4 w-4"></i>
                                    Save Email Settings
                                </button>
                            </div>
                        </form>

                        <aside class="space-y-6">
                            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                        <i data-lucide="send" class="h-5 w-5"></i>
                                    </span>
                                    <div>
                                        <h2 class="font-semibold text-slate-950">Send a test</h2>
                                        <p class="mt-0.5 text-xs text-slate-500">Save settings before testing.</p>
                                    </div>
                                </div>

                                <form action="<?= base_url('settings/email/test') ?>" method="post" class="mt-5">
                                    <?= csrf_field() ?>
                                    <label for="testEmail" class="text-sm font-medium text-slate-700">Test recipient</label>
                                    <input id="testEmail" name="test_email" type="email" required
                                        value="<?= esc(session('email')) ?>" class="<?= $fieldClass ?>" placeholder="you@company.com">
                                    <button type="submit" <?= empty($settings) ? 'disabled' : '' ?>
                                        class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-indigo-200 bg-indigo-50 px-4 py-3 text-sm font-semibold text-indigo-700 transition hover:bg-indigo-100 disabled:cursor-not-allowed disabled:opacity-50">
                                        <i data-lucide="mail-check" class="h-4 w-4"></i>
                                        Send Test Email
                                    </button>
                                </form>

                                <?php if (!empty($settings['last_tested_at'])): ?>
                                    <div class="mt-4 rounded-lg <?= ($settings['last_test_status'] ?? '') === 'success' ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' ?> p-3 text-xs leading-5">
                                        <p class="font-semibold"><?= ($settings['last_test_status'] ?? '') === 'success' ? 'Last test succeeded' : 'Last test failed' ?></p>
                                        <p><?= esc(date('d M Y, h:i A', strtotime($settings['last_tested_at']))) ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="rounded-2xl border border-sky-200 bg-sky-50 p-5 text-sm text-sky-900">
                                <div class="flex gap-3">
                                    <i data-lucide="shield-check" class="mt-0.5 h-5 w-5 shrink-0 text-sky-600"></i>
                                    <div>
                                        <p class="font-semibold">Credential security</p>
                                        <p class="mt-2 text-xs leading-6 text-sky-800">The SMTP password is encrypted before database storage and is never displayed again. Use a provider App Password instead of a personal mailbox password.</p>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => $successMessage,
        'toastError' => $errorMessage,
        'toastErrors' => $validationErrors,
    ]) ?>

    <script>
        lucide.createIcons();

        function applySmtpPreset(provider) {
            const presets = {
                google: { host: 'smtp.gmail.com', port: 587, encryption: 'tls' },
                microsoft: { host: 'smtp.office365.com', port: 587, encryption: 'tls' }
            };
            const preset = presets[provider];
            document.getElementById('smtpHost').value = preset.host;
            document.getElementById('smtpPort').value = preset.port;
            document.getElementById('smtpEncryption').value = preset.encryption;
        }

        function togglePassword() {
            const input = document.getElementById('smtpPassword');
            input.type = input.type === 'password' ? 'text' : 'password';
            document.getElementById('passwordIcon').setAttribute('data-lucide', input.type === 'password' ? 'eye' : 'eye-off');
            lucide.createIcons();
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }

        document.getElementById('sidebarOverlay').addEventListener('click', toggleSidebar);
    </script>
</body>
</html>
