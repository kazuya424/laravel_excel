<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::all()->makeHidden(['id','type_id', 'created_at', 'updated_at']);
    }

    public function headings(): array
    {
        return [
            '顧客名',
            '電話番号',
            'メールアドレス'
        ];
    }
}
