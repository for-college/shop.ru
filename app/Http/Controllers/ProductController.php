<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    return response()->json($products);
  }

  public function create(ProductRequest $request): JsonResponse
  {
    $product = Product::create($request->all());

    return response()->json($product);
  }

  public function show($id)
  {
    return Product::where('id', '=', $id)->first();
  }

  public function update(ProductUpdateRequest $request, $id)
  {
    $product = Product::find($id);

    if (!$product) {
      throw new ApiException(400, 'Bad request');
    }

    $product->update($request->all());
    return response()->json($product);
  }

  public function destroy($id)
  {
    return Product::destroy($id)
      ? response()->json(['message' => 'Запись удалена'])
      : throw new ApiException(500, 'Ошибка сервера');
  }
}
