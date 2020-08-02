<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public function visitor(){
        return $this->belongsTo('App\User');
    }
}
