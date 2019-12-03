<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $fillable = ['cart_id', 'product_id', 'quantity'];

    // public function __construct(array $attributes = array())
    // {
    //     parent::__construct($attributes);
    // }

    public function cart()
    {
        return $this->belongsToOne('App\Cart');
    }

    public function product()
    {
        return $this->hasOne('App\Product');
    }

}
