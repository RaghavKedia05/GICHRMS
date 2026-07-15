<?php
$toastSuccess = $toastSuccess ?? null;
$toastError = $toastError ?? null;
$toastErrors = $toastErrors ?? [];

if (!is_array($toastErrors)) {
    $toastErrors = [$toastErrors];
}

$toastMessage = $toastSuccess ?: $toastError;
$toastType = $toastSuccess ? 'success' : 'error';
$toastItems = array_filter($toastErrors);

if (!$toastMessage && !empty($toastItems)) {
    $toastMessage = 'Please review the highlighted form details.';
    $toastType = 'error';
}
?>

<?php if ($toastMessage): ?>
    <div id="flashToast"
        role="status" aria-live="polite"
        class="pointer-events-none fixed right-4 top-5 z-[9999] w-[calc(100%-2rem)] max-w-md translate-x-[120%] opacity-0 transition-all duration-500 ease-out sm:right-6">
        <div class="pointer-events-auto rounded-lg px-5 py-4 shadow-2xl ring-1 ring-black/5 <?= $toastType === 'success' ? 'bg-emerald-600 text-white' : 'bg-rose-600 text-white' ?>">
            <div class="flex items-start gap-3">
                <i data-lucide="<?= $toastType === 'success' ? 'check-circle' : 'alert-circle' ?>" class="mt-0.5 h-5 w-5 shrink-0"></i>
                <div class="min-w-0">
                    <p class="text-sm font-semibold"><?= esc($toastMessage) ?></p>
                    <?php if (!empty($toastItems)): ?>
                        <ul class="mt-2 list-disc space-y-1 pl-4 text-xs font-medium">
                            <?php foreach ($toastItems as $toastItem): ?>
                                <li><?= esc($toastItem) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toast = document.getElementById('flashToast');

            if (!toast) {
                return;
            }

            setTimeout(() => {
                toast.classList.remove('translate-x-[120%]', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            }, 100);

            setTimeout(() => {
                toast.classList.remove('translate-x-0', 'opacity-100');
                toast.classList.add('translate-x-[120%]', 'opacity-0');
            }, 3400);

            setTimeout(() => {
                toast.remove();
            }, 4000);
        });
    </script>
<?php endif; ?>
