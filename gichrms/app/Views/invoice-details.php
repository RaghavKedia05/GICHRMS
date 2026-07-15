<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>

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

    <!-- Lucide -->
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

        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Navbar -->
            <?php include __DIR__ . '/navbar.php'; ?>

            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto p-5">

                <!-- Header -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 mb-6">
                    <div>
                        <h1 class="text-2xl sm:text-[28px] font-semibold text-slate-800">
                            Invoices
                        </h1>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="house" class="w-4 h-4"></i>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span>Billing</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            <span class="text-slate-700">Invoices</span>
                        </div>
                    </div>

                    <button
                        class="w-full sm:w-auto flex items-center justify-center gap-2 px-4 py-2 bg-slate-900 text-white rounded-md text-sm hover:bg-slate-800">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        Download
                    </button>
                </div>

                

                    <div class="max-w-7xl mx-auto">

                        <!-- Back Button-->
                        <a href="<?= base_url('/invoice') ?>"
                            class="inline-flex items-center gap-2 text-sm font-medium mb-5 hover:text-orange-500">
                            <i data-lucide="arrow-left-circle" class="w-4 h-4"></i>
                            Back to List
                        </a>

                        <!-- Invoice Card -->
                        <div class="max-w-[1400px] mx-auto">

                            <div class="bg-white rounded-lg border shadow-sm overflow-hidden">

                                <div class="p-4 sm:p-6">


                                    <!-- Company Header -->
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-6 border-b pb-4">

                                        <div>
                                            <h2 class="text-2xl sm:text-3xl font-bold text-blue-500">
                                                GIC<span class="text-slate-800">HRMS</span>
                                            </h2>

                                            <p class="text-slate-500 text-sm mt-4">
                                                3099 Kennedy Court Framingham, MA 01702
                                            </p>
                                        </div>

                                        <div class="text-left md:text-right">
                                            <h3 class="text-lg font-semibold text-slate-700">
                                                Invoice No
                                                <span class="text-orange-500">
                                                    #INV0001
                                                </span>
                                            </h3>

                                            <p class="mt-2 text-slate-500 text-sm">
                                                Created Date :
                                                <span class="font-medium text-slate-700">
                                                    Sep 24, 2023
                                                </span>
                                            </p>

                                            <p class="mt-1 text-slate-500 text-sm">
                                                Due Date :
                                                <span class="font-medium text-slate-700">
                                                    Sep 30, 2023
                                                </span>
                                            </p>
                                        </div>

                                    </div>

                                    <!-- From / To / Status -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 py-4 border-b ">

                                        <!-- From -->
                                        <div>

                                            <h4 class="font-semibold text-slate-800 text-sm mb-2">
                                                From
                                            </h4>

                                            <h3 class="text-xl font-semibold text-slate-800">
                                                Thomas Lawler
                                            </h3>

                                            <p class="text-slate-500 text-sm mt-2">
                                                2077 Chicago Avenue Orosi, CA 93647
                                            </p>

                                            <p class="text-slate-500 text-sm mt-1">
                                                Email :
                                                <span class="text-slate-800">
                                                    Tarala2445@example.com</span>
                                            </p>

                                            <p class="text-slate-500 text-sm mt-1">
                                                Phone :
                                                <span class="text-slate-800">
                                                    +1 987 654 3210</span>
                                            </p>

                                        </div>

                                        <!-- To -->
                                        <div>

                                            <h4 class="font-semibold text-slate-800 text-sm mb-2">
                                                To
                                            </h4>

                                            <h3 class="text-xl font-semibold text-slate-800">
                                                Sara Inc.,
                                            </h3>

                                            <p class="text-slate-500 text-sm mt-2">
                                                3103 Trainer Avenue Peoria, IL 61602
                                            </p>

                                            <p class="text-slate-500 text-sm mt-1">
                                                Email :
                                                <span class="text-slate-800">
                                                    Sara_inc34@example.com</span>
                                            </p>

                                            <p class="text-slate-500 text-sm mt-1">
                                                Phone :
                                                <span class="text-slate-800">
                                                    +1 987 471 6589</span>
                                            </p>

                                        </div>

                                        <!-- Status -->
                                        <div>

                                            <h4 class="font-semibold text-slate-800 text-sm mb-3">
                                                Payment Status
                                            </h4>

                                            <span
                                                class="inline-flex items-center px-3 py-1 text-xs sm:text-sm bg-red-100 text-red-600 rounded-md text-sm font-semibold">
                                                Due in 10 Days
                                            </span>

                                            <div
                                                class="w-12 h-12 sm:w-14 sm:h-14 border-2 border-dashed border-slate-300 rounded-lg mt-6 flex items-center justify-center text-slate-400">
                                                QR
                                            </div>

                                        </div>

                                    </div>

                                    <!-- Invoice For -->
                                    <div class="py-4">

                                        <p class="text-slate-500 text-sm">
                                            Invoice For :
                                            <span class="font-medium text-slate-800">
                                                Design & Development of Website
                                            </span>
                                        </p>

                                        <!-- Table -->
                                        <div class="mt-6 overflow-x-auto">

                                            <table class="w-full min-w-[700px]">

                                                <thead class="bg-slate-100">
                                                    <tr class="h-10 text-sm font-semibold text-slate-700">

                                                        <th class="px-5 text-left">
                                                            Job Description
                                                        </th>

                                                        <th class="px-5 text-center">
                                                            Qty
                                                        </th>

                                                        <th class="px-5 text-right">
                                                            Cost
                                                        </th>

                                                        <th class="px-5 text-right">
                                                            Discount
                                                        </th>

                                                        <th class="px-5 text-right">
                                                            Total
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody class="divide-y divide-slate-200">

                                                    <?php
                                                    $items = [
                                                        ['UX Strategy', '1', '$500', '$100', '$500'],
                                                        ['Design System', '1', '$5000', '$100', '$5000'],
                                                        ['Brand Guidelines', '1', '$5000', '$100', '$5000'],
                                                        ['Social Media Template', '1', '$5000', '$100', '$5000']
                                                    ];

                                                    foreach ($items as $item):
                                                        ?>

                                                        <tr class="h-12">

                                                            <td class="px-5 font-medium text-slate-800 text-sm">
                                                                <?= $item[0] ?>
                                                            </td>

                                                            <td class="px-5 text-center text-slate-600 text-sm">
                                                                <?= $item[1] ?>
                                                            </td>

                                                            <td class="px-5 text-right text-slate-600 text-sm">
                                                                <?= $item[2] ?>
                                                            </td>

                                                            <td class="px-5 text-right text-slate-600 text-sm">
                                                                <?= $item[3] ?>
                                                            </td>

                                                            <td class="px-5 text-right font-medium text-slate-800 text-sm">
                                                                <?= $item[4] ?>
                                                            </td>

                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                    <!-- Terms + Totals -->
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 py-8 border-t border-b">

                                        <!-- Left -->
                                        <div>

                                            <h3 class="font-semibold text-slate-800 mb-3">
                                                Terms and Conditions
                                            </h3>

                                            <p class="text-slate-500">
                                                Please pay within 15 days from the date of invoice,
                                                overdue interest @ 14% will be charged on delayed payments.
                                            </p>

                                            <h3 class="font-semibold text-slate-800 mt-8 mb-3">
                                                Notes
                                            </h3>

                                            <p class="text-slate-500">
                                                Please quote invoice number when remitting funds.
                                            </p>

                                        </div>

                                        <!-- Right -->
                                        <div class="space-y-5">

                                            <div class="flex justify-between">
                                                <span class="text-slate-500">
                                                    Sub Total
                                                </span>
                                                <span class="font-semibold">
                                                    $5500
                                                </span>
                                            </div>

                                            <div class="flex justify-between">
                                                <span class="text-slate-500">
                                                    Discount (0%)
                                                </span>
                                                <span class="font-semibold">
                                                    $400
                                                </span>
                                            </div>

                                            <div class="flex justify-between">
                                                <span class="text-slate-500">
                                                    VAT (5%)
                                                </span>
                                                <span class="font-semibold">
                                                    $54
                                                </span>
                                            </div>

                                            <div class="flex justify-between pt-5 border-t">

                                                <span class="text-lg sm:text-2xl font-semibold text-slate-800">
                                                    Total Amount
                                                </span>

                                                <span class="text-2xl sm:text-3xl font-bold text-slate-800">
                                                    $5775
                                                </span>

                                            </div>

                                            <p class="text-sm text-slate-500">
                                                Amount in Words :
                                                Dollar Five Thousand Seven Hundred Seventy Five
                                            </p>

                                        </div>

                                    </div>

                                    <!-- Signature -->
                                    <div class="mt-24 border-b">

                                        <div class="text-left md:text-right">

                                            <h4 class="text-lg font-semibold text-slate-800">
                                                Ted M. Davis
                                            </h4>

                                            <p class="text-slate-500 text-sm mb-4">
                                                Assistant Manager
                                            </p>

                                        </div>

                                    </div>

                                    <!-- Footer -->
                                    <div class="py-4 text-center">

                                        <h2 class="text-2xl sm:text-3xl font-bold text-blue-500">
                                            GIC<span class="text-slate-800">HRMS</span>
                                        </h2>

                                        <p class="mt-2 text-slate-700 text-sm">
                                            Payment Made Via bank transfer / Cheque in the name of Thomas Lawler
                                        </p>

                                        <div class="flex flex-wrap justify-center gap-4 mt-2 text-xs text-slate-500">

                                            <p>Bank Name :
                                                <span class="text-slate-800">
                                                    HDFC Bank
                                                </span>
                                            </p>

                                            <p>Account Number :
                                                <span class="text-slate-800">
                                                    45366287987
                                                </span>
                                            </p>

                                            <p>IFSC :
                                                <span class="text-slate-800">
                                                    HDFC0018159
                                                </span>
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Bottom Buttons -->
                            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">

                                <button
                                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">
                                    <i data-lucide="printer" class="w-4 h-4"></i>
                                    Print Invoice
                                </button>

                                <button
                                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">
                                    <i data-lucide="copy" class="w-4 h-4"></i>
                                    Clone Invoice
                                </button>

                            </div>

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