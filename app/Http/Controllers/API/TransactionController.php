<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\View\AverageProductEntry;
use App\Models\View\MonthlyTransaction;
use App\Models\View\ProductEntryAverage;

class TransactionController extends Controller
{
    public function monthlyTransaction()
    {
        return response([
            'success' => true ,
            'data' => MonthlyTransaction::all(), 
            'message' => 'Berhasil mengambil view transaksi bulanan!!',
        ], 200);
    }

    public function averageProductEntry()
    {
        return response([
            'success' => true ,
            'data' => ProductEntryAverage::all(), 
            'message' => 'Berhasil rata rata barang masuk!!',
        ], 200);
    }
}
