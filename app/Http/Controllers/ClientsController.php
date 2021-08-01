<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Exports\ClientExport;
use App\Imports\ClientImport;
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

    public function im()
    {
        return view('dango');
    }

    public function import()
    {
        // dd(request());
        Excel::import(new ClientImport(), request()->file('file'));
        return back();
    }
}
