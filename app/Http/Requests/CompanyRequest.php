<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => 'required|string|min:3|max:191',
            'logo' => 'sometimes|nullable|image|dimensions:min_width=100,min_height=100',
            'email'=>'sometimes|nullable|email',
            'website'=>'sometimes|nullable|url'
        ];
    }
}