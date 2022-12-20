@extends('admin.layout')
@section('main-content')


    <div class="card card-primary">
        <div class="card-header">
        </div>


        <form method="post" action="{{route('admin.user.do-edit',['id'=>$obj->id])}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" value="{{$obj->email}}" id="email"
                           placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$obj->name}}" id="name"
                           placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.user.list')}}">User</a>
        </li>
        <li class="breadcrumb-item active">
            Edit
        </li>
    </ol>
@endsection

@section('title')
    Edit User
@endsection
