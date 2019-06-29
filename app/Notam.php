<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notam extends Model
{
    protected $fillable = ['airport_id', 'message', 'raw_text'];

    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
