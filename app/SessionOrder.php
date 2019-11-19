<?php

namespace App;

class SessionOrder
{
    public $transport_id;
    public $payment_id;
    public $cart_id;
    public $customer_id;

    public function __construct($oldOrder)
    {
        if ($oldOrder) {
            $this->transport_id = $oldOrder->transport_id;
            $this->payment_id = $oldOrder->payment_id;
            $this->cart_id = $oldOrder->cart_id;
            $this->customer_id = $oldOrder->customer_id;
        }
    }

    public function addTransport($id)
    {
        $this->transport_id = $id;
    }

    public function addPayment($id)
    {
        $this->payment_id = $id;
    }

    public function addCart($id)
    {
        $this->cart_id = $id;
    }

    public function addCustomer($id)
    {
        $this->customer_id = $id;
    }


}
