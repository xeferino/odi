<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Order extends Model
{
    protected $fillable = [
        'requested', 'confirmed'
    ];

    protected $appends = [
        'public_price', 'total_items'
    ];

    protected $with = [
        'user', 'seller'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function seller() {
        return $this->belongsTo('App\Seller');
    }

    public function order_products() {
        return $this->hasMany('App\OrderProduct');
    }

    public function getPublicPriceAttribute() {
        $price = 0;
        foreach($this->order_products as $order_product) {
            $price += $order_product->public_price;
        }
        return ceil($price);
    }

    public function getTotalItemsAttribute() {
        $total = 0;
        foreach($this->order_products as $order_product) {
            $total += $order_product->quantity;
        }
        return $total;
    }
}
