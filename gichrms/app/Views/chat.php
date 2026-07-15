<?php
$contacts = $contacts ?? [];
$messages = $messages ?? [];
$currentUserId = (int) ($currentUserId ?? 0);
$activeContact = $activeContact ?? null;
$maxMessageLength = (int) ($maxMessageLength ?? 2000);

$initials = static function (?string $name): string {
    $name = trim((string) $name);

    if ($name === '') {
        return 'U';
    }

    $parts = preg_split('/\s+/', $name) ?: [];
    $letters = '';

    foreach (array_slice($parts, 0, 2) as $part) {
        $letters .= strtoupper(substr($part, 0, 1));
    }

    return $letters !== '' ? $letters : 'U';
};

$preview = static function (?array $message): string {
    if (!$message) {
        return 'No messages yet';
    }

    $text = trim((string) ($message['message'] ?? ''));

    if ($text === '') {
        return 'Message';
    }

    return strlen($text) > 42 ? substr($text, 0, 42) . '...' : $text;
};

$formatTime = static function (?string $date): string {
    if (!$date) {
        return '';
    }

    $timestamp = strtotime($date);

    if (!$timestamp) {
        return '';
    }

    if (date('Y-m-d', $timestamp) === date('Y-m-d')) {
        return date('h:i A', $timestamp);
    }

    return date('M d', $timestamp);
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | SuperAdmin HRMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .chat-scroll {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }

        .chat-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .chat-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        @media (max-width: 1023px) {
            .chat-shell {
                height: calc(100dvh - 154px);
                min-height: 540px;
            }

            .chat-contacts {
                flex: 0 0 230px;
            }
        }

        @media (max-width: 640px) {
            .chat-shell {
                height: calc(100dvh - 126px);
                min-height: 0;
            }

            .chat-contacts {
                flex-basis: 210px;
            }
        }
    </style>
</head>

<body class="bg-slate-50">
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <div class="flex h-screen overflow-hidden">
        <?php include __DIR__ . '/sidebar.php'; ?>

        <div class="flex-1 flex flex-col overflow-hidden">
            <?php include __DIR__ . '/navbar.php'; ?>

            <main class="flex-1 overflow-hidden p-3 sm:p-4 lg:p-6">
                <div class="mb-3 flex items-center justify-between gap-3 sm:mb-5">
                    <div>
                        <h1 class="text-xl font-semibold text-slate-900 sm:text-[26px]">Chat</h1>
                        <div class="mt-1 hidden items-center gap-2 text-sm text-slate-500 sm:flex">
                            <i data-lucide="house" class="h-4 w-4"></i>
                            <span>Applications</span>
                            <i data-lucide="chevron-right" class="h-4 w-4"></i>
                            <span class="font-medium text-slate-700">Chat</span>
                        </div>
                    </div>

                    <div class="inline-flex shrink-0 items-center gap-2 rounded-lg border border-slate-200 bg-white px-2.5 py-2 text-xs text-slate-600 sm:px-3 sm:text-sm">
                        <i data-lucide="messages-square" class="h-4 w-4 text-orange-500"></i>
                        <span><?= count($contacts) ?> contacts</span>
                    </div>
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <?= esc(session()->getFlashdata('error')) ?>
                    </div>
                <?php endif; ?>

                <section class="chat-shell flex min-h-0 flex-col gap-3 lg:grid lg:h-[calc(100vh-178px)] lg:grid-cols-[340px_minmax(0,1fr)] lg:gap-4">
                    <aside class="chat-contacts flex min-h-0 flex-col rounded-lg border border-slate-200 bg-white lg:h-auto">
                        <div class="border-b border-slate-200 p-3 sm:p-4">
                            <div class="mb-3 flex items-center justify-between sm:mb-4">
                                <h2 class="text-base font-semibold text-slate-900 sm:text-lg">Conversations</h2>
                                <span class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600">Team</span>
                            </div>

                            <div class="relative">
                                <i data-lucide="search" class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"></i>
                                <input id="contactSearch" type="search" placeholder="Search contacts"
                                    class="w-full rounded-lg border border-slate-200 py-2.5 pl-10 pr-3 text-sm outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                            </div>
                        </div>

                        <div id="contactList" class="chat-scroll min-h-0 flex-1 overflow-y-auto p-2 sm:p-3">
                            <?php if (empty($contacts)): ?>
                                <div class="flex h-full flex-col items-center justify-center px-6 text-center text-slate-500">
                                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                                        <i data-lucide="users" class="h-6 w-6"></i>
                                    </div>
                                    <p class="text-sm font-medium text-slate-700">No active contacts found</p>
                                    <p class="mt-1 text-xs">Active users will appear here.</p>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($contacts as $contact): ?>
                                <?php
                                $isActive = $activeContact && (int) $activeContact['id'] === (int) $contact['id'];
                                $unread = (int) ($contact['unread_count'] ?? 0);
                                $lastMessage = $contact['last_message'] ?? null;
                                ?>
                                <a href="<?= base_url('chat/' . $contact['id']) ?>"
                                    data-contact-name="<?= esc(strtolower(($contact['name'] ?? '') . ' ' . ($contact['email'] ?? '') . ' ' . ($contact['role'] ?? ''))) ?>"
                                    class="contact-item mb-2 flex items-center gap-3 rounded-lg border px-2.5 py-2.5 transition sm:px-3 sm:py-3 <?= $isActive ? 'border-orange-200 bg-orange-50' : 'border-transparent hover:border-slate-200 hover:bg-slate-50' ?>">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-slate-900 text-sm font-semibold text-white sm:h-11 sm:w-11">
                                        <?= esc($initials($contact['name'] ?? '')) ?>
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between gap-3">
                                            <p class="truncate text-sm font-semibold text-slate-900"><?= esc($contact['name'] ?? 'User') ?></p>
                                            <span class="shrink-0 text-[11px] text-slate-500"><?= esc($formatTime($lastMessage['created_at'] ?? null)) ?></span>
                                        </div>
                                        <div class="mt-1 flex items-center justify-between gap-3">
                                            <p class="truncate text-xs text-slate-500"><?= esc($preview($lastMessage)) ?></p>
                                            <?php if ($unread > 0): ?>
                                                <span class="flex h-5 min-w-5 shrink-0 items-center justify-center rounded-full bg-orange-500 px-1.5 text-[11px] font-semibold text-white">
                                                    <?= $unread > 99 ? '99+' : $unread ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </aside>

                    <section class="flex min-h-0 flex-1 flex-col rounded-lg border border-slate-200 bg-white">
                        <?php if ($activeContact): ?>
                            <header class="flex items-center justify-between gap-3 border-b border-slate-200 px-3 py-3 sm:px-4 sm:py-4 lg:px-5">
                                <div class="flex min-w-0 items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-slate-900 text-sm font-semibold text-white sm:h-11 sm:w-11">
                                        <?= esc($initials($activeContact['name'] ?? '')) ?>
                                    </div>
                                    <div class="min-w-0">
                                        <h3 class="truncate text-base font-semibold text-slate-900"><?= esc($activeContact['name'] ?? 'User') ?></h3>
                                        <p class="truncate text-xs text-slate-500">
                                            <?= esc(($activeContact['position'] ?? '') ?: ($activeContact['role'] ?? 'Team member')) ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <?php if (!empty($activeContact['email'])): ?>
                                        <a href="mailto:<?= esc($activeContact['email']) ?>"
                                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:border-orange-200 hover:bg-orange-50 hover:text-orange-600"
                                            title="Email contact">
                                            <i data-lucide="mail" class="h-4 w-4"></i>
                                        </a>
                                    <?php endif; ?>
                                    <button type="button" class="hidden h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 sm:inline-flex" title="Conversation options">
                                        <i data-lucide="more-vertical" class="h-4 w-4"></i>
                                    </button>
                                </div>
                            </header>

                            <div id="messageList" class="chat-scroll min-h-0 flex-1 overflow-y-auto bg-slate-50 px-3 py-4 sm:px-4 sm:py-5 lg:px-6">
                                <?php if (empty($messages)): ?>
                                    <div class="flex h-full flex-col items-center justify-center text-center text-slate-500">
                                        <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-white text-slate-500 shadow-sm">
                                            <i data-lucide="message-circle-plus" class="h-6 w-6"></i>
                                        </div>
                                        <p class="text-sm font-medium text-slate-700">Start the conversation</p>
                                        <p class="mt-1 text-xs">Send the first message to <?= esc($activeContact['name'] ?? 'this contact') ?>.</p>
                                    </div>
                                <?php endif; ?>

                                <div class="space-y-4">
                                    <?php foreach ($messages as $message): ?>
                                        <?php $isMine = (int) $message['sender_id'] === $currentUserId; ?>
                                        <div class="flex <?= $isMine ? 'justify-end' : 'justify-start' ?>">
                                            <div class="max-w-[88%] sm:max-w-[78%] lg:max-w-[640px]">
                                                <div class="break-words rounded-lg px-3 py-2.5 text-sm leading-6 shadow-sm sm:px-4 sm:py-3 <?= $isMine ? 'bg-orange-500 text-white' : 'border border-slate-200 bg-white text-slate-700' ?>">
                                                    <?= nl2br(esc($message['message'] ?? '')) ?>
                                                </div>
                                                <p class="mt-1 text-[11px] text-slate-500 sm:text-xs <?= $isMine ? 'text-right' : '' ?>">
                                                    <?= $isMine ? 'You' : esc($activeContact['name'] ?? 'Contact') ?>
                                                    <span class="mx-1">&bull;</span>
                                                    <?= esc(date('M d, h:i A', strtotime($message['created_at'] ?? 'now'))) ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <form action="<?= base_url('chat/send') ?>" method="post" class="border-t border-slate-200 bg-white p-3 sm:p-4">
                                <?= csrf_field() ?>
                                <input type="hidden" name="receiver_id" value="<?= esc($activeContact['id']) ?>">
                                <div class="flex items-end gap-2 sm:gap-3">
                                    <textarea name="message" rows="1" required maxlength="<?= esc($maxMessageLength) ?>" placeholder="Type your message"
                                        class="max-h-32 min-h-11 flex-1 resize-none rounded-lg border border-slate-200 px-3 py-3 text-sm outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100 sm:px-4"></textarea>
                                    <button type="submit"
                                        class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-orange-500 text-white transition hover:bg-orange-600"
                                        title="Send message">
                                        <i data-lucide="send" class="h-5 w-5"></i>
                                    </button>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="flex h-full flex-col items-center justify-center px-6 text-center text-slate-500">
                                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                                    <i data-lucide="message-square-text" class="h-7 w-7"></i>
                                </div>
                                <h3 class="text-base font-semibold text-slate-900">Select a conversation</h3>
                                <p class="mt-2 max-w-sm text-sm">Choose an active contact from the left to read messages and send a reply.</p>
                            </div>
                        <?php endif; ?>
                    </section>
                </section>
            </main>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        const overlay = document.getElementById('sidebarOverlay');

        if (overlay) {
            overlay.addEventListener('click', function () {
                const sidebar = document.getElementById('sidebar');

                if (sidebar) {
                    sidebar.classList.add('-translate-x-full');
                }

                this.classList.add('hidden');
            });
        }

        const searchInput = document.getElementById('contactSearch');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const term = this.value.trim().toLowerCase();

                document.querySelectorAll('.contact-item').forEach(function (item) {
                    const name = item.getAttribute('data-contact-name') || '';
                    item.classList.toggle('hidden', term !== '' && !name.includes(term));
                });
            });
        }

        const messageList = document.getElementById('messageList');

        if (messageList) {
            messageList.scrollTop = messageList.scrollHeight;
        }
    </script>
</body>

</html>
