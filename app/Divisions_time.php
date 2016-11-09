<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisions_time extends Model
{
    public function Work_time()
  {
    return $this->hasMany('App\Work_time');
  }
}
