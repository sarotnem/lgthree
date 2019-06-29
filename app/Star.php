<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $fillable = ['airport_id', 'point', 'runway', 'name', 'entry_flight_level'];
    
    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
