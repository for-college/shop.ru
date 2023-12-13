<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index() {
    $users = User::all();
    return response()->json($users);
  }

  public function create(UserRequest $request) {
    $user = User::create($request->all());

    return response()->json($user);
  }

  public function show($id) {

  }

  public function update($id) {

  }

  public function destroy($id) {

  }
}
