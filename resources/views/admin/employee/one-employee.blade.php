@extends('layouts.all')
@section('title')
    employeePanel
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="#">Back</a>
                <h2>{{ $employee -> name }}</h2>
                <p>Author`  {{ $employee -> surname }}</p>
                <p>Author`  {{ $employee -> email }}</p>
                <p>Author`  {{ $employee -> phone_number }}</p>
                <p>Published`  {{ $employee -> created_at }}</p>
                <button class="btn btn-primary">
                    <a style="color:white; text-decoration: none" href="{{ route('edit_employee', $employee->id) }}">Edit</a>
                </button>
                <button class="btn btn-primary">
                    <a style="color:white; text-decoration: none" href="{{route('delete-employee', $employee->id)}}">Delete</a>
                </button>
            </div>
        </div>
    </div>
@endsection