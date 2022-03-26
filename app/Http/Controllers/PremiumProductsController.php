<?php

namespace App\Http\Controllers;

use App\Models\PremiumProducts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumProductsController extends Controller
{
    public function index()
    {
        $uid = Auth::user()->subscription;

        if ($uid && $uid->subscription_id == 1) {
            $products = PremiumProducts::all();
            return response()->json($products);
        }

        return response()->json([
            'message' => 'You are not a Premium User',
            'subscription_url' => 'http://' . env('APP_URL') . '/subscription/subscribe'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|float',
            'slug' => 'required|string',
        ]);

        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You are not an Admin'
            ]);
        }

        $product = PremiumProducts::create($request->all());

        return response()->json($product);
    }

    public function show($id)
    {
        $product = PremiumProducts::find($id);

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max=255',
            'price' => 'float',
            'slug' => 'string',
        ]);

        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You are not an Admin'
            ]);
        }

        $product = PremiumProducts::find($id);
        $product->update($request->all());

        return response()->json($product);
    }

    public function destroy($id)
    {
        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You are not an Admin'
            ]);
        }

        $product = PremiumProducts::find($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
