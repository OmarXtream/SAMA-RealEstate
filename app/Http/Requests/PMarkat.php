<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PMarkat extends FormRequest
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
            'name' => ['bail','required', 'string', 'max:255'],
            'phone' => ['bail', 'required','string', 'max:255'],
            'email' => ['bail','required', 'string','email', 'max:255'],

            // 'type' => ['bail', 'string', 'max:255'],
            // 'city' => ['bail', 'string', 'max:255'],

            // 'rooms' => ['bail', 'integer'],
            // 'baths' => ['bail', 'integer'],
            // 'price' => ['bail', 'integer'],
            
            // 'details' => ['bail', 'string'],

        ];
    }
}
