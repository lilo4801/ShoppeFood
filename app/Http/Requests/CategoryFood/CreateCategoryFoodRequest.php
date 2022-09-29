<?php

namespace App\Http\Requests\CategoryFood;

use App\Enums\ImageDir;
use App\Http\Requests\BaseRequest;

class CreateCategoryFoodRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:category_foods',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|required',
        ];
    }

    public function validated()
    {
        $data = parent::validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $this->handleFileAndGetDir(data_get($data, 'image'), ImageDir::IMAGE_CATEGORY_FOOD);
        return $data;
    }

}
