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
          <form action="/user-post" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create New User</h3>
                    <button type="submit" href="#" class="btn btn-primary btn-sm" style="float: right;  margin-left: 10px;">Save</button>
                    <a href="/users" class="btn btn-light btn-sm" style="float: right;">Back to list</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
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
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" value="{{ old('password')}}" placeholder="Enter password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" value="{{ old('email')}}" placeholder="Enter email">
                                        @error('email')
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
                </div>
            </div>
          </form>
        </div>
    </div>
<section>
@endsection
