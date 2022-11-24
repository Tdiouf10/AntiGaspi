<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateAnnonceRequest extends FormRequest
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
            'title' => ['required', Rule::unique('annonces')->ignore(Auth::user()->id)],
            'description' => ['required'],
            'localisation' => ['required'],
            'code_postal' => ['required', 'integer'],
            'image' => ['required', 'image'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:App\Models\Category,id']
        ];
    }
}
