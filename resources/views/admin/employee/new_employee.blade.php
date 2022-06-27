@extends('layouts.all')
@section('title')
    employeePanel
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
        @if(isset($employee))
            <h2>Update <span style="color:red;font-weight: bold">{{ $employee -> name }}</span> employee</h2>
        @else
            <h2>Create new employee</h2>
        @endif
        <form action="{{ (isset($employee)) ? route('employee-panel.update', $employee)  : route('employee-panel.store') }}" method="post">
            @csrf
            @if(isset($employee))
                @method('put')
            @endif
            <div class="mb-3">
                <select class="form-control"  name="company_id">--}}
                    <option value="company_id">Please select a company</option>
                    @foreach(\App\Models\Company::all() as $company)
                        <option  id="company_id" name="company_id"  value="{{$company->company_id}}">{{$company->company_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Book name</label>
                <input value="{{(isset($employee)) ? $employee->name : '' }}" type="text" name="name" class="form-control" id="name" placeholder="name">
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">surname</label>
                <input  value="{{(isset($employee)) ? $employee->surname : '' }}" type="text" name="surname"  class="form-control" id="surname" placeholder="surname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input  value="{{(isset($employee)) ? $employee->email : '' }}" type="text" name="email"  class="form-control" id="email" placeholder="email">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">phone_number</label>
                <input  value="{{(isset($employee)) ? $employee->phone_number : '' }}" type="text" name="phone_number"  class="form-control" id="phone_number" placeholder="phone_number">
            </div>
            @if(isset($employee))
                <button class="btn btn-primary"> Update</button>
                <a href="{{ route('employee-panel.show', $employee->id) }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('employee-panel.index') }}">Back</a>

            @endif

        </form>

    </div>
@endsection