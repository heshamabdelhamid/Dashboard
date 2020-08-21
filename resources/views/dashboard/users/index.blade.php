@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">users<small>{{ $users->total() }}</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{Route('dashboard')}} ">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="box-header with-border">

            <form action="{{ route('users.index') }}" method="get">

                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="search"
                            value="{{ request()->search }}">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                    <a href=" {{Route('users.create')}} " class="btn btn-success" style="margin-left:10px; display: inline"><i class="fa fa-plus"></i> Add</a>
                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

    </div>
    <!-- /.content-header -->
    @if ($users->count() > 0)
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td> {{$index + 1 }} </td>
                    <td> {{ $user->name}} </td>
                    <td> {{ $user->email}} </td>
                    <td>
                        <a href=" {{route('users.edit',$user->id )}} " class="btn btn-primary"><i class="fa fa-edit"></i> Edit </a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-trash"></i> Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel{{$user->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{$user->id}}">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this user ? {{$user->name}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                            style="display:inline-block">
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
        {{ $users->appends(request()->query())->links() }}
    </div>
    @else
    <h2> not found data </h2>
    @endif

</div>

@endsection
