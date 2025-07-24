<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserLoggedInEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public User $user;
    public string $emailAuthCode;
    /**
     * Create a new event instance.
     */
    public function __construct(User $user, string $emailAuthCode)
    {
        $this->user = $user;
        $this->emailAuthCode = $emailAuthCode;
    }


}
