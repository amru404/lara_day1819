<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\Product;
use Illuminate\Support\Str;


class PurchaseorderController extends Controller
{
    

    public function indexAdmin()
    {
        $orders = PurchaseOrder::all();

        return view('admin.purchase.index',compact('orders'));
    }


    function indexPembeli(){
        $order = PurchaseOrder::all();

        return view('pembeli.purchase.index',compact('orders'));
    }


    public function create()
    {
        $product = Product::all();
        return view ('admin.purchase.add',compact('product'));
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'products_id' => 'required|exists:products,id',
            'nama'        => 'required|string',
            'alamat'      => 'required|string',
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
        
        PurchaseOrder::create([
            'no_order'     => 'PO' . Str::random(4),
            'nama'         => $request->nama,
            'alamat'       => $request->alamat,
            'products_id'  => $product_id,
            'qty'          => $request->qty,
            'total_harga'  => $total_harga,
        ]);

        return redirect()->route('admin.purchase')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    


    public function show(string $id)
    {
         $order = PurchaseOrder::findOrFail($id);

         return view('admin.purchase.detail', compact('order'));
 
    }
    

    public function edit(string $id)
    {
        $order = PurchaseOrder::findOrFail($id);
        $product = Product::all();

        return view('admin.purchase.edit', compact('order','product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'products_id' => 'required|exists:products,id',
            'nama'        => 'required|string',
            'alamat'      => 'required|string',
            'qty'         => 'required|integer|min:1',
        ]);
        
        $product_id = $request->products_id;

        $product = Product::findOrFail($product_id);
        $order = PurchaseOrder::findOrFail($id);
        
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
            'products_id'  => $product_id,
            'qty'          => $request->qty,
            'total_harga'  => $total_harga,
        ]);

        return redirect()->route('admin.purchase')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    

    public function destroy(string $id)
    {
        $order = PurchaseOrder::findOrFail($id);   
        $product_id = $order->products_id;
        $product = Product::findOrFail($product_id);
        $stock = $product->stock;
        $qty = $order->qty;
        $stockUpdate = $stock + $qty;

        $product->update([
            'stock'    => $stockUpdate,
        ]);
        
        $order->delete();

        return redirect()->route('admin.purchase')->with(['success' => 'Data Berhasil Dihapus!']);
    
    }
}
