<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Airport;

class WeatherChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $airport;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Airport $airport)
    {
        $this->airport = $airport;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('weather-tracker.'.$this->airport->id);
    }

    public function broadcastWith()
    {
        $extra = [
          'metar' => $this->airport->metar,
          $this->airport->getActiveRunways()
        ];

        $arrayToReturn = array_merge($this->airport->toArray(), $extra);

        /* Unset several unneeded keys from the airport array,
         * because of Pusher's limit of 10kb which produced an error with
         * airports that had a lot of info ( I'm looking at you LGAV :) )
         */
        unset($arrayToReturn['runways'], $arrayToReturn['vfr_overview'], $arrayToReturn['procedures'], $arrayToReturn['overview']);

        return $arrayToReturn;
    }
}
