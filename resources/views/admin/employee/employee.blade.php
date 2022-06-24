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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create New Employee
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Employees</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store-employee')}}" method="post">
                        @csrf
                        <div class="form-outline mb-4">
                            <label style="display: flex; justify-content: center" class="form-label" for="company_id">company_id</label>
                            <input type="text" id="company_id" name="company_id" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="display: flex; justify-content: center" class="form-label" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="display: flex; justify-content: center" class="form-label" for="surname">surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" >
                        </div>
                        <div class="form-outline mb-4">
                            <label style="display: flex; justify-content: center" class="form-label" for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-outline mb-4">
                            <label style="display: flex; justify-content: center" class="form-label" for="phone_number">phone_number</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control"  style="margin-bottom: 10px"/>
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">surname</th>
            <th scope="col">email</th>
            <th scope="col">Company</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($data))
                @foreach($data as $row)
                    <tr>
                    <th scope="row">{{ $row -> id}}</th>
                    <td>{{ $row -> name }}</td>
                    <td>{{ $row -> surname }}</td>
                    <td>{{ $row -> email}}</td>
                    <td> <img style="width: 50px;height: 50px; border-radius: 50%" src="{{asset('storage/' . $row -> logo)}}"></td>
                    <td><a href="{{ route('one-employee', $row->id) }}">More</a></td>
                    </tr>
                @endforeach
{{--                <div   class="mt-5">{{ $data->links() }} </div>--}}
            @endif
        </tbody>
    </table>
@endsection