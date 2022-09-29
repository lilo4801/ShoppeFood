<?php

namespace App\Http\Requests\Store;

use App\Enums\ImageDir;
use App\Http\Requests\BaseRequest;
use App\Models\Store;

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
            'name' => 'unique:stores|string|required',
            'description' => 'string|required',
            'address' => 'unique:stores|string|required',
            'phoneNumber' => 'unique:stores|numeric|digits_between:8,10|required',
            'image' => 'mimes:jpeg,jpg,png,gif|required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator): void {

            if ($this->isExist()) {
                $validator->errors()->add('user_id', 'User only create one Store');
            }

        });
    }

    public function validated()
    {
        $data = parent::validated();

        $data['image'] = $this->handleFileAndGetDir(data_get($data, 'image'), ImageDir::IMAGE_STORE_FOOD);

        return $data;
    }

    public function isExist()
    {
        return Store::where('user_id', auth()->user()->id)->exists();
    }

}
