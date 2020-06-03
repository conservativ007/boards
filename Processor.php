<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model{
    //
    protected $fillable = ['manufacturer', 'name', 'core', 'frequency', 'headings_id'];

    public function heading(){
      return $this->belongsTo('App\Heading');
    }
}
