@extends('layouts.all')
@section('title')
    Edit employee
@endsection
@section('content')
    <div class="container">
        <form action="{{ route("update")}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$employee->id}}">
            <input value="{{ $employee->company_id}}" name="company_id" type="hidden">
            <div class="mb-3">
                <label for="name" class="form-label"> name</label>
                <input value="{{ $employee->name  }}" name="name" type="text" class="form-control" id="name" placeholder="name">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">surname</label>
                <input value="{{ $employee->surname  }}" name="surname" type="text" class="form-control" id="surname" placeholder="surname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input value="{{ $employee->email  }}" name="email" type="text" class="form-control" id="email" placeholder="email">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">phone_number</label>
                <input value="{{$employee->phone_number}}" name="phone_number" type="text" class="form-control" id="phone_number">
            </div>

            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
