<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function login(LoginRequest $request): JsonResponse
  {
    $user = User::where($request->all())->first();

    if (!$user) {
      throw new ApiException(401, "Авторизация провалена");
    }

    $user->api_token = $user->createToken('api_token')->plainTextToken;
    $user->save();
    Auth::login($user);

    return response()->json($user->api_token);
  }


  public function index()
  {
    $users = User::all();
    return response()->json($users);
  }

  public function create(UserRequest $request): JsonResponse
  {
    $user = User::create($request->all());

    return response()->json($user);
  }

  public function show($id)
  {
    return User::where('id', '=', $id)->first();
  }

  public function update(UserUpdateRequest $request, $id)
  {
    $user = User::find($id);

    if (!$user) {
      throw new ApiException(400, 'Bad request');
    }

    $user->update($request->all());
    return response()->json($user);
  }

  public function destroy($id)
  {
    return User::destroy($id)
      ? response()->json(['message' => 'Запись удалена'])
      : throw new ApiException(500, 'Ошибка сервера');
  }

  public function logout(): JsonResponse
  {
    $user = Auth::user();
    $user_from_db = User::find($user->id);

    if (!$user_from_db) {
      throw new ApiException(500, 'Server error');
    }

    $user_from_db->api_token = null;
    $user_from_db->save();
    return response()->json(['message' => 'Logout']);
  }
}
