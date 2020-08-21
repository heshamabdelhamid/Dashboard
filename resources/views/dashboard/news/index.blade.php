@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">news <small>{{ $news->total() }}</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{Route('dashboard')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item active">news</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="box-header with-border">

            <form action="{{ route('news.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search"
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4">
                        <select name="category_id" class="form-control">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('news.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add </a>

                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

    </div>
    <!-- /.content-header -->
    @if ($news->count() > 0)
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $index => $new)
                <tr>
                    <td> {{$index + 1 }} </td>
                    <td> {{ $new->title}} </td>
                    <td> {{ $new->body}} </td>
                    <td><img src="{{ $new->image_path }}" style="width: 100px" class="img-thumbnail" alt=""></td>
                    <td> {{$new->category->name}} </td>
                    <td>
                        <a href=" {{route('news.edit',$new->id )}} " class="btn btn-primary"><i class="fa fa-edit"></i>
                            Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$new->id}}">
                            <i class="fa fa-trash"></i> Delete
                        </button>

                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$new->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this new ? {{$new->title}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <form action="{{ route('news.destroy',$new->id) }}" method="post" style="display:inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger delete btn-sm"> delete</button>
                                        </form><!-- end of form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $news->appends(request()->query())->links() }}
    </div>
    @else
    <h2> not found data </h2>
    @endif

</div>

@endsection
