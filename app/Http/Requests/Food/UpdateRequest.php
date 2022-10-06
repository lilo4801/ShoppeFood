<?php

namespace App\Http\Requests\Food;

use App\Enums\ImageDir;
use App\Http\Requests\BaseRequest;
use App\Models\Food;

class UpdateRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $food = Food::find($this->route('id'));
        return $food && $food->user_id === auth()->user()->id;
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
            'content' => 'string',
            'unitPrice' => 'numeric',
            'quantity' => 'numeric',
            'category_food_id' => 'integer',
            'store_id' => 'integer',
            'del_image_id.*' => 'integer',
            'images.*' => 'mimes:jpeg,jpg,png,gif',
        ];
    }

    public function validated(): array
    {
        $data = parent::validated();

        $data['images'] = array_map(function ($image) {
            return $this->handleFileAndGetDir($image, ImageDir::IMAGE_FOOD);
        }, data_get($data, 'images', []));

        $data['food_id'] = $this->route('id');

        return $data;
    }

}
