@extends('layouts.all')
@section('title')
adminpanel
@endsection
@section('content')
<header>
    <div style="display: flex;align-items: center;justify-content: space-between;margin: 0px 30px;">
        <div><h1>LogoCompany</h1></div>
        <div>
            <a href="{{route('logout')}}">Logout Admin Panel</a>
        </div>
    </div>
</header>
    <div>
        <div class="modal-footer" style="justify-content: space-evenly;">
            <button class="btn btn-primary">
                <a style="color:white; text-decoration: none" href="{{route('company_panel')}}">Company</a>
            </button>
            <button class="btn btn-primary">
                <a style="color:white; text-decoration: none" href="{{route('employee.index')}}">Employee</a>
            </button>
        </div>
    </div>
@endsection