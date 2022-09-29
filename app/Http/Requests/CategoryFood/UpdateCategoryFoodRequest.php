<?php

namespace App\Http\Requests\CategoryFood;

use App\Enums\ImageDir;
use App\Http\Requests\BaseRequest;
use App\Models\CategoryFood;

class UpdateCategoryFoodRequest extends BaseRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ];
    }

    public function validated()
    {

        $data = parent::validated();
        if ($image = data_get($data, 'image')) {
            $data['image'] = $this->handleFileAndGetDir($image, ImageDir::IMAGE_CATEGORY_FOOD);
        }

        return $data;
    }

}
