<div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[200]">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-md">

        <div class="p-6">

            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">

                    <i data-lucide="trash-2" class="text-red-600 w-7 h-7"></i>

                </div>

                <div>

                    <h2 class="text-xl font-bold">

                        Delete Requisition

                    </h2>

                    <p class="text-slate-500">

                        This action cannot be undone.

                    </p>

                </div>

            </div>

            <div class="mt-6 bg-slate-50 rounded-lg p-4">

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

                <button onclick="closeDeleteModal()" class="px-5 py-3 border rounded-lg">

                    Cancel

                </button>

                <form id="confirmDeleteForm" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg">Delete Permanently</button>
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
