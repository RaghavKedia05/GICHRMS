<?php

namespace App\Controllers;

use App\Models\ChatMessageModel;
use App\Models\UserModel;

class ChatController extends BaseController
{
    private const MAX_MESSAGE_LENGTH = 2000;

    private UserModel $userModel;

    private ChatMessageModel $messageModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->messageModel = new ChatMessageModel();
    }

    public function index()
    {
        return $this->showConversation(null);
    }

    public function conversation($id)
    {
        return $this->showConversation((int) $id);
    }

    public function send()
    {
        $userId = (int) session('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        $receiverId = (int) $this->request->getPost('receiver_id');
        $message = trim((string) $this->request->getPost('message'));

        if (!$receiverId || $receiverId === $userId || $message === '') {
            return redirect()->to('/chat' . ($receiverId ? '/' . $receiverId : ''))
                ->with('error', 'Please select a contact and enter a message.');
        }

        if (strlen($message) > self::MAX_MESSAGE_LENGTH) {
            return redirect()->to('/chat/' . $receiverId)
                ->with('error', 'Messages must be 2,000 characters or fewer.');
        }

        $receiver = $this->userModel
            ->where('id', $receiverId)
            ->where('is_active', 1)
            ->first();

        if (!$receiver) {
            return redirect()->to('/chat')
                ->with('error', 'Selected contact is not available.');
        }

        $this->messageModel->insert([
            'sender_id' => $userId,
            'receiver_id' => $receiverId,
            'message' => $message,
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/chat/' . $receiverId);
    }

    public function messages($contactId)
    {
        $userId = (int) session('user_id');

        if (!$userId) {
            return $this->response->setStatusCode(401)
                ->setJSON(['error' => 'Unauthorized']);
        }

        $contactId = (int) $contactId;
        $contact = $this->findContact($contactId, $userId);

        if (!$contact) {
            return $this->response->setStatusCode(404)
                ->setJSON(['error' => 'Contact not found']);
        }

        $this->messageModel->markConversationRead($contactId, $userId);

        return $this->response->setJSON([
            'messages' => $this->messageModel->getConversation($userId, $contactId),
        ]);
    }

    private function showConversation(?int $contactId)
    {
        $userId = (int) session('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        $contacts = $this->getContacts($userId);
        $activeContact = null;

        if (!$contactId && !empty($contacts)) {
            $contactId = (int) $contacts[0]['id'];
        }

        if ($contactId) {
            $activeContact = $this->findContact($contactId, $userId);

            if (!$activeContact) {
                return redirect()->to('/chat')
                    ->with('error', 'Selected contact is not available.');
            }
        }

        if ($activeContact) {
            $this->messageModel->markConversationRead((int) $activeContact['id'], $userId);
        }

        return view('chat', [
            'contacts' => $contacts,
            'activeContact' => $activeContact,
            'messages' => $activeContact
                ? $this->messageModel->getConversation($userId, (int) $activeContact['id'])
                : [],
            'currentUserId' => $userId,
            'maxMessageLength' => self::MAX_MESSAGE_LENGTH,
        ]);
    }

    private function getContacts(int $userId): array
    {
        $users = $this->userModel
            ->where('id !=', $userId)
            ->where('is_active', 1)
            ->orderBy('name', 'ASC')
            ->findAll();

        foreach ($users as &$user) {
            $lastMessage = $this->messageModel->getLastMessageBetween($userId, (int) $user['id']);
            $user['last_message'] = $lastMessage;
            $user['unread_count'] = $this->messageModel->countUnreadFrom((int) $user['id'], $userId);
        }

        unset($user);

        usort($users, static function ($first, $second) {
            $firstDate = $first['last_message']['created_at'] ?? '';
            $secondDate = $second['last_message']['created_at'] ?? '';

            return strcmp($secondDate, $firstDate);
        });

        return $users;
    }

    private function findContact(int $contactId, int $userId): ?array
    {
        if ($contactId === $userId) {
            return null;
        }

        return $this->userModel
            ->where('id', $contactId)
            ->where('is_active', 1)
            ->first();
    }
}
