@extends('admin.layout.master')


@section('content')
<h4>Color List</h4>
    <div class="">
        <a href="{{ route('color.create') }}" class="btn btn-success">Add Category</a>
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
            @foreach ($color as $c )
            <tr>
                <td>{{ $c->name }}</td>
                <td>
                    <a href="{{ route('color.edit',$c->slug) }}" class="btn btn-primary">Edit</a>
                <form action="{{route('color.destroy',$c->slug)}}" onsubmit="return confirm('Sure for color {{$c->name}} delete?')" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger">
                </form>
                </td>
            </tr>



            @endforeach
        </tbody>
    </table>
    {{$color->links()}}
@endsection
