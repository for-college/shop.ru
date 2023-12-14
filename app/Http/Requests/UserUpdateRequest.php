<?php

namespace App\Http\Requests;

class UserUpdateRequest extends ApiRequest
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
        'surname' => 'max:255',
        'name' => 'min:3|max:255',
        'patronymic' => 'max:255',
        'sex' => 'boolean',
        'birth' => 'date',
        'email' => 'max:255|email|unique:users',
        'login' => 'max:255|unique:users',
        'password' => 'max:255',
      ];
    }
}
