<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatMessageModel extends Model
{
    protected $table = 'chat_messages';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'sender_id',
        'receiver_id',
        'message',
        'is_read',
        'created_at',
    ];

    protected $useTimestamps = false;

    public function getConversation(int $userId, int $contactId): array
    {
        return $this->groupStart()
                ->where('sender_id', $userId)
                ->where('receiver_id', $contactId)
            ->groupEnd()
            ->orGroupStart()
                ->where('sender_id', $contactId)
                ->where('receiver_id', $userId)
            ->groupEnd()
            ->orderBy('created_at', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    public function getLastMessageBetween(int $userId, int $contactId): ?array
    {
        return $this->groupStart()
                ->where('sender_id', $userId)
                ->where('receiver_id', $contactId)
            ->groupEnd()
            ->orGroupStart()
                ->where('sender_id', $contactId)
                ->where('receiver_id', $userId)
            ->groupEnd()
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->first();
    }

    public function countUnreadFrom(int $senderId, int $receiverId): int
    {
        return $this->where('sender_id', $senderId)
            ->where('receiver_id', $receiverId)
            ->where('is_read', 0)
            ->countAllResults();
    }

    public function markConversationRead(int $senderId, int $receiverId): void
    {
        $this->where('sender_id', $senderId)
            ->where('receiver_id', $receiverId)
            ->where('is_read', 0)
            ->set(['is_read' => 1])
            ->update();
    }
}
