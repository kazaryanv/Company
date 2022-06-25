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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    <form action="{{route('company_panel.store')}}" method="post" enctype="multipart/form-data">
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
    @if(isset($data))
        @foreach($data as $row)
            <div class="d-flex">
                <div>
                    <h2>{{ $row -> company_name }}</h2>
                    <p>{{ $row -> email}}</p>
                </div>
                <div style="width: 15%;height: 70px;display: flex;align-items: center;justify-content: center;">
                    <img style="width: 50px;height: 50px;" src="{{asset('storage/' . $row -> logo)}}">
                </div>
            </div>
{{--            <a href="{{ route('one-image', $row) }}">More</a>--}}
            <div style="border-bottom-style: ridge;"></div>
        @endforeach
    @endif
@endsection