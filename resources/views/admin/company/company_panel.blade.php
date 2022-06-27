@extends('layouts.all')
@section('title')
    companyPanel
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
    <!-- Button trigger modal -->
    <button style="margin: 10px 20px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create New Company
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Company</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store-company')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label style="display: flex; justify-content: center" for="image" class="form-label">Logo Company</label>
                            <input style="height: unset" class="form-control" type="file" id="image" name="image" multiple />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="display: flex; justify-content: center" class="form-label" for="company_name">company_name</label>
                            <input type="text" id="company_name" name="company_name" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="display: flex; justify-content: center" class="form-label" for="email">email</label>
                            <textarea class="form-control" id="email" name="email" rows="4"></textarea>
                        </div>
                        <div class="form-outline mb-4" >
                            <label style="display: flex; justify-content: center" class="form-label" for="website">website</label>
                            <textarea style="margin-bottom: 10px" class="form-control" id="website" name="website" rows="4"></textarea>
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
    <a class="btn btn-primary" href="{{route('dashboard')}}">Back</a>
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
                    @if(isset($data))
                        @foreach($data as $row)
                            <tr>
                            <th scope="row">{{ $row -> id}}</th>
                            <td>{{ $row -> company_name }}</td>
                            <td>{{ $row -> website }}</td>
                            <td>{{ $row -> email }}</td>
                            <td> <img class="col" style="width: 50px;height: 50px; border-radius: 50%" src="{{asset('storage/' . $row -> logo)}}"></td>
                            <td> <div>
                                    <div><a class="btn btn-outline-success btn-sm mb-1" href="{{route('show-company' , $row->id)}}">Edit</a></div>
                                    <div><a class="btn btn-outline-danger btn-sm" href="{{route('delete-company', $row->id)}}">Delete</a></div>
                                </div></td>
                            </tr>
                        @endforeach
                    @endif

        </tbody>
    </table>
@endsection