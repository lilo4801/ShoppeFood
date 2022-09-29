<?php

namespace App\Http\Requests\CategoryFood;

use App\Http\Requests\BaseRequest;
use App\Models\CategoryFood;
use Illuminate\Foundation\Http\FormRequest;

class RemoveCategoryFoodRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $categoryFood = CategoryFood::find($this->route('id'));
        return $categoryFood && $categoryFood->user_id === auth()->user()->id;
    }


}
