<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OauthController extends Controller
{
    public function getClients()
    {
        $clients = Http::get('http://localhost:8000/oauth/clients');

        $result = json_decode($clients->body(), true);

        return $result;
    }
}
