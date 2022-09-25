@extends('layouts.all')
@section('title')
    @if(isset($employee))
        employeePanel_Update
    @else
        New Employee
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
        @if(isset($employee))
            <h2>Update <span style="color:red;font-weight: bold">{{ $employee -> name }}</span> employee</h2>
        @else
            <h2>Create new employee</h2>
        @endif
        <form action="{{ (isset($employee)) ? route('employee.update', $employee)  : route('employee.store') }}" method="post">
            @csrf
            @if(isset($employee))
                @method('put')
            @endif
            <div class="mb-3">
                @if(isset($employee))
                    <img style="width: 50px;height: 50px;border-radius: 50%;border: 2px solid black;margin-bottom: 5px" src="@if(isset($employee->company->logo)){{asset('storage/' . $employee->company->logo)}}@else {{asset('images/defolt.jpg')}} @endif"
                         alt="">
                @endif
                <select class="form-control" id="company_id"  name="company_id">
                    <option>Please select a company</option>
                    @foreach(\App\Models\Company::all() as $company)
                            <option @if((isset($employee)) ? $company->id == old('company_id', $employee->company_id) : '') selected @endif value="{{$company->id}}">{{$company->company_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
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
                <a href="{{ route('employee.show', $employee->id) }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('employee.index') }}">Back</a>

            @endif

        </form>

    </div>
@endsection