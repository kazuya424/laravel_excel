<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientExport implements WithHeadings, FromCollection
{
    /**
     * コンストラクト
     */
    public function __construct(string $client_name)
    {
        $this->client_name = $client_name; // Where句のデータ
    }

    /**
     * 条件データ取得
     */
    public function collection()
    {
        return Client::where('client_name', 'like', '%' . $this->client_name . '%')->get(['client_name','client_PhoneNumber','client_email']);
    }

    /**
     * Excel1フィールド指定
     */
    public function headings(): array
    {
        return [
            '顧客名',
            '電話番号',
            'メールアドレス'
        ];
    }
}
