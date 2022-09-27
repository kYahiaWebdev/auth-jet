<?php

namespace App\Listeners;

use App\Events\CommentCreatedEvent;
use App\Notifications\CommentPostedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentCreatedEvent  $event
     * @return void
     */
    public function handle(CommentCreatedEvent $event)
    {
        // dd($event->comment);
        $event->commentor->notify(new CommentPostedNotification($event->commentor, $event->post, $event->comment));
    }
}
