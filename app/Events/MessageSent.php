<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public string $name,
        public string $text,
        // public User $user,
        public string $chatRoomId,
    )
    {
        $this->chatRoomId = $chatRoomId;    
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // return [
        //     // new PrivateChannel('chatroom.'.$this->user->id),
        //     new Channel('chatroom'),
        // ];

        // if ($this->chatRoomId) {
            return [new PrivateChannel('chatroom.123')];
        // } else {
        //     return [new Channel('chatroom')];
        // }
    }
}
