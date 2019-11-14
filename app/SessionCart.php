<?php

namespace App;

class SessionCart
{
    public $items = [];
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
        }
    }

    public function add($item, $id) {
        $ids = [];
        foreach($this->items as $i){
            array_push($ids, $i->id);
        }
        if (!(in_array($id, $ids))) {
            array_push($this->items, $item);
        }
    }

    public function replace($products){
        $this->items=$products;
    }
}
