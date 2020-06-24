<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'file_name'
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function getUrlAttribute($value) {
        return asset('images/product/' . $this->file_name);
    }
}
