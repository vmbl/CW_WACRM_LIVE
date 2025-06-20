<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Message;

class MessageSent implements ShouldBroadcast
{
    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        // Send to a private channel like chat.2, chat.3 etc.
        return new PrivateChannel('chat.' . $this->message->receiver_id);
    }

    public function broadcastAs()
    {
        return 'MessageSent';
    }
}
