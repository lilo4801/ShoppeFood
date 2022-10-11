<?php

namespace App\Http\Requests\Cart;

use App\Enums\CartStatus;
use App\Http\Requests\BaseRequest;
use App\Models\Cart;

class CreateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator): void {
            if ($this->isExistCart()) {
                $validator->errors()->add('user_id', 'User only create one Cart!');
            }
        });
    }

    public function isExistCart(): bool
    {
        return Cart::where('user_id', auth()->user()->id)
            ->where('status', CartStatus::SHOPPING)
            ->exists();
    }
}
