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
                    <th>Title</th>
                    <th>Parent</th>
                    <th style="width: 150px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            <?php
                            $category = \App\Models\Category::find($item->category_id);
                            if ($category) {
                                echo $category->name;
                            } else {
                                echo "None";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="{{route('admin.post.edit',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Sure kèo ?')"
                               href="{{route('admin.post.delete',['id'=>$item->id])}}"
                               class="btn btn-danger">Xoá</a>
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
            Post
        </li>

    </ol>
@endsection

@section('title')
    List Post
@endsection
