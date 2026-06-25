<?php
$currentPage = service('uri')->getSegment(2);

if (empty($currentPage)) {
    $currentPage = service('uri')->getSegment(1);
}

if (empty($currentPage)) {
    $currentPage = 'dashboard';
}
?>

<aside id="sidebar"
    class="
    fixed lg:static
    top-0 left-0
    z-50
    w-[260px] lg:w-[240px]
    h-screen
    bg-white
    border-r border-slate-200
    shadow-xl lg:shadow-none
    flex flex-col
    transition-transform duration-300
    -translate-x-full
    lg:translate-x-0">

    <!-- Header -->
    <a href="/dashboard" class="h-[72px] flex items-center px-3 lg:px-4 border-b border-slate-200">

        <h2 class="text-3xl lg:text-4xl font-bold text-blue-500">
            GIC<span class="text-slate-800">HRMS</span>
        </h2>

    </a>

    <!-- Navigation -->
    <nav class="flex-1 min-h-0 overflow-y-auto [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden px-2 lg:px-3 py-3">

        <!-- Dashboard -->
        <h6 class="px-1 mt-4 mb-2 text-[10px] lg:text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Dashboard
        </h6>

        <a href="/dashboard" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'dashboard')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="home" class="w-3.5 h-3.5"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
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

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
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

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="crown" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
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

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
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

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="gem" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
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

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="ticket" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
                    Support Ticket
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <!-- Reports -->
        <h6 class="px-1 mt-4 mb-2 text-[10px] lg:text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Reports
        </h6>
        <div class="mt-4">

            <?php
            $isReportPage =
                $currentPage == 'expense_report' ||
                $currentPage == 'invoice_report' ||
                $currentPage == 'user_report' ||
                $currentPage == 'employee_report' ||
                $currentPage == 'payslip_report' ||
                $currentPage == 'attendance_report' ||
                $currentPage == 'leave_report' ||
                $currentPage == 'daily_report';
            ?>

            <!-- Parent Menu -->
            <button onclick="toggleReportMenu()" class="w-full flex items-center justify-between px-4 py-3 rounded-md
        <?= $isReportPage
            ? 'bg-slate-200 text-slate-800'
            : 'text-slate-800 hover:bg-slate-200'; ?>">

                <div class="flex items-center gap-2 lg:gap-2.5">
                    <i data-lucide="file-text" class="w-4 h-4"></i>

                    <span class="text-xs lg:text-[13px] font-semibold">
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

                <a href="/Reports/attendance_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'attendance_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    Attendance Report
                </a>

                <a href="/Reports/leave_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'leave_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    Leave Report
                </a>

                <a href="/Reports/daily_report" class="block pl-4 py-2 text-xs
            <?= ($currentPage == 'daily_report')
                ? 'text-orange-500 font-medium'
                : 'text-slate-600 hover:text-orange-500'; ?>">
                    Daily Report
                </a>

            </div>

        </div>

        <h6 class="px-1 mt-4 mb-2 text-[10px] lg:text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Billing
        </h6>

        <a href="/invoice" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'invoice')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="receipt" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
                    Invoice
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <h6 class="px-1 mt-4 mb-2 text-[10px] lg:text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Support
        </h6>

        <a href="/chat" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'chat')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
                    Chat
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <h6 class="px-1 mt-4 mb-2 text-[10px] lg:text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Attendance
        </h6>

        <a href="/employee_attendance" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'employee_attendance')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="calendar-check-2" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
                    Employee Attendance
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <a href="/performance_review" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'performance_review')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="user-check" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
                    Performance Review
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>

        <h6 class="px-1 mt-4 mb-2 text-[10px] lg:text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Recruitment
        </h6>

        <a href="/Recruitment/jobs" class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'jobs')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2 lg:gap-2.5">
                <i data-lucide="calendar-check-2" class="w-4 h-4"></i>
                <span class="text-xs lg:text-[13px] font-semibold">
                    Job Openings
                </span>
            </div>

            <i data-lucide="chevron-down" class="w-4 h-4"></i>

        </a>
        






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