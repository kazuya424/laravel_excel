<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Exports\ClientExport;
use App\Imports\ClientImport;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    /**
     *　顧客一覧
     */
    public function index()
    {
        $clients = Client::all();

        return view('client.index', ['clients' => $clients]);
    }

    /**
     *　Excelファイル出力
     */
    public function export()
    {
        return Excel::download(new ClientExport, 'client.xlsx');
    }

    /**
     *　Excelファイル取り込み
     */
    public function import(Request $request)
    {
        $file = $request->file('file');

        $import = new ClientImport();
        $import->onlySheets('データ');  //シート指定

        Excel::import($import, $file);

        return back()->withStatus('保存しました'); //withStatus()は戻った時にメッセージを表示
    }
}
