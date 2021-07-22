<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        // dd($client);
        return view('client.index', ['clients' => $clients]);
    }
}
