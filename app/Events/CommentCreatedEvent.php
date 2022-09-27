<?php

namespace App\Events;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $commentor;
    public $post;
    public $comment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $commentor, Post $post, Comment $comment)
    {
        $this->commentor = $commentor;
        $this->post = $post;
        $this->comment = $comment;
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
