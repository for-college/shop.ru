<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return response()->json($categories);
  }

  public function create(CategoryRequest $request): JsonResponse
  {
    $category = Category::create($request->all());

    return response()->json($category);
  }

  public function show($id)
  {
    return Category::where('id', '=', $id)->first();
  }

  public function update(CategoryUpdateRequest $request, $id)
  {
    $category = Category::find($id);

    if (!$category) {
      throw new ApiException(400, 'Bad request');
    }

    $category->update($request->all());
    return response()->json($category);
  }

  public function destroy($id)
  {
    return Category::destroy($id)
      ? response()->json(['message' => 'Запись удалена'])
      : throw new ApiException(500, 'Ошибка сервера');
  }
}
