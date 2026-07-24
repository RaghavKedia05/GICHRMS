<div id="deleteModal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">

    <div class="w-full max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">

        <div class="p-6">

            <div class="flex items-center gap-4">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-red-100">

                    <i data-lucide="trash-2" class="text-red-600 w-7 h-7"></i>

                </div>

                <div>

                    <h2 class="text-xl font-extrabold text-slate-950">

                        Delete Requisition

                    </h2>

                    <p class="text-slate-500">

                        This action cannot be undone.

                    </p>

                </div>

            </div>

            <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 p-4">

                <p class="text-sm text-slate-500">

                    Requisition Number

                </p>

                <p id="deleteReqNo" class="font-semibold">

                    --

                </p>

                <p class="mt-3 text-sm text-slate-500">

                    Job Title

                </p>

                <p id="deleteJobTitle" class="font-semibold">

                    --

                </p>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <button onclick="closeDeleteModal()" class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50">

                    Cancel

                </button>

                <form id="confirmDeleteForm" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="rounded-xl bg-red-600 px-5 py-3 text-sm font-extrabold text-white hover:bg-red-700">Delete Permanently</button>
                </form>

            </div>

        </div>

    </div>

</div>

<script>
    function openDeleteModal(id) {

        fetch("<?= base_url('Recruitment/requisitions/get/') ?>" + id)
            .then(response => response.json())
            .then(data => {

                document.getElementById("deleteReqNo").textContent =
                    data.requisition_no ?? "--";

                document.getElementById("deleteJobTitle").textContent =
                    data.job_title ?? "--";

                document.getElementById("confirmDeleteForm").action =
                    "<?= base_url('Recruitment/requisitions/delete/') ?>" + id;

                const modal = document.getElementById("deleteModal");

                modal.classList.remove("hidden");
                modal.classList.add("flex");

                lucide.createIcons();
            });

    }

    function closeDeleteModal() {

        const modal = document.getElementById("deleteModal");

        modal.classList.remove("flex");
        modal.classList.add("hidden");
    }
</script>
