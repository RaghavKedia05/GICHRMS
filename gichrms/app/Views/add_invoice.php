<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Invoice</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50">

    <div
        id="sidebarOverlay"
        class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
    </div>

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <?php include __DIR__ . '/sidebar.php'; ?>

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Navbar -->
            <?php include __DIR__ . '/navbar.php'; ?>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-5">

                <div class="max-w-7xl mx-auto w-full">

                    <!-- Back -->
                    <a href="<?= base_url('/invoice') ?>"
                        class="inline-flex items-center gap-2 text-sm font-medium mb-5 hover:text-orange-500">
                        <i data-lucide="arrow-left-circle" class="w-4 h-4"></i>
                        Back to List
                    </a>

                    <!-- Card -->
                    <div class="bg-white border rounded-lg shadow-sm p-4 md:p-6">

                        <!-- Top Actions -->
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">

                            <div>
                                <h2 class="text-2xl font-semibold text-slate-800">
                                    Add Invoice
                                </h2>
                            </div>

                            <div class="flex flex-wrap items-center gap-4">

                                <button class="text-orange-500 text-sm font-medium hover:underline">
                                    Preview
                                </button>

                                <button class="flex items-center gap-2 text-sm font-medium hover:text-orange-500">
                                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                                    Edit Details
                                </button>

                            </div>

                        </div>

                        <!-- From Section -->
                        <div class="border rounded-lg p-4 md:p-5 mb-6 bg-slate-50">

                            <h3 class="font-semibold text-slate-800 mb-4">
                                From
                            </h3>

                            <h4 class="text-xl font-semibold text-slate-800">
                                Thomas Lawler
                            </h4>

                            <div class="text-sm text-slate-500 space-y-1 mt-2">
                                <p>2077 Chicago Avenue Orosi, CA 93647</p>
                                <p>Email : Tarala2445@example.com</p>
                                <p>Phone : +1 987 654 3210</p>
                            </div>

                        </div>

                        <!-- Invoice Details -->
                        <div class="mb-8">

                            <h3 class="text-lg font-semibold text-slate-800 mb-4">
                                Invoice Details
                            </h3>

                            <div class="space-y-4 md:space-y-5">

                                <div>
                                    <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                        Invoice Title
                                    </label>

                                    <input type="text"
                                        class="w-full border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5">

                                    <div>
                                        <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                            Invoice No
                                        </label>

                                        <input type="text"
                                            class="w-full border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    </div>

                                    <div>
                                        <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                            Invoice Date
                                        </label>

                                        <input type="date"
                                            class="w-full border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    </div>

                                    <div>
                                        <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                            Due Date
                                        </label>

                                        <input type="date"
                                            class="w-full border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Payment Details -->
                        <div class="mb-8">

                            <h3 class="text-lg font-semibold text-slate-800 mb-4">
                                Payment Details
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-5">

                                <div>
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-2">

                                        <label class="text-sm font-medium">
                                            Customer
                                        </label>

                                        <button class="text-orange-500 text-sm">
                                            + Add New
                                        </button>

                                    </div>

                                    <input type="text" class="w-full border rounded-md px-4 py-3">
                                </div>

                                <div>
                                    <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                        Reference Number
                                    </label>

                                    <input type="text" class="w-full border rounded-md px-4 py-3">
                                </div>

                                <div>
                                    <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                        Select Payment Type
                                    </label>

                                    <select class="w-full border rounded-md px-4 py-3">
                                        <option>Select</option>
                                        <option>Cash</option>
                                        <option>Bank Transfer</option>
                                        <option>Card</option>
                                        <option>UPI</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                        Bank Details
                                    </label>

                                    <select class="w-full border rounded-md px-4 py-3">
                                        <option>Select</option>
                                        <option>HDFC Bank</option>
                                        <option>ICICI Bank</option>
                                        <option>SBI</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <!-- Add Items -->
                        <div class="mb-8">

                            <h3 class="text-lg font-semibold text-slate-800 mb-4">
                                Add Items
                            </h3>

                            <div class="border rounded-lg p-5">

                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-5 items-end">

                                    <div class="md:col-span-6">
                                        <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                            Description
                                        </label>

                                        <input type="text" class="w-full border rounded-md px-4 py-3">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                            Qty
                                        </label>

                                        <input type="number" class="w-full border rounded-md px-4 py-3">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                            Discount
                                        </label>

                                        <input type="number" class="w-full border rounded-md px-4 py-3">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                            Rate
                                        </label>

                                        <input type="number" class="w-full border rounded-md px-4 py-3">
                                    </div>

                                </div>

                                <button class="mt-5 text-orange-500 text-sm font-medium">
                                    + Add New
                                </button>

                            </div>

                        </div>

                        <!-- Additional Details -->
                        <div class="mb-8">

                            <h3 class="text-lg font-semibold text-slate-800 mb-4">
                                Additional Details
                            </h3>

                            <div class="space-y-4 md:space-y-5">

                                <div>
                                    <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                        Description
                                    </label>

                                    <textarea rows="4"
                                        class="w-full border rounded-md px-4 py-3 resize-none"></textarea>
                                </div>

                                <div>
                                    <label class="text-[13px] font-medium text-slate-700 block mb-1.5">
                                        Notes
                                    </label>

                                    <textarea rows="4"
                                        class="w-full border rounded-md px-4 py-3 resize-none"></textarea>
                                </div>

                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row sm:justify-end gap-3">

                            <button
                                class="flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-800 transition">
                                <i data-lucide="save" class="w-4 h-4"></i>
                                Save as Draft
                            </button>

                            <button
                                class="flex items-center justify-center gap-2 px-5 py-2.5 bg-orange-500 text-white text-sm font-medium rounded-md hover:bg-orange-600 transition">
                                <i data-lucide="send" class="w-4 h-4"></i>
                                Save & Send
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        document
            .getElementById('sidebarOverlay')
            .addEventListener('click', function () {

                document
                    .getElementById('sidebar')
                    .classList.add('-translate-x-full');

                this.classList.add('hidden');
            });
    </script>

</body>

</html>