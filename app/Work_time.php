<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_time extends Model
{
  public function Shift_employee()
  {
  return $this->hasMany('App\Shift_employee');
  }
}
