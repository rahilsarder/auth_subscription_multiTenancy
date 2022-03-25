<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client as OClient;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $req)
    {
        $req->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
        ]);

        $user = User::create([
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'name' => $req->name,
        ]);

        $token = $this->customTokenGenerator();


        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (!$user) {
            return response()->json([
                'message' => '
                Invalid credentials'
            ], 401);
        }

        return Http::asForm()->post('http://127.0.0.1:8000/api/testdado', [
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => 'Dgfv8m0w6uQBEwGh4XAKKKurDRsTt0iXlUQnmisl',
            'username' => request("email"),
            'password' => request("password"),
            'scope' => '*'
        ]);
        return 'success';
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function getTokenAndRefreshToken(OClient $oClient, $email, $password)
    // {
    //     $oClient = Oclient::where('password_client', 1)->first();
    //     $http = new Client;
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
