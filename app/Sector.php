<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function airports()
    {
        return $this->hasMany('App\Airport');
    }
}
