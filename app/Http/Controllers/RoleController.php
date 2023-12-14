<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
  public function index()
  {
    $roles = Role::all();
    return response()->json($roles);
  }

  public function create(RoleRequest $request): JsonResponse
  {
    $role = Role::create($request->all());

    return response()->json($role);
  }

  public function show($id)
  {
    return Role::where('id', '=', $id)->first();
  }

  public function update(RoleUpdateRequest $request, $id)
  {
    $role = Role::find($id);

    if (!$role) {
      throw new ApiException(400, 'Bad request');
    }

    $role->update($request->all());
    return response()->json($role);
  }

  public function destroy($id)
  {
    return Role::destroy($id)
      ? response()->json(['message' => 'Запись удалена'])
      : throw new ApiException(500, 'Ошибка сервера');
  }
}
