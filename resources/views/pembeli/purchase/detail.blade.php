@extends('layouts.appDashboard')

@section('konten')

<div class="x_content">

<h3>Table Data order</h3>


<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <th class="column-title">Kode Order</th>
        <th class="column-title">Nama Pembeli</th>
        <th class="column-title">Qty</th>
        <th class="column-title">Total_ Harga </th>
      </tr>
    </thead>

    <tbody>
      <tr class="even pointer">
        <td class=" ">{{ $order->no_order }}</td>
        <td class=" ">{{ $order->nama }}</td>
        <td class=" ">{{ $order->qty }}</td>
        <td class=" ">@currency($order->total_harga)</td>
      </tr>
    </tbody>
  </table>
</div>

<h3>Table Data Produk</h3>


<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action" >
    <thead>
      <tr class="headings">
        <th class="column-title">Nama Produk</th>
        <th class="column-title">Harga</th>
        <th class="column-title">Qty</th>
        <th class="column-title">Kategori</th>
      </tr>
    </thead>

    <tbody>
      <tr class="even pointer">
        <td class=" ">{{ $order->product->nama }}</td>
        <td class=" ">@currency($order->product->harga)</td>
        <td class=" ">{{ $order->qty }}</td>
        <td class=" ">{{ $order->product->kategori }}</td>
      </tr>
    </tbody>
  </table>
</div>


</div>

@endsection