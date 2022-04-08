<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
    public function index()
    {
        // $user = Auth::user()->is_admin;

        // if (!$user) {
        //     return response()->json([
        //         'message' => 'You dont have permission to access this page'
        //     ], Response::HTTP_FORBIDDEN);
        // }

        $subscription = Subscription::all();

        return response()->json($subscription);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You dont have permission to access this page'
            ], Response::HTTP_FORBIDDEN);
        }

        $subscription = Subscription::create($request->all());

        return response()->json($subscription, 201);
    }

    public function show($id)
    {
        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You dont have permission to view this page',
            ], Response::HTTP_FORBIDDEN);
        }

        $subscription = Subscription::find($id);

        return response()->json($subscription);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max=255',
            'price' => 'float'
        ]);

        $user = Auth::user()->is_admin;

        if (!$user) {

            return response()->json([
                'message' => 'You dont have permission to view this page'
            ]);
        }

        $subscription = Subscription::find($id);

        $subscription = $subscription->update($request->all());

        return response()->json($subscription);
    }

    public function destroy($id)
    {
        $user = Auth::user()->is_admin;

        if (!$user) {
            return response()->json([
                'message' => 'You dont have permission to view this page'
            ]);
        }

        $subscription = Subscription::find($id);

        $subscription->delete();

        return response()->json([
            'message' => 'Subscription deleted successfully'
        ]);
    }
}
