<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response([
            'success' => true,
            'data' => Product::latest()->paginate($request->has('per_page')? $request->per_page : 10),
            'message' => 'Berhasil mengambil data barang !',
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric'
        ]);

        $product = Product::firstOrCreate([
            'name' => $request->name
        ],[
            'description' => $request->description
        ]);

        $product->increment('stock', $request->stock);

        Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'value' => $request->stock,
            'type' => 'in'
        ]);
        
        if($product->save()){
            return response([
                'success' => true,
                'data' => $product,
                'message' => 'Berhasil menambah data dan stok barang!!',
            ], 200);
        }
    }

    public function take(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock' => 'required|numeric'
        ]);

        $product = Product::where('id', $request->product_id)->first();

        if($product->stock >= $request->stock){
            $product->decrement('stock', $request->stock);
            Transaction::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'value' => $request->stock,
                'type' => 'out'
            ]);
        }else{
            return response([
                'success' => false,
                'data' => $product,
                'message' => 'Transaksi gagal stok produk tidak mencukupi!!',
            ], 200);
        }
        
        if($product->save()){
            return response([
                'success' => true,
                'data' => $product,
                'message' => 'Berhasil mengambil stok barang!!',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
