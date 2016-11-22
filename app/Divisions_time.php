<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisions_time extends Model 
{
    public function Work_time()
  {
    return $this->hasMany('App\Work_time');
  }
    public function Visit()
  {
    return $this->hasMany('App\Visit');
  }
}
