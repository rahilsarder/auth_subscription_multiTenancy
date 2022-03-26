<?php

namespace App\Http\Controllers;

use App\Models\SubscribedUsers;
use Illuminate\Http\Request;

class SubscribedUsersController extends Controller
{
    public function index()
    {
        $subscription = SubscribedUsers::all();

        return response()->json($subscription);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|unique:subscribed_users',
            'subscription_id' => 'required|integer',
        ]);

        $subscription = SubscribedUsers::create($request->all());

        return response()->json($subscription);
    }

    public function show($id)
    {
        $subscription = SubscribedUsers::find($id);

        return response()->json($subscription);
    }
}
