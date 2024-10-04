<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('admin/product/index', compact('products'));

    }

   
    
    public function create()
    {
        return view('admin.product.add');
    }

    

    public function store(Request $request)
    {       
        $this->validate($request, [
            'nama'     => 'required|string',
            'harga'    => 'required|numeric',
            'stock'    => 'required|integer',
            'kategori' => 'required|string',
        ]);

        Product::create([
            'nama'     => $request->nama,
            'harga'    => $request->harga,
            'stock'    => $request->stock,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.product')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    
    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
          $Product = Product::findOrFail($id);

          return view('admin.product.edit', compact('Product'));
    }

    

    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'nama'     => 'required|string',
            'harga'    => 'required|numeric',
            'stock'    => 'required|integer',
            'kategori' => 'required|string',
        ]);

        $product = Product::findOrFail($id);

        
            $product->update([
                'nama'     => $request->nama,
                'harga'    => $request->harga,
                'stock'    => $request->stock,
                'kategori' => $request->kategori,
            ]);

        return redirect()->route('admin.product')->with(['success' => 'Data Berhasil Diubah!']);
    }

    
    

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product')->with(['success' => 'Data Berhasil Dihapus!']);
    
    }
}
