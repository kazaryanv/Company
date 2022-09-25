@extends('layouts.all')
@section('title')
    @if(isset($company))
        Edit Company
    @else
        New Company
    @endif
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        @if(isset($company))
            <h2>Update <span>{{ $company -> company_name }}</span> company</h2>
        @else
            <h2>Create new company</h2>
        @endif
        <form action="{{ (isset($company)) ? route('companies.update', $company)  : route('companies.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            @if(isset($company))
                @method('put')
            @endif
            <div class="mb-3">
                <label for="logo" class="form-label">logo Company</label>
                @if(isset($company))
                    <img style="width: 50px;height: 50px;border-radius: 50%;margin-bottom: 5px" src="@if(isset($company -> logo)){{asset('storage/' . $company -> logo)}} @else {{asset('images/defolt.jpg')}} @endif" alt="">
                @endif
                <input value="{{(isset($company)) ? $company->logo : ''  }}" name="logo" type="file" class="form-control" id="logo" placeholder="logo">
            </div>

            <div class="mb-3">
                <label for="company_name" class="form-label">company_name</label>
                <input  value="{{(isset($company)) ? $company->company_name : '' }}" type="text" name="company_name"  class="form-control" id="company_name" placeholder="company_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input  value="{{(isset($company)) ? $company->email : '' }}" type="text" name="email"  class="form-control" id="email" placeholder="email">
            </div>
            <div class="mb-3">

                <label for="website" class="form-label">website</label>
                <input  value="{{(isset($company)) ? $company->website : '' }}" type="text" name="website"  class="form-control" id="website" placeholder="website">
            </div>
            @if(isset($company))
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('companies.show', $company->id) }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('companies.index') }}">Back</a>
            @endif

        </form>

    </div>
@endsection