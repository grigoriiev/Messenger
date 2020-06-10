<?php

namespace App\Policies;

use App\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Message $message)
    {
        return $user->id == $message->user_id;
    }

    public function update(User $user, Message $message)
    {
        return $user->id == $message->user_id;
    }

    public function destroy(User $user, Message  $message)
    {
        return $user->id == $message->user_id;
    }
}
