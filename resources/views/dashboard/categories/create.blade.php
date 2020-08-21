@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{Route('dashboard')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action=" {{Route('categories.store')}} " method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name" value=" {{old('name')}} ">
                        @error('name')
                            <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">meta keywords</label>
                        <input type="text" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords')}}" class="form-control @error('meta_keywords') is-invalid @enderror">
                        @error('meta_keywords')
                            <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_des">meta des</label>
                        <textarea name="meta_des" rows="3" id="meta_des" cols="30"class="form-control @error('meta_des') is-invalid @enderror" rows="10"></textarea>
                        @error('meta_des')
                            <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection
