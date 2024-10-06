@extends('layouts.appDashboard')

@section('konten')
<div class="container">
    <h1>Buat Pesanan Baru</h1>
    <form action="{{ route('pembeli.purchase.store') }}" method="POST">
        @csrf

        <!-- Nomor Order -->
        <!-- <div class="form-group">
            <label for="nama">Nama Pembeli</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div> -->

        <input type="hidden" name="no_order" value="">
        <input type="hidden" name="nama" value="{{ Auth::user()->name }}">
        <input type="hidden" name="total_harga" value="0">

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>


        <label for="products_id">Nama Product</label>
        <select class="form-control" id="products_id" name="products_id" >
                @foreach ($product as $p)
                    <option value="{{ $p->id }}"> {{ $p->nama }} : stock {{$p->stock}}</option>    
                @endforeach


        </select>

        <div class="form-group">
            <label for="qty">Kuantitas</label>
            <input type="number" name="qty" id="qty" class="form-control" required>
        </div>


        <hr>

        <button type="submit" class="btn btn-primary">Simpan Order</button>
    </form>
</div>

@endsection
