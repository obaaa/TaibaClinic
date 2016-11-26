<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function Patient()
    {
      return $this->hasMany('App\Patient');
    }
}
