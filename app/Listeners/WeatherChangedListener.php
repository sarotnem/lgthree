<?php

namespace App\Listeners;

use App\Events\WeatherChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeatherChangedListener
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
     * @param  WeatherChanged  $event
     * @return void
     */
    public function handle(WeatherChanged $event)
    {
        //
    }
}
