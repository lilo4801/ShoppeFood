<?php


namespace App\Services\Auth;


use App\Models\User;

class RegisterService
{
    public function execute($payload)
    {
        try {
            return User::create($payload);
        } catch (\Exception $e) {
            return null;
        }
    }
}
