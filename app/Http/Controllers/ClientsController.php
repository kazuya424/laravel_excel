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
    public function index(Request $request)
    {

        $query = Client::query();

        $client_name = $request->client_name;

        //顧客名の値が存在&商品名の値が空ではなかった場合
        if ($request->has('client_name') && $client_name !== '') {
            $query->where('client_name', 'like', '%' . $client_name . '%')->get();
        }

        $datas = $query->paginate(15);


        return view('client.index', ['datas' => $datas, 'client_name' => $client_name]);
    }

    /**
     *　Excelファイル出力
     */
    public function export(Request $request)
    {
        $client_name = $request->client_name;
        $export_name = $request->export_name;

        if (!isset($export_name)) {
            return back()->withErrors('ファイル名を入力して下さい');
        }

        if (!isset($client_name)) {
            $client_name = "";
        }

        return Excel::download(new ClientExport($client_name), $export_name . '.xlsx');
    }

    /**
     *　Excelファイル取り込み
     */
    public function import(Request $request)
    {
        $file = $request->file('file');

        if (!isset($file)) {
            return back()->withErrors('ファイルを選択して下さい');
        }

        if ($file->getClientOriginalName() <> "顧客データ.xlsm") {
            return back()->withErrors('顧客データ.xlsmを選択して下さい');
        }
        $import = new ClientImport();
        $import->onlySheets('データ');  //シート指定

        Excel::import($import, $file);

        return back()->withStatus('保存しました'); //withStatus()は戻った時にメッセージを表示
    }
}
