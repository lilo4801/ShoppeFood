<?php

namespace App\Http\Requests\ExtraFood;

use App\Http\Requests\BaseRequest;
use App\Models\ExtraFood;

class UpdateRequest extends BaseRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string',
            'quantity' => 'numeric',
            'unitPrice' => 'numeric',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }

    public function validated()
    {
        $data = parent::validated();
        if ($image = data_get($data, 'image')) {
            $data['image'] = $this->handleFileAndGetDir();
        }
        return $data;
    }

}
