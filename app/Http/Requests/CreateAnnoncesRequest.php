<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnnoncesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:annonces'],
            'description' => ['required'],
            'localisation' => ['required'],
            'code_postal' => ['required', 'integer'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,webp', 'max:5048'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:App\Models\Category,id']
        ];
    }
}
