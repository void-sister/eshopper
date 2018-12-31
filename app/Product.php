<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['quantity'];

    public function scopeRecommended($query)
    {
      return $query->inRandomOrder()->take(3);
    }

    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }
}
