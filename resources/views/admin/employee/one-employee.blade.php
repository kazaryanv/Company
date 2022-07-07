@extends('layouts.all')
@section('title')
    employee
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('employee.index')}}">Back</a>
                <div>
                    @if(isset($employee->company->logo))
                    Company Logotipe
                    @else
                        Logo Not Found
                    @endif
                    <img style="width: 50px;height: 50px; border-radius: 50%" src="@if(isset($employee->company->logo)){{asset('storage/' . $employee->company->logo)}}@else {{asset('images/defolt.jpg')}} @endif" alt="">
                </div>
                <h2>Name`  {{$employee->name}}</h2>
                <p>Surname` {{$employee->surname}}</p>
                <p>Email`  @if((isset($employee->email))) {{ $employee -> email }}@else -------------------@endif</p>
                <p>Phone`  @if((isset($employee->phone_number))) {{ $employee->phone_number }}@else -------------------@endif</p>
                <p>Published`  {{ $employee->created_at }}</p>
                <form class="d-inline" action="{{ route('employee.edit', $employee) }}" method="get">
                    @csrf
                    <button class="btn btn-outline-success">Edit</button>
                </form>
                <form class="d-inline" action="{{ route('employee.destroy', $employee) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection