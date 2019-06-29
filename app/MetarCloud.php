<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetarCloud extends Model
{
    protected $table = 'metar_clouds';

    protected $fillable = ['metar_id', 'cover', 'base'];

    public function metar()
    {
        return $this->belongsTo('App\Metar');
    }
}
