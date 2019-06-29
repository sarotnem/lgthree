<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Metar extends Model
{
    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }

    public function clouds()
    {
        return $this->hasMany('App\MetarCloud');
    }
}
