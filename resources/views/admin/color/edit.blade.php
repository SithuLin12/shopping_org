@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('color.index') }}" class="btn btn-dark">All Category</a>
    </div>

    <hr>

    <form action="{{ route('color.update',$color->slug) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Enter Category Name</label>
            <input type="text" name="name" value="{{$color->name}}" id="" class="form-control">
        </div>

        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
