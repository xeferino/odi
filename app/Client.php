<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'address', 'phone', 'mobile_phone',
    ];

    protected $appends = [
        'is_approved'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function getIsApprovedAttribute() {
        return $this->user->hasRole('client');
    }
}
