<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body>
    <!-- Create Job Requisition Modal -->
    <div id="addJobModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 sm:p-6">

        <div
            class="bg-white rounded-md shadow-xl w-full max-w-[660px] max-h-[95vh] overflow-y-auto mx-2 sm:mx-0 scrollbar-hide">

            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-3 border-b border-slate-200">

                <h2 class="text-lg sm:text-[18px] font-semibold text-slate-800">
                    Create Job Requisition
                </h2>

                <button onclick="closeAddJobModal()">
                    <i data-lucide="x-circle" class="w-6 h-6 text-slate-500"></i>
                </button>

            </div>

            <!-- Body -->
            <div class="p-3 sm:p-4">

                <!-- Tabs -->
                <div class="flex gap-6 border-b border-slate-200 mb-4">

                    <button class="pb-2 text-[13px] font-medium text-orange-500 border-b-2 border-orange-500">
                        Basic Information
                    </button>

                    <button class="pb-2 text-[13px] font-medium text-slate-500">
                        Location
                    </button>

                </div>



                <!-- Job Title -->
                <div class="mb-3">

                    <label class="block text-[13px] font-medium text-slate-700 mb-1">
                        Job Title <span class="text-red-500">*</span>
                    </label>

                    <input type="text" class="w-full h-10 border border-slate-200 rounded px-3 text-sm">

                </div>

                <!-- Description -->
                <div class="mb-3">

                    <label class="block text-[13px] font-medium text-slate-700 mb-1">
                        Job Description <span class="text-red-500">*</span>
                    </label>

                    <textarea
                        class="w-full h-[70px] border border-slate-200 rounded px-3 py-2 text-sm resize-none"></textarea>

                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Job Category <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Job Type <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Job Level <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Experience <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Qualification <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Gender <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Min. Salary <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Max. Salary <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                            <option>Select</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Job Expired Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                    </div>

                    <div>
                        <label class="block text-[13px] font-medium mb-1">
                            Required Skills
                        </label>
                        <input type="text" class="w-full h-10 border border-slate-200 rounded px-3 text-sm">
                    </div>

                </div>

            </div>

            <!-- Footer -->
            <div class="border-t border-slate-200 px-4 py-3 flex flex-col-reverse sm:flex-row justify-end gap-3">

                <button type="button" onclick="closeAddJobModal()"
                    class="w-full sm:w-auto px-4 py-2 text-sm border border-slate-200 rounded">
                    Cancel
                </button>

                <button class="w-full sm:w-auto px-4 py-2 text-sm bg-orange-500 text-white rounded">
                    Save & Next
                </button>

            </div>

        </div>

    </div>
    <script>
        function openAddJobModal() {
            document.getElementById('addJobModal').classList.remove('hidden');
            document.getElementById('addJobModal').classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeAddJobModal() {
            document.getElementById('addJobModal').classList.add('hidden');
            document.getElementById('addJobModal').classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    </script>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <script>
        function closeAddJobModal() {
            document.getElementById('addJobModal').classList.add('hidden');
            document.getElementById('addJobModal').classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    </script>




</body>

</html>