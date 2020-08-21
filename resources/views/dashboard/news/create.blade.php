@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">news</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{Route('dashboard')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add new</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add news</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{Route('news.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>Categories</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">all categories</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="title" placeholder="Enter title" value="{{old('title')}}">
                        @error('title')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <input type="text" id="body" name="body" value="{{old('body')}}"
                            class="form-control @error('body') is-invalid @enderror">
                        @error('body')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control image">
                    </div>

                    <div class="form-group">
                        <img src="{{ asset('uploads/news_images/default.png') }}" style="width: 100px"
                            class="img-thumbnail image-preview" alt="">
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
