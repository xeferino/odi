<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'discount', 'quantity'
    ];

    protected $appends = [
        'public_price'
    ];

    public function order() {
        return $this->belongsTo('App\Order');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function getPublicPriceAttribute() {
        $total = $this->product->public_price * $this->quantity;
        $discount = 0;
        if($this->discount != 0)
            $discount = ($total * $this->discount / 100);
        return ceil($total - $discount);
    }

    public function similar_products() {
        $products = Product::where('brand_id', $this->product->brand->id)->where('model', $this->product->model)->where('description', $this->product->description)->orderBy('size')->get();
        return $products;
    }
}
