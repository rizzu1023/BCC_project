<?php

namespace App\Listeners;

use App\Events\dotBallEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class checkForOverListener
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
     * @param  dotBallEvent  $event
     * @return void
     */
    public function handle(dotBallEvent $event)
    {
        //
    }
}
