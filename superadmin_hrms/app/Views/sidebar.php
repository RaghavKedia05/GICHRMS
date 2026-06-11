<?php
$currentPage = service('uri')->getSegment(1);

if (empty($currentPage)) {
    $currentPage = 'dashboard';
}
?>

<aside class="w-[240px] bg-white border-r border-slate-200 min-h-screen">

    <!-- Header -->
    <a href="/dashboard"
        class="h-[72px] flex items-center px-4 border-b border-slate-200">

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

        <a href="/dashboard"
            class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'dashboard')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="home" class="w-3.5 h-3.5"></i>
                <span class="text-[13px] font-semibold">
                    Dashboards
                </span>
            </div>

            <i data-lucide="chevron-right" class="w-4 h-4"></i>

        </a>


        <!-- Companies -->
        <h6 class="px-1 mt-6 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Companies
        </h6>

        <a href="/companies"
            class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'companies')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
                <span class="text-[13px] font-semibold">
                    Companies
                </span>
            </div>

            <i data-lucide="chevron-right" class="w-4 h-4"></i>

        </a>


        <!-- Finance -->
        <h6 class="px-2 mt-6 mb-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">
            Finance
        </h6>

        <!-- Subscriptions -->
        <a href="/subscriptions"
            class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'subscriptions')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="crown" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Subscriptions
                </span>
            </div>

            <i data-lucide="chevron-right" class="w-4 h-4"></i>

        </a>

        <!-- Purchase Transaction -->
        <a href="/purchase_transaction"
            class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'purchase_transaction')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Purchase Transaction
                </span>
            </div>

            <i data-lucide="chevron-right" class="w-4 h-4"></i>

        </a>

        <!-- Packages -->
         <a href="/packages"
            class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'packages')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="gem" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Packages
                </span>
            </div>

            <i data-lucide="chevron-right" class="w-4 h-4"></i>

        </a>

        <!-- Suport Ticket -->
         <a href="/support_ticket"
            class="group flex items-center justify-between gap-3 px-4 py-3 rounded-md mt-4
            <?= ($currentPage == 'support_ticket')
                ? 'bg-slate-200 text-slate-800'
                : 'text-slate-800 hover:bg-slate-200'; ?>">

            <div class="flex items-center gap-2.5">
                <i data-lucide="ticket" class="w-4 h-4"></i>
                <span class="text-[13px] font-semibold">
                    Support Ticket
                </span>
            </div>

            <i data-lucide="chevron-right" class="w-4 h-4"></i>

        </a>


    </nav>

</aside>