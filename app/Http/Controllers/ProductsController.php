<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max=255',
            'slug' => 'required|string',
            'price' => 'required|float',
        ]);

        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You are not an Admin'
            ]);
        }

        $product = Products::create($request->all());

        return response()->json([
            'message' => 'Product Created Successfully',
            'product' => $product
        ], 201);
    }

    public function show($id)
    {
        $product = Products::find($id);

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'slug' => 'string',
            'price' => 'float',
        ]);

        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You are not an Admin'
            ]);
        }

        $product = Products::find($id);

        $product->update($request->all());

        return response()->json([
            'message' => 'Product Updated Successfully',
            'product' => $product
        ], 200);
    }

    public function destroy($id)
    {
        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You are not an Admin'
            ]);
        }

        $product = Products::find($id);

        $product->delete();

        return response()->json([
            'message' => 'Product Deleted Successfully',
            'product' => $product
        ], 200);
    }
}
