<?php

namespace App\Http\Requests\Food;

use App\Enums\ImageDir;
use App\Http\Requests\BaseRequest;
use App\Models\Store;

class CreateRequest extends BaseRequest
{


    public function authorize()
    {
        $params = $this->all();
        $store = Store::find($params['store_id']);

        return $store && $store->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:foods',
            'content' => 'required|string',
            'unitPrice' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_food_id' => 'integer',
            'store_id' => 'integer',
            'images.*' => 'mimes:jpeg,jpg,png,gif|required'
        ];
    }

    public function validated()
    {
        $data = parent::validated();

        $data['images'] = array_map(function ($image) {
            return $this->handleFileAndGetDir($image, ImageDir::IMAGE_FOOD);
        }, $data['images']);

        return $data;
    }

}
