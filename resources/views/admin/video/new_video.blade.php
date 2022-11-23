@extends('layouts.all')
@section('title')
    @if(isset($company))
        Edit Video
    @else
        New Video
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
        @if(isset($video))
            <h2>Update <span>{{ $video -> name }}</span> Video</h2>
        @else
            <h2>Create new video</h2>
        @endif
        <form action="{{ (isset($video)) ? route('video.update', $video)  : route('video.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($video))
                @method('put')
            @endif
            <div class="mb-3">
                <label for="picture" class="form-label">picture video</label>
                @if(isset($video))
                    <img style="width: 50px;height: 50px;border-radius: 50%;margin-bottom: 5px" src="@if(isset($video -> picture)){{asset('storage/' . $video -> picture)}} @else {{asset('images/defolt.jpg')}} @endif" alt="">
                @endif
                <input value="{{(isset($video)) ? $video->picture : ''  }}" name="picture" type="file" class="form-control" id="picture" placeholder="picture">
            </div>
            <div class="mb-3">
                <label for="video" class="form-label">video</label>
                <input value="{{(isset($video)) ? $video->video : ''  }}" name="video" type="file" class="form-control" id="video" placeholder="video">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input  value="{{(isset($video)) ? $video->name : '' }}" type="text" name="name"  class="form-control" id="name" placeholder="name">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <input  value="{{(isset($video)) ? $video->content : '' }}" type="text" name="content"  class="form-control" id="content" placeholder="content">
            </div>
            @if(isset($video))
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('video.show', $video->id) }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('video.index') }}">Back</a>
            @endif

        </form>

    </div>
@endsection