@extends('layouts.all')
@section('title')
    CompanyPanel
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('company_panel')}}">Back</a>
                <div>Logotype Company`<img  style="width: 50px;height: 50px;border-radius: 50%" src="{{asset('storage/' . $company -> logo)}}"></div>
                <h2>Name Company`{{ $company -> company_name }}</h2>
                <p>Email Company`  {{ $company -> email }}</p>
                <p>Website Company`  {{ $company -> website }}</p>
                <p>Published`{{ $company -> created_at }}</p>
                    <a class="btn btn-outline-primary" href="{{ route('edit-company', $company->id) }}">Edit</a>
            </div>
        </div>
    </div>
@endsection