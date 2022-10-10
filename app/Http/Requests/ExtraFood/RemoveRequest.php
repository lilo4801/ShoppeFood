<?php

namespace App\Http\Requests\ExtraFood;

use App\Http\Requests\BaseRequest;
use App\Models\ExtraFood;

class RemoveRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $extraFood = ExtraFood::find($this->route('food_id'));

        return $extraFood && $extraFood->user_id === auth()->user()->id;
    }


}
