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
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
    <br>
    <br>
@endsection