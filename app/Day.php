<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function Work_time()
  {
    return $this->hasMany('App\Work_time');
  }
}
