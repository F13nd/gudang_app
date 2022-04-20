<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function index()
    {
        DB::enableQueryLog();

        Product::select(
            'products.name',
            'products.description',
            DB::raw('MONTHNAME(created_at) as month'),
        )->groupBy('month','id')->get();

        dd(DB::getQueryLog());
    }
}
