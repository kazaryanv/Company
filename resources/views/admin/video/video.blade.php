@extends('layouts.all')
@section('title')
Videos
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
    <a class="btn btn-primary ms-2 mb-2 mt-2" href="{{route('video.create')}}">Create New Employee</a>
    <a class="btn btn-primary ms-2 mb-2 mt-2" href="{{route('dashboard')}}">Back</a>
    <div style="margin-left: 20px;display: flex;justify-content: space-around;">
    @if(isset($video))
            @foreach($video as $row)
                <div>
                    <img class="col" style="width: 50px;height: 50px; border-radius: 50%" src="@if(isset($row -> picture)){{asset('storage/' . $row -> picture)}} @else {{asset('images/defolt.jpg')}} @endif"></td>
                    <h1>{{ $row -> name }}<h1>
                    <p>{{ $row -> content }}</p>
                    <div>
                    <a class="btn btn-outline-success btn-sm mb-1" href="{{route('video.show' , $row->id)}}">Edit</a>
                    <form class="d-inline" action="{{ route('video.destroy', $row->id) }}" method="post">
                     @csrf
                     @method('delete')
                     <button class="btn btn-outline-danger btn-sm mb-1">Delete</button>
                     </form>
                     </div>
                </div>
            @endforeach
    @endif
    </div>
@endsection