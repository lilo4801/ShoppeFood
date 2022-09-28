<?php


namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function execute(array $payload): array
    {
        try {
            $user = User::where('email', data_get($payload, 'email'))->first();

            if (!$user || !Hash::check(data_get($payload, 'password'), $user->password)) {
                return ['success' => false, 'message' => 'email or password wrong', 'data' => []];
            }
            $token = $user->createToken('myapptoken')->plainTextToken;
            $res = [
                'user' => $user,
                'token' => $token,
            ];
            return ['success' => true, 'message' => '', 'data' => $res];

        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Something wrong', 'data' => []];
        }
    }
}
