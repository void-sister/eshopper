<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'user_id', 'billing_email', 'billing_name', 'billing_address',
      'billing_city', 'billing_province', 'billing_phone',
      'billing_name_on_card', 'billing_total', 'error'
    ];


    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function products()
    {
      return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}
