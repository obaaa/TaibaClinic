<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  public function Visit()
  {
  return $this->hasMany('App\Visit');
  }
}
