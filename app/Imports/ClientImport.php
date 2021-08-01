<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new Client([
            'client_name' => $row['名前'],
            'client_PhoneNumber' => $row['連絡先'],
            'client_email' => $row['メールアドレス'],
            'type_id' => 1,
        ]);
    }
}
