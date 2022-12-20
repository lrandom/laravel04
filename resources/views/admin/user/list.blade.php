@extends('admin.layout')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th style="width: 150px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="{{route('admin.user.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Sure kèo ?')"
                               href="{{route('admin.user.delete',['id'=>$item->id])}}" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item">
            User
        </li>

    </ol>
@endsection

@section('title')
    List User
@endsection
