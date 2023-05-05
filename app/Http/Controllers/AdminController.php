<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.index');
    }

    public function widget()
    {
        // For API

        $client = new Client();
        $request = $client->get('http://api.publicapis.org/entries');
        if($request->getStatusCode()==200){
            $response = json_decode($request->getBody());
            dd($response);
        }
        return view('backend.widget', compact('response'));
    }
}
