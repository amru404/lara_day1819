@extends('layouts.appDashboard')

@section('konten')
<div class="container">
    <h1>Buat Pesanan Baru</h1>
    <form action="{{ route('admin.product.update', $Product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nomor Order -->
        <div class="form-group">
            <label for="nama">Nama Product</label>
            <input type="text" name="nama"  value="{{ $Product->nama }}" id="nama" class="form-control" required>
        </div>

        <!-- User ID -->
        <div class="form-group">
            <label for="harga">Harga Product</label>
            <input type="number" name="harga"  value="{{ $Product->harga }}" id="harga" class="form-control" required>
        </div>

        <!-- Tanggal Order -->
        <div class="form-group">
            <label for="stock">stock Order</label>
            <input type="number" name="stock" id="stock"  value="{{ $Product->stock }}" class="form-control" required>
        </div>

        <!-- Alamat Pengiriman -->
        <div class="form-group">
            <label for="*">Kategori</label>
            <input type="text" name="kategori" id="kategori"  value="{{ $Product->kategori }}" class="form-control" required>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">Simpan Order</button>
    </form>
</div>

@endsection
