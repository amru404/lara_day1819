@extends('layouts.appDashboard')

@section('konten')

<div class="x_content">

<h3>Table Data Produk</h3>

<a href="{{route('admin.sales.add')}}" class="btn btn-primary">Add Product</a>

<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action"  id="datatable">
    <thead>
      <tr class="headings">
      <th class="column-title">No </th>
        <th class="column-title">Kode Order</th>
        <th class="column-title">Nama Pembeli</th>
        <th class="column-title">Nama Barang</th>
        <th class="column-title">Vendor</th>
        <th class="column-title">Qty</th>
        <th class="column-title">Total_ Harga </th>
        <th class="column-title no-link last"><span class="nobr">Action</span></th>
      </tr>
    </thead>

    
    <?php $number = 1; ?>

    <tbody>
      @foreach($orders as $p)
      <tr class="even pointer">
        <td>{{ $number }}</td>
        <?php $number++; ?>
        <td class=" ">{{ $p->no_order }}</td>
        <td class=" ">{{ $p->nama }}</td>
        <td class=" ">{{ $p->product->nama }}</td>
        <td class=" ">{{ $p->vendor }}</td>
        <td class=" ">{{ $p->qty }}</td>
        <td class=" ">@currency($p->total_harga)</td>
        <td class=" ">
            <a href="{{route('admin.sales.show', $p->id)}}" class="btn btn-primary">Details</a>
            <a href="{{route('admin.sales.edit', $p->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{route('admin.sales.destroy', $p->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
        
    
</div>

@endsection