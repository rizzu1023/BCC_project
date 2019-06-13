<?php

namespace App\Listeners;

use App\Events\app\Events\firstEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class firstListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     *
     * @param  firstEvent  $event
     * @return void
     */
    public function handle($event)
    {
        // dd($event);
        dump($event->schedule);
    }
}
