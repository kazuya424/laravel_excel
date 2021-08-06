<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class ClientImport implements OnEachRow, WithHeadingRow, WithMultipleSheets
{
    /**
     *　トレイト
     */
    use WithConditionalSheets;

    /**
     *　どのシートをインポートするか指定
     */
    public function conditionalSheets(): array
    {
        return [
            'データ' => new ClientImport()
        ];
    }

    /**
     *　データ保存
     */
    public function OnRow(Row $row)
    {
        $row = $row->toArray();
        
        $client = Client::FirstOrNew(
            // 重複除外カラムを指定
            ['client_email' => $row['メールアドレス']],
            // データベースのカラムとエクセルのカラムを紐づけ
            [
                'client_PhoneNumber' => $row['連絡先'],
                'client_name' => $row['顧客名'],
                'type_id' => 1,
            ]
        );

        $client->save();
    }
}
