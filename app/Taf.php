<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taf extends Model
{
    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
