@extends('layouts.appDashboard')

@section('konten')

<div class="x_content">

<h3>Table Data User</h3>

<a href="{{route('admin.user.add')}}" class="btn btn-primary">Add User</a>

<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
      <th class="column-title">No </th>
        <th class="column-title">Nama</th>
        <th class="column-title">Email</th>
        <th class="column-title">Role</th>
        <th class="column-title no-link last"><span class="nobr">Action</span>
        </th>
        <th class="bulk-actions" colspan="7">
          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
      </tr>
    </thead>

    
    <?php $number = 1; ?>

    <tbody>
      @foreach($user as $u)
      <tr class="even pointer">
        <td>{{ $number }}</td>
        <?php $number++; ?>
        <td class=" ">{{ $u->nama }}</td>
        <td class=" ">{{ $u->email }}</td>
        <td class=" ">{{ $u->role }}</td>
        <td class=" ">
            <a href="{{route('admin.user.edit', $u->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{route('admin.user.destroy', $u->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
        
    
</div>

@endsection