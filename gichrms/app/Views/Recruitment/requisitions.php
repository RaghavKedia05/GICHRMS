<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Requisitions</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-100">

    <div class="flex h-screen overflow-hidden">

        <?= $this->include('sidebar') ?>

        <div class="flex-1 flex flex-col overflow-hidden">

            <?= $this->include('navbar') ?>

            <?php
            $role = session('role');
            $totalRequisitions = count($requisitions ?? []);
            $draftCount = 0;
            $pendingCount = 0;
            $publishedCount = 0;
            $rejectedCount = 0;

            foreach ($requisitions ?? [] as $item) {
                if (($item['status'] ?? '') === 'Draft') {
                    $draftCount++;
                }

                if (in_array(($item['status'] ?? ''), ['Pending Approval', 'Pending HOD Approval', 'Approved'], true)) {
                    $pendingCount++;
                }

                if (($item['status'] ?? '') === 'Published') {
                    $publishedCount++;
                }

                if (($item['status'] ?? '') === 'Rejected') {
                    $rejectedCount++;
                }
            }

            $statusClass = static function ($status): string {
                return match ($status) {
                    'Draft' => 'bg-amber-50 text-amber-700 ring-amber-200',
                    'Pending Approval', 'Pending HOD Approval' => 'bg-sky-50 text-sky-700 ring-sky-200',
                    'Approved', 'Published' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                    'Rejected' => 'bg-rose-50 text-rose-700 ring-rose-200',
                    default => 'bg-slate-100 text-slate-700 ring-slate-200',
                };
            };
            ?>

            <main class="flex-1 overflow-auto bg-slate-100 p-4 sm:p-6 lg:p-8">
                <div class="mx-auto max-w-7xl space-y-6">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <div class="flex flex-wrap items-center gap-3">
                                <h1 class="text-2xl font-semibold text-slate-950 sm:text-3xl">
                                    Job Requisitions
                                </h1>
                                <span
                                    class="inline-flex items-center rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-600 ring-1 ring-slate-200">
                                    <?= esc(ucwords(str_replace('_', ' ', (string) $role))) ?>
                                </span>
                            </div>
                            <p class="mt-2 max-w-2xl text-sm text-slate-500">
                                Review hiring requests, track approval progress, and publish approved roles.
                            </p>
                        </div>

                        <?php if (in_array($role, ['hiring_manager', 'admin', 'department_head'])): ?>
                            <a href="<?= base_url('Recruitment/requisitions/create') ?>"
                                class="inline-flex h-11 items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">
                                <i data-lucide="plus" class="h-4 w-4"></i>
                                Create Requisition
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">Total</p>
                                <i data-lucide="files" class="h-5 w-5 text-slate-400"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $totalRequisitions ?></p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">Drafts</p>
                                <i data-lucide="file-pen-line" class="h-5 w-5 text-amber-500"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $draftCount ?></p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">In Review</p>
                                <i data-lucide="timer" class="h-5 w-5 text-sky-500"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $pendingCount ?></p>
                        </div>
                        <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-500">Published</p>
                                <i data-lucide="badge-check" class="h-5 w-5 text-emerald-500"></i>
                            </div>
                            <p class="mt-3 text-3xl font-semibold text-slate-950"><?= $publishedCount ?></p>
                        </div>
                    </div>

                    <section class="rounded-lg border border-slate-200 bg-white shadow-sm">
                        <div class="flex flex-col gap-4 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-5">
                            <div>
                                <h2 class="text-base font-semibold text-slate-950">Requisition Pipeline</h2>
                                <p class="mt-1 text-sm text-slate-500">Sorted by latest request first.</p>
                            </div>
                            <div class="flex flex-wrap gap-2 text-xs font-semibold">
                                <span class="rounded-full bg-rose-50 px-3 py-1 text-rose-700 ring-1 ring-rose-200">
                                    Rejected <?= $rejectedCount ?>
                                </span>
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-600 ring-1 ring-slate-200">
                                    <?= $totalRequisitions ?> records
                                </span>
                            </div>
                        </div>

                        <?php if (!empty($requisitions)): ?>
                            <div class="hidden overflow-x-auto lg:block">
                                <table class="w-full min-w-[980px]">
                                    <thead>
                                        <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase text-slate-500">
                                            <th class="px-5 py-3">Request</th>
                                            <th class="px-5 py-3">Department</th>
                                            <th class="px-5 py-3">Openings</th>
                                            <th class="px-5 py-3">Employment</th>
                                            <th class="px-5 py-3">Status</th>
                                            <th class="px-5 py-3">Created</th>
                                            <th class="px-5 py-3 text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <?php foreach ($requisitions as $row): ?>
                                            <tr class="text-sm hover:bg-slate-50/80">
                                                <td class="px-5 py-4">
                                                    <p class="font-semibold text-slate-950"><?= esc($row['job_title']) ?></p>
                                                    <p class="mt-1 text-xs font-medium text-slate-500"><?= esc($row['requisition_no']) ?></p>
                                                </td>
                                                <td class="px-5 py-4 text-slate-700"><?= esc($row['department']) ?></td>
                                                <td class="px-5 py-4 text-slate-700"><?= esc($row['vacancies']) ?></td>
                                                <td class="px-5 py-4 text-slate-700"><?= esc($row['employment_type']) ?></td>
                                                <td class="px-5 py-4">
                                                    <span
                                                        class="inline-flex rounded-full px-3 py-1 text-xs font-semibold ring-1 <?= $statusClass($row['status']) ?>">
                                                        <?= esc($row['status']) ?>
                                                    </span>
                                                </td>
                                                <td class="px-5 py-4 text-slate-600">
                                                    <?= date('d M Y', strtotime($row['created_at'])) ?>
                                                </td>
                                                <td class="px-5 py-4">
                                                    <div class="flex justify-end gap-2">
                                                        <?php
                                                        $deleteReq = esc($row['requisition_no'], 'js');
                                                        $deleteTitle = esc($row['job_title'], 'js');
                                                        ?>

                                                        <button type="button" onclick="openViewModal(<?= $row['id'] ?>)"
                                                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                                                            title="View">
                                                            <i data-lucide="eye" class="h-4 w-4"></i>
                                                        </button>

                                                        <?php if ($role === 'hiring_manager' && $row['status'] === 'Draft'): ?>
                                                            <button type="button" onclick="openEditModal(<?= $row['id'] ?>)"
                                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:border-amber-200 hover:bg-amber-50 hover:text-amber-600"
                                                                title="Edit">
                                                                <i data-lucide="square-pen" class="h-4 w-4"></i>
                                                            </button>
                                                            <button type="button"
                                                                onclick="openDeleteModal(<?= $row['id'] ?>, '<?= $deleteReq ?>', '<?= $deleteTitle ?>')"
                                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:border-rose-200 hover:bg-rose-50 hover:text-rose-600"
                                                                title="Delete">
                                                                <i data-lucide="trash-2" class="h-4 w-4"></i>
                                                            </button>
                                                        <?php endif; ?>

                                                        <?php if ($role === 'department_head' && $row['hod_status'] === 'Pending' && $row['status'] === 'Pending Approval'): ?>
                                                            <form method="post"
                                                                action="<?= base_url('Recruitment/requisitions/hod-approve/' . $row['id']) ?>">
                                                                <?= csrf_field() ?>
                                                                <button
                                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-emerald-200 text-emerald-600 hover:bg-emerald-50"
                                                                    title="Approve">
                                                                    <i data-lucide="check-circle" class="h-4 w-4"></i>
                                                                </button>
                                                            </form>
                                                            <form method="post"
                                                                action="<?= base_url('Recruitment/requisitions/hod-reject/' . $row['id']) ?>">
                                                                <?= csrf_field() ?>
                                                                <button
                                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-rose-200 text-rose-600 hover:bg-rose-50"
                                                                    title="Reject">
                                                                    <i data-lucide="x-circle" class="h-4 w-4"></i>
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>

                                                        <?php if ($role === 'hr' && $row['hod_status'] === 'Approved' && $row['hr_status'] === 'Pending'): ?>
                                                            <button type="button"
                                                                onclick="openPublishModal(<?= $row['id'] ?>, '<?= esc($row['job_title'], 'js') ?>')"
                                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-emerald-200 text-emerald-600 hover:bg-emerald-50"
                                                                title="Publish">
                                                                <i data-lucide="badge-check" class="h-4 w-4"></i>
                                                            </button>
                                                            <form method="post"
                                                                action="<?= base_url('Recruitment/requisitions/hr-reject/' . $row['id']) ?>">
                                                                <?= csrf_field() ?>
                                                                <button
                                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-rose-200 text-rose-600 hover:bg-rose-50"
                                                                    title="Reject">
                                                                    <i data-lucide="x-circle" class="h-4 w-4"></i>
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>

                                                        <?php if ($role === 'admin'): ?>
                                                            <button type="button" onclick="openEditModal(<?= $row['id'] ?>)"
                                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:border-amber-200 hover:bg-amber-50 hover:text-amber-600"
                                                                title="Edit">
                                                                <i data-lucide="square-pen" class="h-4 w-4"></i>
                                                            </button>
                                                            <button type="button"
                                                                onclick="openDeleteModal(<?= $row['id'] ?>, '<?= $deleteReq ?>', '<?= $deleteTitle ?>')"
                                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:border-rose-200 hover:bg-rose-50 hover:text-rose-600"
                                                                title="Delete">
                                                                <i data-lucide="trash-2" class="h-4 w-4"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="grid gap-3 p-4 lg:hidden">
                                <?php foreach ($requisitions as $row): ?>
                                    <?php
                                    $deleteReq = esc($row['requisition_no'], 'js');
                                    $deleteTitle = esc($row['job_title'], 'js');
                                    ?>
                                    <article class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
                                        <div class="flex items-start justify-between gap-3">
                                            <div class="min-w-0">
                                                <p class="truncate text-base font-semibold text-slate-950"><?= esc($row['job_title']) ?></p>
                                                <p class="mt-1 text-xs font-medium text-slate-500"><?= esc($row['requisition_no']) ?></p>
                                            </div>
                                            <span
                                                class="shrink-0 rounded-full px-3 py-1 text-xs font-semibold ring-1 <?= $statusClass($row['status']) ?>">
                                                <?= esc($row['status']) ?>
                                            </span>
                                        </div>

                                        <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Department</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= esc($row['department']) ?></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Openings</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= esc($row['vacancies']) ?></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Employment</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= esc($row['employment_type']) ?></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-500">Created</p>
                                                <p class="mt-1 font-semibold text-slate-800"><?= date('d M Y', strtotime($row['created_at'])) ?></p>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex flex-wrap gap-2">
                                            <button type="button" onclick="openViewModal(<?= $row['id'] ?>)"
                                                class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                                                <i data-lucide="eye" class="h-4 w-4"></i>
                                                View
                                            </button>

                                            <?php if (($role === 'hiring_manager' && $row['status'] === 'Draft') || $role === 'admin'): ?>
                                                <button type="button" onclick="openEditModal(<?= $row['id'] ?>)"
                                                    class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-amber-200 px-3 text-sm font-semibold text-amber-700 hover:bg-amber-50">
                                                    <i data-lucide="square-pen" class="h-4 w-4"></i>
                                                    Edit
                                                </button>
                                                <button type="button"
                                                    onclick="openDeleteModal(<?= $row['id'] ?>, '<?= $deleteReq ?>', '<?= $deleteTitle ?>')"
                                                    class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-rose-200 px-3 text-sm font-semibold text-rose-700 hover:bg-rose-50">
                                                    <i data-lucide="trash-2" class="h-4 w-4"></i>
                                                    Delete
                                                </button>
                                            <?php endif; ?>

                                            <?php if ($role === 'department_head' && $row['hod_status'] === 'Pending' && $row['status'] === 'Pending Approval'): ?>
                                                <form method="post"
                                                    action="<?= base_url('Recruitment/requisitions/hod-approve/' . $row['id']) ?>">
                                                    <?= csrf_field() ?>
                                                    <button
                                                        class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-emerald-200 px-3 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">
                                                        <i data-lucide="check-circle" class="h-4 w-4"></i>
                                                        Approve
                                                    </button>
                                                </form>
                                                <form method="post"
                                                    action="<?= base_url('Recruitment/requisitions/hod-reject/' . $row['id']) ?>">
                                                    <?= csrf_field() ?>
                                                    <button
                                                        class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-rose-200 px-3 text-sm font-semibold text-rose-700 hover:bg-rose-50">
                                                        <i data-lucide="x-circle" class="h-4 w-4"></i>
                                                        Reject
                                                    </button>
                                                </form>
                                            <?php endif; ?>

                                            <?php if ($role === 'hr' && $row['hod_status'] === 'Approved' && $row['hr_status'] === 'Pending'): ?>
                                                <button type="button"
                                                    onclick="openPublishModal(<?= $row['id'] ?>, '<?= esc($row['job_title'], 'js') ?>')"
                                                    class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-emerald-200 px-3 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">
                                                    <i data-lucide="badge-check" class="h-4 w-4"></i>
                                                    Publish
                                                </button>
                                                <form method="post"
                                                    action="<?= base_url('Recruitment/requisitions/hr-reject/' . $row['id']) ?>">
                                                    <?= csrf_field() ?>
                                                    <button
                                                        class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-rose-200 px-3 text-sm font-semibold text-rose-700 hover:bg-rose-50">
                                                        <i data-lucide="x-circle" class="h-4 w-4"></i>
                                                        Reject
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="flex flex-col items-center justify-center px-6 py-16 text-center">
                                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                                    <i data-lucide="inbox" class="h-7 w-7"></i>
                                </div>
                                <h2 class="mt-4 text-lg font-semibold text-slate-950">No requisitions found</h2>
                                <p class="mt-2 max-w-md text-sm text-slate-500">
                                    New job requisitions will appear here after they are created.
                                </p>
                            </div>
                        <?php endif; ?>
                    </section>
                </div>
            </main>

        </div>

    </div>

    <?= view('partials/flash_toast', [
        'toastSuccess' => session()->getFlashdata('success'),
        'toastError' => session()->getFlashdata('error'),
    ]) ?>

    <div id="publishModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg w-full max-w-lg shadow-xl">
            <div class="flex items-start justify-between border-b px-6 py-5">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Publish Job Posting</h2>
                    <p id="publishJobTitle" class="mt-1 text-sm text-slate-500"></p>
                </div>
                <button type="button" onclick="closePublishModal()"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-900">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>

            <form id="publishForm" method="post">
                <?= csrf_field() ?>
                <div class="space-y-5 px-6 py-5">
                    <label class="flex items-start gap-3 rounded-lg border border-slate-200 p-4">
                        <input type="checkbox" name="publish_internal" value="1" checked
                            class="mt-1 rounded border-slate-300 text-indigo-600">
                        <span>
                            <span class="block text-sm font-semibold text-slate-900">Internal career portal</span>
                            <span class="block text-sm text-slate-500">Visible in employee job opportunities.</span>
                        </span>
                    </label>

                    <label class="flex items-start gap-3 rounded-lg border border-slate-200 p-4">
                        <input type="checkbox" name="publish_external" value="1" checked
                            class="mt-1 rounded border-slate-300 text-indigo-600">
                        <span>
                            <span class="block text-sm font-semibold text-slate-900">External public portal</span>
                            <span class="block text-sm text-slate-500">Visible in the published jobs board.</span>
                        </span>
                    </label>

                    <div>
                        <label class="text-sm font-medium text-slate-700">External boards</label>
                        <input type="text" name="external_boards" placeholder="LinkedIn, Naukri, Indeed"
                            class="mt-2 w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-700">Posting notes</label>
                        <textarea name="posting_notes" rows="3"
                            class="mt-2 w-full rounded-lg border border-slate-300 px-3.5 py-2.5 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-3 border-t px-6 py-5">
                    <button type="button" onclick="closePublishModal()"
                        class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-lg bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700">
                        Publish Posting
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?= $this->include('Recruitment/delete_requisition_modal') ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            lucide.createIcons();
        });
    </script>

    <div id="viewModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 p-4">

        <div class="bg-white rounded-lg w-full max-w-3xl max-h-[90vh] overflow-y-auto p-6 shadow-xl">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold">

                    Requisition Details

                </h2>

                <button onclick="closeViewModal()"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-900">

                    <i data-lucide="x" class="h-5 w-5"></i>

                </button>

            </div>

            <div id="viewContent" class="text-center py-10 text-slate-500">
                Loading...
            </div>

        </div>

    </div>

    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-3 backdrop-blur-sm sm:p-5">

        <div class="flex max-h-[94vh] w-full max-w-5xl flex-col overflow-hidden rounded-2xl border border-white/20 bg-slate-50 shadow-2xl">

            <div class="flex shrink-0 items-start justify-between gap-4 border-b border-slate-200 bg-white px-4 py-4 sm:px-6 sm:py-5">

                <div>
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                            <i data-lucide="square-pen" class="h-5 w-5"></i>
                        </span>
                        <div>
                            <h2 class="text-lg font-semibold text-slate-950 sm:text-xl">Edit Job Requisition</h2>
                            <p class="mt-0.5 text-sm text-slate-500">Review and update the hiring request details.</p>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="closeEditModal()" aria-label="Close edit requisition"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-slate-500 transition hover:bg-slate-100 hover:text-slate-900">

                    <i data-lucide="x" class="h-5 w-5"></i>

                </button>

            </div>

            <div id="editContent" class="overflow-y-auto p-4 text-center text-slate-500 sm:p-6">
                Loading...
            </div>

        </div>

    </div>

    <script>

        // View Requisition
        function openViewModal(id) {

            fetch("<?= base_url('Recruitment/requisitions/get/') ?>" + id)
                .then(response => response.text())
                .then(html => {

                    document.getElementById("viewContent").innerHTML = html;

                    const modal = document.getElementById("viewModal");

                    modal.classList.remove("hidden");
                    modal.classList.add("flex");

                    lucide.createIcons();

                });

        }

        function closeViewModal() {

            const modal = document.getElementById("viewModal");

            modal.classList.remove("flex");
            modal.classList.add("hidden");

        }



        // Edit Requisition       
        function openEditModal(id) {

            fetch("<?= base_url('Recruitment/requisitions/edit/') ?>" + id)
                .then(response => response.text())
                .then(html => {

                    document.getElementById("editContent").innerHTML = html;

                    const modal = document.getElementById("editModal");

                    modal.classList.remove("hidden");
                    modal.classList.add("flex");

                    lucide.createIcons();

                });

        }

        function closeEditModal() {

            const modal = document.getElementById("editModal");

            modal.classList.remove("flex");
            modal.classList.add("hidden");

        }
        function openDeleteModal(id, requisitionNo, jobTitle) {

            document.getElementById("deleteReqNo").textContent = requisitionNo;
            document.getElementById("deleteJobTitle").textContent = jobTitle;

            document.getElementById("confirmDeleteForm").action =
                "<?= base_url('Recruitment/requisitions/delete/') ?>" + id;

            const modal = document.getElementById("deleteModal");

            modal.classList.remove("hidden");
            modal.classList.add("flex");

            lucide.createIcons();
        }

        function closeDeleteModal() {

            const modal = document.getElementById("deleteModal");

            modal.classList.remove("flex");
            modal.classList.add("hidden");
        }

        function openPublishModal(id, jobTitle) {

            document.getElementById("publishJobTitle").textContent = jobTitle;
            document.getElementById("publishForm").action =
                "<?= base_url('Recruitment/requisitions/hr-approve/') ?>" + id;

            const modal = document.getElementById("publishModal");

            modal.classList.remove("hidden");
            modal.classList.add("flex");

            lucide.createIcons();
        }

        function closePublishModal() {

            const modal = document.getElementById("publishModal");

            modal.classList.remove("flex");
            modal.classList.add("hidden");
        }

    </script>






</body>

</html>
