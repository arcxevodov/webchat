<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;

class AuthPolicy
{
    public function deleteMessage(User $user, Message $message): bool
    {
        return $user->id === $message->user_id;
    }

    public function editMessage(User $user, Message $message): bool
    {
        return $user->id === $message->user_id;
    }
}
