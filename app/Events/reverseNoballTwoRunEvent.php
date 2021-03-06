<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class reverseNoballTwoRunEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $request;
    public $previous_ball;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request,$previous_ball)
    {
        $this->request = $request;
        $this->previous_ball = $previous_ball;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
