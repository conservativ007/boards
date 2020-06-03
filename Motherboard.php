<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    //
    protected $fillable = ['name', 'soket', 'chipset', 'memory', 'headings_id'];

    public function heading(){
      return $this->belongsTo('App\Heading');
    }
}
