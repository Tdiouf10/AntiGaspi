<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnonceStore extends FormRequest
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
     * @return \string[][]
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:annonces'],
            'description' => ['required'],
            'price' => ['integer', 'required'],
            'localisation' => ['required']
        ];
    }
}
