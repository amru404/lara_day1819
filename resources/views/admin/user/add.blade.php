@extends('layouts.appDashboard')

@section('konten')
<div class="container">
    <h1>Buat Pesanan Baru</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        
        <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        
        <div class="form-group">
            <label for="email">Email </label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" name="role" id="role">
            <option value="admin">Admin</option>
            <option value="penjual">Penjual</option>
            <option value="pembeli">Pembeli</option>
            </select>
        </div>


        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="passowrd" id="passowrd" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">Simpan Order</button>
    </form>
</div>

@endsection
