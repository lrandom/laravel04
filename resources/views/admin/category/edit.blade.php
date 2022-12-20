@extends('admin.layout')
@section('main-content')
    <div class="card card-primary">
        <div class="card-header">
        </div>

        <form method="post" action="{{route('admin.category.do-edit',['id'=>$obj->id])}}">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{$obj->name}}" name="name" class="form-control" id="name"
                           placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="parent_id">Parent Category</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">None</option>
                        @foreach($categories as $category)
                            <option <?php if ($category->id == $obj->parent_id) {
                                echo 'selected="selected"';
                            } ?> value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
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
            <a href="{{route('admin.category.list')}}">Category</a>
        </li>
        <li class="breadcrumb-item active">
            Edit
        </li>
    </ol>
@endsection

@section('title')
    Edit Category
@endsection
