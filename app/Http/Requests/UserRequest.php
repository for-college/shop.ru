<?php

namespace App\Http\Requests;

class UserRequest extends ApiRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'surname' => 'required|max:255',
      'name' => 'required|max:255',
      'patronymic' => 'max:255',
      'sex' => 'required|boolean',
      'birth' => 'required|date',
      'email' => 'required|max:255|email|unique:users',
      'login' => 'required|max:255|unique:users',
      'password' => 'required|max:255',
    ];
  }
}
