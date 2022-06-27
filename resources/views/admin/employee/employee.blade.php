@extends('layouts.all')
@section('title')
    employeePanel
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a class="btn btn-primary ms-2 mb-2 mt-2" href="{{route('employee.create')}}">Create New Employee</a>
    <a class="btn btn-primary ms-2 mb-2 mt-2" href="{{route('dashboard')}}">Back</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">surname</th>
            <th scope="col">Company</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($employee))
                @foreach($employee as $row)
                    <tr>
                    <th scope="row">{{ $row -> id}}</th>
                    <td>{{ $row -> name }}</td>
                    <td>{{ $row -> surname }}</td>
                    <td><img style="width: 50px;height: 50px; border-radius: 50%" src="{{asset('storage/' . $row->company->logo)}}"></td>
                    <td>
                    <div><a class="btn btn-outline-success btn-sm mb-1" href="{{route('employee.show' , $row->id)}}">ALL Posts</a></div>
                    </td>
                    </tr>
                @endforeach
                <table><tr><td><span>{{$employee->links()}}</span></td></tr></table>
            @endif
        </tbody>s
    </table>
@endsection