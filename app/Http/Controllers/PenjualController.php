<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PenjualController extends Controller
{



    // function dashboard(){
    //     $order = PurchaseOrder::where('nama', Auth::user()->name)->get();
    //     $order = count($order);
    //     dd($order);
    // }


    function product(){
        $products = Product::all();

        return view('pembeli/product/index', compact('products'));

    }


    public function index()
    {
        $orders = SalesOrder::where('nama', Auth::user()->name)->get();

        return view('penjual.sales.index',compact('orders'));
    }

    
    

    public function create()
    {
        $product = Product::all();
        return view ('penjual.sales.add',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'products_id' => 'required|exists:products,id',
            'nama'        => 'required|string',
            'alamat'      => 'required|string',
            'vendor'      => 'required|string',
            'qty'         => 'required|integer|min:1',
        ]);
        
        $product_id = $request->products_id;
        
        $product = Product::findOrFail($product_id);
        $harga_brg = $product->harga;
        $total_harga = $harga_brg * $request->qty;

        $stock = $product->stock;
        $qty =  $request->qty;
        $stockKurang = $stock - $qty;

        if ($qty >= $stock) {
            return 'Stock Tidak Mencukupi';
        }
        
        $product->update([
            'stock'    => $stockKurang,
        ]);
        
        SalesOrder::create([
            'no_order'     => 'PO' . Str::random(4),
            'nama'         => $request->nama,
            'alamat'       => $request->alamat,
            'products_id'  => $product_id,
            'vendor'          => $request->vendor,
            'qty'          => $request->qty,
            'total_harga'  => $total_harga,
        ]);

        return redirect()->route('penjual.sales')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    

    public function show(string $id)
    {
        $order = SalesOrder::findOrFail($id);

        return view('penjual.sales.detail', compact('order'));
    }

    

    public function edit(string $id)
    {
        $order = SalesOrder::findOrFail($id);
        $product = Product::all();

        return view('penjual.sales.edit', compact('order','product'));
    }

    

    public function update(Request $request, string $id)
    {
        $request->validate([
            'products_id' => 'required|exists:products,id',
            'nama'        => 'required|string',
            'alamat'      => 'required|string',
            'vendor'      => 'required|string',
            'qty'         => 'required|integer|min:1',
        ]);
        
        $product_id = $request->products_id;

        $product = Product::findOrFail($product_id);
        $order = SalesOrder::findOrFail($id);
        
        $harga_brg = $product->harga;
        $total_harga = $harga_brg * $request->qty;

        $stock = $product->stock;
        $qty =  $request->qty;
        $stockKurang = $stock - $qty;

        if ($qty >= $stock) {
            return 'Stock Tidak Mencukupi';
        }
        
        $product->update([
            'stock'    => $stockKurang,
        ]);
        
        
        $order->update([
            'no_order'     => 'PO' . Str::random(4),
            'nama'         => $request->nama,
            'alamat'       => $request->alamat,
            'vendor'       => $request->vendor,
            'products_id'  => $product_id,
            'qty'          => $request->qty,
            'total_harga'  => $total_harga,
        ]);

        return redirect()->route('penjual.sales')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = SalesOrder::findOrFail($id);   
        $product_id = $order->products_id;
        $product = Product::findOrFail($product_id);
        $stock = $product->stock;
        $qty = $order->qty;
        $stockUpdate = $stock + $qty;

        $product->update([
            'stock'    => $stockUpdate,
        ]);
        
        $order->delete();

        return redirect()->route('penjual.sales')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
