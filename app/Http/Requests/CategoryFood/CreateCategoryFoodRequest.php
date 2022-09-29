<?php

namespace App\Http\Requests\CategoryFood;

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
        $data['image'] = $this->handleFileAndGetDir(data_get($data, 'image'), '\image\category_food');
        return $data;
    }

    public function handleFileAndGetDir($fileImg, $path = '\image'): string
    {
        $filename = $fileImg->getClientOriginalName();
        if (!file_exists(public_path($path) . $filename)) {
            $fileImg->move(public_path($path), $filename);
        }

        return $path . '\\'.$filename;
    }
}
