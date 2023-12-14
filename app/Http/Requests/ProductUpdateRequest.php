<?php

namespace App\Http\Requests;

class ProductUpdateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'name' => 'min:3|max:255',
          'price' => 'numeric|decimal:2|mic:0,01|max:9999999999',
          'quantity' => 'integer|min:0',
          'description' => 'min:1|max:255',
          'photo' => 'min:5|max:255',
          'category_id' => 'integer'
        ];
    }
}
