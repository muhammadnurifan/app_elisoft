@extends('layouts.master')
@section('content')

<!-- MODALS -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New User</h4>
                <a href="{{ route('user.create') }}" type="button" class="btn btn-light btn-sm">Create In Full Page</a>
            </div>
            <form action="/user-post" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name')}}" placeholder="Enter name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" value="{{ old('email')}}" placeholder="Enter email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" value="{{ old('password')}}" placeholder="Enter password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror 
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
                
            </div>
        </div>
    </div>
</div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
                <button type="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default" style="float: right;">New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td style="text-align: center;">
                            <div class="btn-group " role="group" data-placement="top" title="" data-original-title=".btn-xlg">
                                <a href="/user/{{$user->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm delete" user-id="{{$user->id}}" user-user_name="{{$user->name}}">Delete</a>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
</<section>
@endsection

@section('footer')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $('.delete').click(function(){
        var user_name = $(this).attr('user-user_name');
        var user_id = $(this).attr('user-id');
        swal({
        title: "Are you sure deleted data?",
        text: "With name "+user_name +" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/user/"+user_id+"/delete";
        } 
        });
    });
</script>
@stop