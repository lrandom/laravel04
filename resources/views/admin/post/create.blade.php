@extends('admin.layout')
@section('main-content')
    <div class="card card-primary">
        <div class="card-header">
        </div>
        <form method="post" action="{{route('admin.post.do-create')}}">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" class="form-control" id="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="name">Content</label>
                    <textarea name="content" class="form-control">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="parent_id">Parent Category</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">None</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
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
            <a href="{{route('admin.post.list')}}">Post</a>
        </li>
        <li class="breadcrumb-item active">
            Create
        </li>
    </ol>
@endsection

@section('title')
    Create Post
@endsection
