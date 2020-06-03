<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    //
    public function processor(){
      return $this->hasMany('App\Processor');
    }

    public function motherboard(){
      return $this->hasMany('App\Motherboard');
    }

    public function hdd(){
      return $this->hasMany('App\Hdd');
    }
}
