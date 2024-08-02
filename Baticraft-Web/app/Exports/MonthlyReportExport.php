<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class MonthlyReportExport implements FromCollection
{
    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function collection()
    {
        return Transaction::whereMonth('created_at', $this->month)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Produk',
            'Jumlah',
            'Total Harga',
            'Tanggal Transaksi',
        ];
    }
}