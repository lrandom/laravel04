@extends('layout')
@section('title')
  Profile
@endsection
@section('content')
    <script src="{{asset('js/main.js')}}"></script>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('user.update-profile')}}">
    @csrf
    <input type="text" name="full_name" value="{{old('full_name')}}"/><br>

    @error('full_name')
    <div>
        {{$message}}
    </div>
    @enderror

    <input type="text" name="user_name"/><br>
    @error('user_name')
    <div>
        {{$message}}
    </div>
    @enderror

    <input type="text" name="address"/><br>

    @error('address')
    <div>
        {{$message}}
    </div>

    @enderror

    <button>Submit</button>
</form>
@endsection
