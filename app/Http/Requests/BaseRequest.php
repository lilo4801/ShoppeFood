<?php

namespace App\Http\Requests;

use App\Enums\ImageDir;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function handleFileAndGetDir($fileImg, $path = ImageDir::IMAGE): string
    {
        $filename = $fileImg->getClientOriginalName();
        if (!file_exists(public_path($path) . $filename)) {
            $fileImg->move(public_path($path), $filename);
        }

        return $path . '\\' . $filename;
    }
}
