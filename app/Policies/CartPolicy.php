<?php

namespace App\Policies;

use App\User;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function quantity(User $user, Order $order)
    {
        return $user->id == $order->user_id;
    }

    public function remove(User $user, Order $order)
    {
        return $user->id == $order->user_id;
    }
}
