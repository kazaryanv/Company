@extends('layouts.all')
@section('title')
    Edit Company
@endsection
@section('content')
    <div class="container">
        <form action="{{ route("update-company")}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$company->id}}">
            <div class="mb-3">
                <label for="logo" class="form-label">logo</label>
                <input value="{{ $company->logo  }}" name="logo" type="file" class="form-control" id="logo" placeholder="logo">
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label"> company_name</label>
                <input value="{{ $company->company_name  }}" name="company_name" type="text" class="form-control" id="company_name" placeholder="company_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> email</label>
                <input value="{{ $company->email  }}" name="email" type="text" class="form-control" id="email" placeholder="email">
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">website</label>
                <input value="{{ $company->website  }}" name="website" type="text" class="form-control" id="website" placeholder="website">
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection