<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Runway extends Model
{
    protected $fillable = ['airport_id', 'designator', 'preferred_arrival', 'preferred_departure', 'heading', 'length', 'elevation', 'ils', 'ils_frequency', 'glidepath', 'arrival_lat', 'arrival_lon', 'departure_lat', 'departure_lon'];

    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
