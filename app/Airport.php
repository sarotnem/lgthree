<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ActiveRunwayLogic;
use App\Favorite;
use Auth;
use Storage;
use App\Chart;

class Airport extends Model
{
    use ActiveRunwayLogic;

    public function runways()
    {
        return $this->hasMany('App\Runway');
    }

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function metar()
    {
        return $this->hasOne('App\Metar');
    }

    public function taf()
    {
        return $this->hasOne('App\Taf');
    }

    public function notams()
    {
        return $this->hasMany('App\Notam');
    }

    public function sids()
    {
        return $this->hasMany('App\Sid');
    }

    public function stars()
    {
        return $this->hasMany('App\Star');
    }

    public function charts()
    {
        return $this->hasMany('App\Chart');
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                        ->where('airport_id', $this->id)
                        ->first();
    }
}
