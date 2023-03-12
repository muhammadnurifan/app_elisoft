@extends('layouts.master')
@section('content')

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
          <form action="/change-password" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                    <button type="submit" href="#" class="btn btn-success btn-sm" style="float: right;  margin-left: 10px;">Update</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" autocomplete="off">
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
          </form>
        </div>
    </div>
<section>
@endsection
