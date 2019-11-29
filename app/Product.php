<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'brand', 'label', 'detail', 'price', 'in_stock', 'category_id'];

    public function cartItems()
    {
        return $this->belongsToMany('App\CartItem');
    }
}
