<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }

    public function getFullFilenameAttribute()
    {
        return $this->name.'.'.$this->extension;
    }
}
