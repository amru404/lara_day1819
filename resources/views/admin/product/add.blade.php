@extends('layouts.appDashboard')

@section('konten')
<div class="container">
    <h1>Buat Pesanan Baru</h1>
    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf

        <!-- Nomor Order -->
        <div class="form-group">
            <label for="nama">Nama Product</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <!-- User ID -->
        <div class="form-group">
            <label for="harga">Harga Product</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>

        <!-- Tanggal Order -->
        <div class="form-group">
            <label for="stock">stock Order</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>

        <!-- Alamat Pengiriman -->
        <div class="form-group">
            <label for="*">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" required>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">Simpan Order</button>
    </form>
</div>

@endsection
