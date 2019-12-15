<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        \App\Events\testingEvent::class => [
          \App\Listeners\testingListener::class,
        ],
        \App\Events\strikeRotateEvent::class => [
            \App\Listeners\strikeRotateListener::class,
        ],
        \App\Events\dotBallEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\oneRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanOneRunUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\bowlerOneRunUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamOneRunUpdateListener::class,
            \App\Listeners\strikeRotateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\twoRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanTwoRunUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\bowlerTwoRunUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamTwoRunUpdateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\threeRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanThreeRunUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\bowlerThreeRunUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamThreeRunUpdateListener::class,
            \App\Listeners\strikeRotateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\fourRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanFourRunUpdateListener::class,
            \App\Listeners\batsmanFourBoundaryUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\bowlerFourRunUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamFourRunUpdateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\sixRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanSixRunUpdateListener::class,
            \App\Listeners\batsmanSixBoundaryUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\bowlerSixRunUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamSixRunUpdateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],

//        Leg Byes Events

        \App\Events\legByesOneRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamOneRunUpdateListener::class,
            \App\Listeners\teamOneLegByesUpdateListener::class,
            \App\Listeners\strikeRotateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\legByesTwoRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamTwoRunUpdateListener::class,
            \App\Listeners\teamTwoLegByesUpdateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\legByesThreeRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamThreeRunUpdateListener::class,
            \App\Listeners\teamThreeLegByesUpdateListener::class,
            \App\Listeners\strikeRotateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\legByesFourRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamFourRunUpdateListener::class,
            \App\Listeners\teamFourLegByesUpdateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
