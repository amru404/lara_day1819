@extends('layouts.appDashboard')

@section('konten')
<div class="container">
    <h1>Buat Pesanan Baru</h1>
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" name="name"  value="{{ $user->name }}" id="name" class="form-control" required>
        </div>

        
        <div class="form-group">
            <label for="email">Email User</label>
            <input type="email" name="email"  value="{{ $user->email }}" id="email" class="form-control" required>
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
            <label for="password">Passowrd</label>
            <input type="password" name="password" id="password"  value="{{ $user->password }}" class="form-control" required>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">Simpan Order</button>
    </form>
</div>

@endsection
