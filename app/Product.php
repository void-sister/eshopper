<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeRecommended($query)
    {
      return $query->inRandomOrder()->take(3);
    }
}
