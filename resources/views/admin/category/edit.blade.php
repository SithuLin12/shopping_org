@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('category.index') }}" class="btn btn-dark">All Category</a>
    </div>

    <hr>

    <form action="{{ route('category.update',$category->slug) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Enter Category Name</label>
            <input type="text" name="name" value="{{$category->name}}" id="" class="form-control">
        </div>

        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
