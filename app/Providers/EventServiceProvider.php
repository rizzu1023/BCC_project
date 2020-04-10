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
        \App\Events\startInningEvent::class => [
            \App\Listeners\startInningListener::class,
        ],
        \App\Events\endInningEvent::class => [
            \App\Listeners\endInningListener::class,
        ],
        \App\Events\strikeRotateEvent::class => [
            \App\Listeners\strikeRotateListener::class,
        ],

//        Run events

        \App\Events\dotBallEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],

//        wicket events

        \App\Events\wicketEvent::class => [
//            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\currentBatsmanRemoveListener::class,
            \App\Listeners\newBatsmanAddedListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\bowlerWicketUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamWicketUpdateListener::class,
            \App\Listeners\isWicketFalseListener::class,
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\legByesThreeRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamThreeRunUpdateListener::class,
            \App\Listeners\teamThreeLegByesUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
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
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],

        //byes events

        \App\Events\byesOneRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamOneRunUpdateListener::class,
            \App\Listeners\teamOneByesUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\strikeRotateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\byesTwoRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamTwoRunUpdateListener::class,
            \App\Listeners\teamTwoByesUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\byesThreeRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamThreeRunUpdateListener::class,
            \App\Listeners\teamThreeByesUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\strikeRotateListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],
        \App\Events\byesFourRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerBallUpdateListener::class,
            \App\Listeners\teamBallUpdateListener::class,
            \App\Listeners\teamFourRunUpdateListener::class,
            \App\Listeners\teamFourByesUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\isOverForBowler::class,
            \App\Listeners\isOverForTeam::class,
        ],

//        wide events

        \App\Events\wideZeroRunEvent::class => [
            \App\Listeners\bowlerOneRunUpdateListener::class,
            \App\Listeners\teamOneRunUpdateListener::class,
            \App\Listeners\teamOneWideUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
        ],
        \App\Events\wideOneRunEvent::class => [
            \App\Listeners\bowlerTwoRunUpdateListener::class,
            \App\Listeners\teamTwoRunUpdateListener::class,
            \App\Listeners\teamTwoWideUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\strikeRotateListener::class,
        ],
        \App\Events\wideTwoRunEvent::class => [
            \App\Listeners\bowlerThreeRunUpdateListener::class,
            \App\Listeners\teamThreeRunUpdateListener::class,
            \App\Listeners\teamThreeWideUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
        ],
        \App\Events\wideThreeRunEvent::class => [
            \App\Listeners\bowlerFourRunUpdateListener::class,
            \App\Listeners\teamFourRunUpdateListener::class,
            \App\Listeners\teamFourWideUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\strikeRotateListener::class,
        ],
        \App\Events\wideFourRunEvent::class => [
            \App\Listeners\bowlerFiveRunUpdateListener::class,
            \App\Listeners\teamFiveRunUpdateListener::class,
            \App\Listeners\teamFiveWideUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
        ],
        \App\Events\newOverEvent::class => [
            \App\Listeners\currentBowlerRemoveListener::class,
            \App\Listeners\newBowlerSelectListener::class,
            \App\Listeners\isOverFalseListener::class,
        ],

//        no ball event

        \App\Events\noballZeroRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\bowlerOneRunUpdateListener::class,
            \App\Listeners\bowlerOneNoballUpdateListener::class,
            \App\Listeners\teamOneRunUpdateListener::class,
            \App\Listeners\teamOneNoballUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
        ],
        \App\Events\noballOneRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanOneRunUpdateListener::class,
            \App\Listeners\bowlerTwoRunUpdateListener::class,
            \App\Listeners\bowlerOneNoballUpdateListener::class,
            \App\Listeners\teamTwoRunUpdateListener::class,
            \App\Listeners\teamOneNoballUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\strikeRotateListener::class,
        ],
        \App\Events\noballTwoRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanTwoRunUpdateListener::class,
            \App\Listeners\bowlerThreeRunUpdateListener::class,
            \App\Listeners\bowlerOneNoballUpdateListener::class,
            \App\Listeners\teamThreeRunUpdateListener::class,
            \App\Listeners\teamOneNoballUpdateListener::class,
            \App\Listeners\matchTrackListener::class,

        ],
        \App\Events\noballThreeRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanThreeRunUpdateListener::class,
            \App\Listeners\bowlerFourRunUpdateListener::class,
            \App\Listeners\bowlerOneNoballUpdateListener::class,
            \App\Listeners\teamFourRunUpdateListener::class,
            \App\Listeners\teamOneNoballUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\strikeRotateListener::class,
        ],
        \App\Events\noballFourRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanFourRunUpdateListener::class,
            \App\Listeners\batsmanFourBoundaryUpdateListener::class,
            \App\Listeners\bowlerFiveRunUpdateListener::class,
            \App\Listeners\bowlerOneNoballUpdateListener::class,
            \App\Listeners\teamFiveRunUpdateListener::class,
            \App\Listeners\teamOneNoballUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
        ],
        \App\Events\noballFiveRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanFiveRunUpdateListener::class,
            \App\Listeners\bowlerSixRunUpdateListener::class,
            \App\Listeners\bowlerOneNoballUpdateListener::class,
            \App\Listeners\teamSixRunUpdateListener::class,
            \App\Listeners\teamOneNoballUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
            \App\Listeners\strikeRotateListener::class,

        ],
        \App\Events\noballSixRunEvent::class => [
            \App\Listeners\batsmanBallUpdateListener::class,
            \App\Listeners\batsmanSixRunUpdateListener::class,
            \App\Listeners\batsmanSixBoundaryUpdateListener::class,
            \App\Listeners\bowlerSixRunUpdateListener::class,
            \App\Listeners\bowlerOneRunUpdateListener::class,
            \App\Listeners\bowlerOneNoballUpdateListener::class,
            \App\Listeners\teamSixRunUpdateListener::class,
            \App\Listeners\teamOneRunUpdateListener::class,
            \App\Listeners\teamOneNoballUpdateListener::class,
            \App\Listeners\matchTrackListener::class,
        ],


//        start inning event



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
