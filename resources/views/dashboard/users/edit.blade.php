@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{Route('dashboard')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit user</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{Route('users.update',$user->id)}}" method="POST">
                @csrf
                {{ method_field('put') }}

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">User Name </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name" value="{{$user->name}}">
                        @error('name')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Password confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection
