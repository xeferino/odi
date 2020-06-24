<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfAdministered extends Model
{
    protected $fillable = [
        'type', 'content', 'order'
    ];
}
