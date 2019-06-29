<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sid extends Model
{
    protected $fillable = ['airport_id', 'point', 'runway', 'name', 'initial_flight_level', 'release_flight_level'];

    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
