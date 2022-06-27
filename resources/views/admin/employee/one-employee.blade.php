@extends('layouts.all')
@section('title')
    employee
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('employee-panel.index')}}">Back</a>
                <h2>{{ $employee -> name }}</h2>
                <p>Author`  {{ $employee -> surname }}</p>
                <p>Author`  {{ $employee -> email }}</p>
                <p>Author`  {{ $employee -> phone_number }}</p>
                <p>Published`  {{ $employee -> created_at }}</p>
{{--                <form class="d-inline" action="{{ route('employee-panel.edit' , $employee) }}" method="get">--}}
{{--                    @csrf--}}
{{--                    <button  class="btn btn-outline-success">Edit</button>--}}
{{--                </form>--}}
                <form class="d-inline" action="{{ route('employee-panel.destroy', $employee) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection