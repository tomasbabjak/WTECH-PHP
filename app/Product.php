<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function cartItems()
    {
        return $this->belongsToMany('App\CartItem');
    }
}
