<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hdd extends Model
{
    //
    protected $fillable = ['manufacturer', 'sata', 'speed', 'buffer', 'volume', 'linear_speed', 'headings_id'];

    public function heading(){
      return $this->belongsTo('App\Heading');
    }
}
