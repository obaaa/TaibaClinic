<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_time extends Model
{
  public function Shift_employee()
  {
  return $this->hasMany('App\Shift_employee');
  }

  public function Employee_work_time()
  {
  return $this->hasMany('App\Employee_work_time');
  }

  public function Visit()
  {
  return $this->hasMany('App\Visit');
  }
  
}
