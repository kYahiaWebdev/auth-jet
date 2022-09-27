<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $notifications;
    public function __construct($notifs)
    {
        $this->notifications = $notifs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification-component');
    }
}
