<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['cart_id', 'user_id', 'customer_id', 'transport_id', 'payment_id'];
}
