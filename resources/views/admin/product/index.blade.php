@extends('layouts.appDashboard')

@section('konten')

<div class="x_content">

<h3>Table Data Produk</h3>

<a href="{{route('admin.product.add')}}" class="btn btn-primary">Add Product</a>

<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action"  id="datatable">
    <thead>
      <tr class="headings">
      <th class="column-title">No </th>
        <th class="column-title">Nama Produk </th>
        <th class="column-title">Harga </th>
        <th class="column-title">Stock </th>
        <th class="column-title">Kategori </th>
        <th class="column-title no-link last"><span class="nobr">Action</span></th>
      </tr>
    </thead>

    
    <?php $number = 1; ?>

    <tbody>
      @foreach($products as $p)
      <tr class="even pointer">
        <td>{{ $number }}</td>
        <?php $number++; ?>
        <td class=" ">{{ $p->nama }}</td>
        <td class=" ">{{ $p->harga }}</td>
        <td class=" ">{{ $p->stock }}</td>
        <td class=" ">{{ $p->kategori }}</td>
        <td class=" ">
            <a href="{{route('admin.product.edit', $p->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{route('admin.product.destroy', $p->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
        
    
</div>

@endsection