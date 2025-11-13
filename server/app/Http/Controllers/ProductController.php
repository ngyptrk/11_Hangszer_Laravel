<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    // GET /api/products
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'message' => 'OK',
            'data' => $products
        ], 200, [] ,JSON_UNESCAPED_UNICODE);
    }

    // GET /api/products/{id}
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
                'data' => null
            ], 404, [] ,JSON_UNESCAPED_UNICODE);
        }

        return response()->json([
            'message' => 'OK',
            'data' => $product
        ], 200, [] ,JSON_UNESCAPED_UNICODE);
    }

    // POST /api/products
    public function store(Request $request)
    {
        try {
            $product = Product::create($request->all());

            return response()->json([
                'message' => 'OK',
                'data' => $product
            ], 201, [] ,JSON_UNESCAPED_UNICODE);

        } catch (QueryException $e) {
            if ($e->getCode() == 23000 || str_contains($e->getMessage(), 'Duplicate entry')) {
                return response()->json([
                    'message' => 'Hiba: A megadott név már létezik.',
                    'data' => ['name' => $request->input('name')]
                ], 409, [] ,JSON_UNESCAPED_UNICODE);
            }

            throw $e;
        }
    }

    // PATCH /api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
                'data' => null
            ], 404, [] ,JSON_UNESCAPED_UNICODE);
        }

        try {
            $product->update($request->all());

            return response()->json([
                'message' => 'OK',
                'data' => $product
            ], 200, [] ,JSON_UNESCAPED_UNICODE);

        } catch (QueryException $e) {
            if ($e->getCode() == 23000 || str_contains($e->getMessage(), 'Duplicate entry')) {
                return response()->json([
                    'message' => 'Hiba: A megadott név már létezik.',
                    'data' => ['name' => $request->input('name')]
                ], 409, [] ,JSON_UNESCAPED_UNICODE);
            }

            throw $e;
        }
    }

    // DELETE /api/products/{id}
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
                'data' => null
            ], 404, [] ,JSON_UNESCAPED_UNICODE);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted',
            'data' => $product
        ], 200, [] ,JSON_UNESCAPED_UNICODE);
    }
}
