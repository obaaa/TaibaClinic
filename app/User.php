<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

class UserRole extends Model
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
