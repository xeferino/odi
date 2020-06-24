<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Spatie\Tags\HasTags;

    protected $fillable = [
        'sku', 'model', 'description', 'quantity', 'unit_price', 'size', 'gender','cantidad_fiscal','cantidad_interno','precio_fiscal','precio_interno'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function images() {
        return $this->hasMany('App\ProductImage');
    }

    public function getPublicPriceAttribute() {
        $conIva = $this->unit_price*1.16;
        if($conIva>0 && $conIva<=90){ $conIva = $conIva*1.24; }
        else if($conIva>=91 && $conIva<=100){ $conIva = $conIva*1.18; }
        else if($conIva>=101 && $conIva<=110){ $conIva = $conIva*1.17; }
        else if($conIva>=111 && $conIva<=120){ $conIva = $conIva*1.16; }
        else if($conIva>=121 && $conIva<=130){ $conIva = $conIva*1.15; }
        else if($conIva>=131 && $conIva<=140){ $conIva = $conIva*1.14; }
        else if($conIva>=141 && $conIva<=150){ $conIva = $conIva*1.13; }
        else if($conIva>=151 && $conIva<=160){ $conIva = $conIva*1.12; }
        else if($conIva>=161 && $conIva<=180){ $conIva = $conIva*1.11; }
        else if($conIva>=181 && $conIva<=210){ $conIva = $conIva*1.1; }
        else if($conIva>=211){ $conIva = $conIva*1.09; }
        $conIva = round($conIva);
        $conIva = $conIva*1.1;
        $conIva = round($conIva);
        return $conIva;
    }
}
