<?php


namespace App\Services\Cart;


use App\Models\Cart;

class CreateService
{
    public function execute()
    {
        try {
            Cart::create([
                'user_id' => auth()->user()->id,
            ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
