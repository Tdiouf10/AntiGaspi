<?php

namespace App\Http\Requests;

use App\Models\Annonce;
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
            'title' => ['required', Rule::unique('annonces', 'title')->ignore($this->annonce)],
            'description' => ['required'],
            'localisation' => ['required'],
            'code_postal' => ['required', 'integer'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5048'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:App\Models\Category,id']
        ];
    }
}
