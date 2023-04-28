@extends('admin.layout.master')


@section('content')

    <h1>{{ auth()->guard('admin')->user() }}</h1>
@endsection