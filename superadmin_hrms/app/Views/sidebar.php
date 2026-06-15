<?php
$currentPage = service('uri')->getSegment(2);

if (empty($currentPage)) {
    $currentPage = service('uri')->getSegment(1);
}

if (empty($currentPage)) {
    $currentPage = 'dashboard';
}
?>

<aside class="w-[240px] bg-white border-r border-slate-200 min-h-screen">

    <!-- Header -->
    <a href="/dashboard" class="h-[72px] flex items-center px-4 border-b border-slate-200">

        <h2 class="text-xl font-semibold text-slate-900">
            SuperAdmin HRMS
        </h2>

    </a>

    <!-- Navigation -->
    <nav class="px-3 py-3 overflow-y-auto h-[calc(100vh-72px)]">

        <!-- Dashboard -->
        <h6 class="px-1 mt-4 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Dashboard
        </h6>

        <a href="/dashboard" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'dashboard')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="home" class="w-3.5 h-3.5"></i>
                <span class="text-[13px] font-semibold">
                    Dashboards
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>


        <!-- Companies -->
        <h6 class="px-1 mt-6 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Companies
        </h6>

        <a href="/companies" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'companies')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
                <span class="text-[13px] font-semibold">
                    Companies
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>


        <!-- Finance -->
        <h6 class="px-2 mt-6 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Finance
        </h6>

        <!-- Subscriptions -->
        <a href="/subscriptions" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'subscriptions')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="crown" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Subscriptions
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <!-- Purchase Transaction -->
        <a href="/purchase_transaction" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'purchase_transaction')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Purchase Transaction
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <!-- Packages -->
        <a href="/packages" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'packages')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="gem" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Packages
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <!-- Suport Ticket -->
        <a href="/support_ticket" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'support_ticket')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="ticket" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Support Ticket
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <!-- Reports -->
        <div class="mt-4">

            <?php
            $isReportPage =
                $currentPage == 'expense_report' ||
                $currentPage == 'invoice_report' ||
                $currentPage == 'payment_report' ||
                $currentPage == 'project_report';
            ?>

            <!-- Parent Menu -->
            <button onclick="toggleReportMenu()" class="w-full flex items-center justify-between px-4 py-3 rounded-md
        <?= $isReportPage
            ? 'bg-slate-200 text-slate-800'
            : 'text-slate-800 hover:bg-slate-200'; ?>">

                <div class="flex items-center gap-2.5">
                    <i data-lucide="file-text" class="w-4 h-4"></i>

                    <span class="text-[13px] font-semibold">
                        Reports
                    </span>
                </div>

                <i id="reportArrow" data-lucide="chevron-down"
                    class="w-4 h-4 transition-transform duration-300 <?= $isReportPage ? 'rotate-180' : ''; ?>">
                </i>

            </button>

            <!-- Sub Menu -->
            <div id="reportMenu" class="<?= $isReportPage ? '' : 'hidden'; ?> ml-7 mt-2 border-l border-slate-200">

                <a href="/Reports/expense_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'expense_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    Expense Report
                </a>

                <a href="/Reports/invoice_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'invoice_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    Invoice Report
                </a>

                <a href="/Reports/user_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'user_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    User Report
                </a>

                <a href="/Reports/employee_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'employee_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    Employee Report
                </a>

                <a href="/Reports/payslip_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'payslip_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    Payslip Report
                </a>

            </div>

        </div>






    </nav>

    <script>
        function toggleReportMenu() {
            const menu = document.getElementById('reportMenu');
            const arrow = document.getElementById('reportArrow');

            menu.classList.toggle('hidden');

            arrow.classList.toggle('rotate-180');

            lucide.createIcons();
        }
    </script>

</aside>