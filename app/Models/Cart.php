<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;        
            $this->totalPrice = $oldCart->totalPrice;
        }
    // dd($oldCart);
    }
    public function addToCart($product,$id)
    {
        $cartItem = ['quantity'=>0,'price'=>$product->price,'item'=>$product];
        if($this->items){
            if(array_key_exists($id,$this->items))
                $cartItem = $this->items[$id];
        }
        $cartItem['quantity']++;
        $cartItem['price'] = $product->price * $cartItem['quantity'];
        $this->items[$id] = $cartItem;
        $this->totalQty++;
        $this->totalPrice += $product->price;
        // dd($cartItem);
    }
    public function removeOneCart($id)
    {
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        // $this->items[$id]['item'] => $product
        // $this->items[$id]= $cartItem;
        $this->totalQty--;
        $this->totalPrice -=$this->items[$id]['item']['price'];
        if($this->items[$id]['quantity']<=0){
            unset($this->items[$id]);
        }
    }
    public function removeAll($id)
    {
        $this->totalQty -=$this->items[$id]['quantity'];
        $this->totalPrice -=$this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
