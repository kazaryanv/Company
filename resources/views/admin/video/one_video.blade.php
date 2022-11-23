@extends('layouts.all')
@section('title')
    CompanyPanel
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('video.index')}}">Back</a>
                <div style="text-align:center">
                    <button onclick="playPause()">Play/Pause</button>
                    <button onclick="makeBig()">Big</button>
                    <button onclick="makeSmall()">Small</button>
                    <button onclick="makeNormal()">Normal</button>
                </div>
                <video id="video1" width="420">
                    <source src="{{asset('storage/' . $video -> video)}}" type="video/mp4">
                    <source src="{{asset('storage/' . $video -> video)}}" type="video/ogg">
                    Your browser does not support HTML video.
                </video>
                <h2>Name`{{ $video -> name }}</h2>
                <p>content`  {{ $video -> content }}</p>
                <p>Published`{{ $video -> created_at }}</p>
                <form class="d-inline" action="{{ route('video.edit', $video) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var myVideo = document.getElementById("video1");

        function playPause() {
            if (myVideo.paused)
                myVideo.play();
            else
                myVideo.pause();
        }

        function makeBig() {
            myVideo.width = 560;
        }

        function makeSmall() {
            myVideo.width = 320;
        }

        function makeNormal() {
            myVideo.width = 420;
        }
    </script>
@endsection