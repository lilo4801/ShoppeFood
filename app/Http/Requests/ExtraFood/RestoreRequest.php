<?php

namespace App\Http\Requests\ExtraFood;

use App\Http\Requests\BaseRequest;
use App\Models\ExtraFood;


class RestoreRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $extraFood = ExtraFood::withTrashed()->where('id', $this->route('food_id'))->first();
        return $extraFood && $extraFood->user_id === auth()->user()->id;
    }


}
