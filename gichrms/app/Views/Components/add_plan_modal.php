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
    <!-- Add Plan Modal -->
    <div id="addPlanModal" class="fixed inset-0 bg-black/50 z-[200] hidden items-center justify-center">

        <div class="bg-white w-[90%] max-w-3xl max-h-[95vh] overflow-y-auto rounded shadow-xl scrollbar-hide">

            <!-- Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-xl font-semibold text-slate-800">
                    Add New Plan
                </h2>

                <button onclick="closeAddPlanModal()" class="text-gray-500 hover:text-red-500 text-xl">
                    ✖
                </button>
            </div>

            <!-- Body -->
            <div class="p-5">

                <!-- Upload Section -->
                <div class="bg-gray-100 px-6 py-3 rounded mb-6 flex items-center gap-6">
                    <img src="<?= base_url('assets/profile.png') ?>" class="w-16 h-16 rounded-full object-cover">

                    <div>
                        <h4 class="font-semibold text-sm">
                            Upload Profile Image
                        </h4>

                        <p class="text-gray-500 text-xs">
                            Image should be below 4 mb
                        </p>

                        <div class="mt-2 flex gap-2">
                            <button class="bg-orange-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                Upload
                            </button>

                            <button class="bg-white border px-3 py-1 rounded text-xs font-semibold">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Form Grid -->
                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <label class="font-semibold text-sm text-slate-700">Plan Name *</label>
                        <input type="text" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                    <div>
                        <label class="font-semibold text-sm text-slate-700">Plan Type *</label>
                        <select class="w-full h-10 border border-slate-300 rounded-md px-1 text-sm focus:outline-none">
                            <option>Monthly</option>
                            <option>Yearly</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold text-sm text-slate-700">Plan Position *</label>
                        <input type="number" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                    <div>
                        <label class="font-semibold text-sm text-slate-700">Plan Currency *</label>
                        <select class="w-full h-10 border border-slate-300 rounded-md px-1 text-sm focus:outline-none">
                            <option>USD</option>
                            <option>INR</option>
                        </select>
                    </div>

                    <div>
                        <div class="flex justify-between items-center">
                            <label class="font-semibold text-sm text-slate-700 text-slate-700">
                                Plan Price *
                            </label>

                            <span class="text-orange-500 text-sm">
                                Set 0 for free
                            </span>
                        </div>

                        <select class="w-full h-10 border border-slate-300 rounded-md px-1 text-sm focus:outline-none">
                            <option>Fixed</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-[1fr_180px] gap-6">
                        <div>
                            <label class="font-semibold text-sm text-slate-700">
                                Discount Type *
                            </label>

                            <select class="w-full h-10 border border-slate-300 rounded-md px-1 text-sm focus:outline-none">
                                <option>Fixed</option>
                                <option>Percentage</option>
                            </select>
                        </div>

                        <div>
                            <label class="font-semibold text-sm text-slate-700">
                                Discount *
                            </label>

                            <input type="text" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold text-sm text-slate-700">Price *</label>
                        <input type="number" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                    <div>
                        <label class="font-semibold text-sm text-slate-700">Discount *</label>
                        <input type="number" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                </div>

                <div class="grid grid-cols-4 gap-6 mt-6 py-1">

                    <div>
                        <label class="font-semibold text-sm text-slate-700">Limitations Invoices</label>
                        <input type="text" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                    <div >
                        <label class="font-semibold text-sm text-slate-700">Max Customers</label>
                        <input type="text" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                    <div >
                        <label class="font-semibold text-sm text-slate-700">Product</label>
                        <input type="text" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                    <div >
                        <label class="font-semibold text-sm text-slate-700">Supplier</label>
                        <input type="text" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                    </div>

                </div>

                <div class="mt-6">

                    <div class="flex justify-between mb-4 py-1">
                        <h3 class="font-bold text-sm text-slate-700">
                            Plan Modules
                        </h3>

                        <label class="flex items-center gap-2 font-bold text-sm text-slate-700">
                            <input type="checkbox" class="w-3 h-3 border-slate-300 rounded">
                            <span>Select All</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-4 gap-y-4 font-semibold text-sm text-slate-700 p-1">

                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Employees</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Invoices</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Reports</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Contacts</label>

                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Clients</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Estimates</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Goals</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Deals</label>

                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Projects</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Payments</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Assets</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Leads</label>

                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Tickets</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Taxes</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Activities</label>
                        <label><input type="checkbox" class="w-3 h-3 border-slate-300 rounded"> Pipelines</label>

                    </div>

                </div>

                <!-- Trial & Status Section -->
                <div class="mt-6">

                    <!-- Access Trial -->
                    <div class="mb-6 flex items-center gap-3">
                        <span class="font-semibold text-sm text-slate-700">
                            Access Trial
                        </span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="w-3 h-3 sr-only peer text-orange-500 border-slate-300 rounded">

                            <div
                                class="w-10 h-5 bg-gray-300 rounded-full transition-colors duration-200 peer-checked:bg-orange-400">
                            </div>

                            <span
                                class="absolute left-0.5 top-0.5 h-4 w-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></span>
                        </label>
                    </div>

                    <!-- Trial Days -->
                    <div class="grid grid-cols-3 gap-8">

                        <!-- Trial Days -->
                        <div>
                            <label class="block mb-2 font-semibold text-sm text-slate-700 text-slate-700">
                                Trial Days
                            </label>

                            <input type="text" class="w-full h-10 border border-slate-300 rounded-md px-2 text-sm focus:outline-none">
                        </div>

                        <!-- Recommended -->
                        <div>
                            <label class="block mb-2 text-slate-700">
                                Is Recommended
                            </label>

                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="w-3 h-3 sr-only peer text-orange-500 border-slate-300 rounded">

                                <div
                                    class="w-10 h-5 bg-gray-300 rounded-full transition-colors duration-200 peer-checked:bg-orange-400">
                                </div>

                                <span
                                    class="absolute left-0.5 top-0.5 h-4 w-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></span>
                            </label>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block mb-2 font-semibold text-sm text-slate-700 text-slate-700">
                                Status <span class="text-red-500">*</span>
                            </label>

                            <select class="w-full h-10 border border-slate-300 rounded-md px-1 text-sm focus:outline-none">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>

                    </div>

                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label class="font-semibold text-sm text-slate-700">Description</label>

                    <textarea rows="4" class="w-full h-24 border border-slate-300 rounded-md px-2 py-2 mt-2 focus:outline-none text-sm"></textarea>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-4 px-8 py-4 border-t bg-slate-50">

                <button onclick="closeAddPlanModal()" class="px-6 py-3 border rounded">
                    Cancel
                </button>

                <button class="bg-orange-500 text-white px-6 py-3 rounded">
                    Add Plan
                </button>

            </div>

        </div>
    </div>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>




</body>

</html>
