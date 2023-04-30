@extends('admin.layout.master')


@section('content')
<h4>Brand List</h4>
    <div class="">
        <a href="{{ route('brand.create') }}" class="btn btn-success">Add Brand</a>
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
            @foreach ($brand as $b )
            <tr>
                <td>{{ $b->name }}</td>
                <td>
                    <a href="{{ route('brand.edit',$b->slug) }}" class="btn btn-primary">Edit</a>
                <form action="{{route('brand.destroy',$b->slug)}}" onsubmit="return confirm('Sure for {{$b->name}} delete')" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger">
                </form>
                </td>
            </tr>



            @endforeach
        </tbody>
    </table>
    {{$brand->links()}}
@endsection
