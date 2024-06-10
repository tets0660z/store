<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    // public function delete(User $user, Product $cart): bool
    // {
    //     //
    //     return $this->update($user, $cart);
    // }
}
