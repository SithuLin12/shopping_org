@extends('admin.layout.master')


@section('content')
    <h4>Category List</h4>
    <div class="">
        <a href="{{ route('category.create') }}" class="btn btn-success">Add Category</a>
    </div>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($category as $c )
            <tr>
                <td>{{ $c->name }}</td>
                <td>
                    <a href="{{ route('category.edit',$c->slug) }}" class="btn btn-primary">Edit</a>
                <form action="{{route('category.destroy',$c->slug)}}" onsubmit="return confirm('Sure for category {{$c->name}} delete?')" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger">
                </form>
                </td>
            </tr>



            @endforeach
        </tbody>
    </table>
    {{$category->links()}}
@endsection
