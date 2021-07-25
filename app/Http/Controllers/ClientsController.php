<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Exports\ClientExport;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        // dd($client);
        return view('client.index', ['clients' => $clients]);
    }

    public function client()
    {
        return view('client.index');
    }

    public function export()
    {
        return Excel::download(new ClientExport, 'client.xlsx');
    }
}
