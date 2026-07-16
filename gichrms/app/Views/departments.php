<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-900">
<div class="flex h-screen overflow-hidden">
    <?= view('sidebar') ?>
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
        <?= view('navbar') ?>
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            <div class="mx-auto max-w-5xl space-y-6">
                <div>
                    <h1 class="text-2xl font-bold">Departments</h1>
                    <p class="mt-1 text-sm text-slate-500">Create departments before assigning staff or opening requisitions.</p>
                </div>

                <form action="<?= base_url('departments/store') ?>" method="post" class="grid gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:grid-cols-[1fr_220px_auto] sm:items-end">
                    <?= csrf_field() ?>
                    <label class="text-sm font-semibold text-slate-700">Department name
                        <input name="department_name" value="<?= esc(old('department_name')) ?>" required maxlength="100" class="mt-2 h-11 w-full rounded-xl border border-slate-300 px-3 font-normal outline-none focus:border-indigo-500">
                    </label>
                    <label class="text-sm font-semibold text-slate-700">Code
                        <input name="department_code" value="<?= esc(old('department_code')) ?>" maxlength="20" class="mt-2 h-11 w-full rounded-xl border border-slate-300 px-3 font-normal uppercase outline-none focus:border-indigo-500" placeholder="e.g. ENG">
                    </label>
                    <button class="h-11 rounded-xl bg-indigo-600 px-5 text-sm font-semibold text-white hover:bg-indigo-700">Add Department</button>
                </form>

                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="px-5 py-3">Name</th><th class="px-5 py-3">Code</th><th class="px-5 py-3">Status</th><th class="px-5 py-3 text-right">Action</th></tr></thead>
                        <tbody class="divide-y divide-slate-100">
                        <?php if (empty($departments)): ?>
                            <tr><td colspan="4" class="px-5 py-10 text-center text-slate-500">No departments yet.</td></tr>
                        <?php endif; ?>
                        <?php foreach ($departments as $department): ?>
                            <tr>
                                <td class="px-5 py-4 font-semibold"><?= esc($department['department_name']) ?></td>
                                <td class="px-5 py-4 text-slate-500"><?= esc($department['department_code'] ?: '-') ?></td>
                                <td class="px-5 py-4"><span class="rounded-full px-2.5 py-1 text-xs font-semibold <?= $department['status'] ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' ?>"><?= $department['status'] ? 'Active' : 'Inactive' ?></span></td>
                                <td class="px-5 py-4 text-right"><form action="<?= base_url('departments/toggle/' . $department['id']) ?>" method="post"><?= csrf_field() ?><button class="font-semibold text-indigo-700 hover:text-indigo-900"><?= $department['status'] ? 'Deactivate' : 'Activate' ?></button></form></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </main>
    </div>
</div>
<?= view('partials/flash_toast', ['toastSuccess' => session()->getFlashdata('success'), 'toastErrors' => session()->getFlashdata('errors') ?? (session()->getFlashdata('error') ? [session()->getFlashdata('error')] : [])]) ?>
<script>lucide.createIcons(); function toggleSidebar(){document.getElementById('sidebar').classList.toggle('-translate-x-full');document.getElementById('sidebarOverlay')?.classList.toggle('hidden');}</script>
</body>
</html>
