<?php

namespace App\Http\Requests\ExtraFood;

use App\Enums\ImageDir;
use App\Http\Requests\BaseRequest;
use App\Models\Food;

class CreateRequest extends BaseRequest
{

    public function authorize()
    {
        $params = $this->all();
        $food = Food::find(data_get($params, 'food_id'));

        return $food && $food->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required|unique:extra_foods',
            'unitPrice' => 'integer|required',
            'quantity' => 'integer|required',
            'food_id' => 'integer|required',
            'image' => 'mimes:jpeg,jpg,png,gif|required',
        ];
    }

    /**
     * @return array<>
     */
    public function validated(): array
    {
        $data = parent::validated();
        $data['image'] = $this->handleFileAndGetDir(data_get($data, 'image'), ImageDir::IMAGE_EXTRA_FOOD);

        return $data;
    }
}
