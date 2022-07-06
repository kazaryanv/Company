@extends('layouts.all')
@section('title')
    companyPanel
@endsection
@section('content')
    <header style="margin: 0px 20px;outline: outset;display: flex;padding-left: 10px;">
        <h2>Company</h2>
    </header>
    <a class="btn btn-primary ms-2 mb-2 mt-2" href="{{route('companies.create')}}">Create New Company</a>
    <a style="margin: 20px 20px" class="btn btn-primary" href="{{route('dashboard')}}">Back</a>
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
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">website</th>
            <th scope="col">email</th>
            <th scope="col">Company-Logo</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($company))
            @foreach($company as $row)
                <tr>
                    <th scope="row">{{ $row -> id}}</th>
                    <td>{{ $row -> company_name }}</td>
                    <td>{{ $row -> website }}</td>
                    <td>{{ $row -> email }}</td>
                    <td> <img class="col" style="width: 50px;height: 50px; border-radius: 50%" src="@if(isset($row -> logo)){{asset('storage/' . $row -> logo)}} @else {{asset('images/defolt.jpg')}} @endif"></td>
                    <td>
                        <div>
                            <a class="btn btn-outline-success btn-sm mb-1" href="{{route('companies.show' , $row->id)}}">Edit</a>
                            <form class="d-inline" action="{{ route('companies.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger btn-sm mb-1">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection