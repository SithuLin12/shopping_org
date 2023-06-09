@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('brand.index') }}" class="btn btn-dark">All Brand</a>
    </div>

    <hr>

    <form action="{{ route('brand.update',$brand->slug) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Enter Brand Name</label>
            <input type="text" name="name" value="{{$brand->name}}" id="" class="form-control">
        </div>

        <input type="submit" value="Update" class="btn btn-primary">
    </form>
@endsection
