@extends('layouts.app')
@section('title')
    || {{$video->name}}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="col"><a href="{{route('video.create')}}" class="btn btn-info">Add video</a></div> --}}
            <div class="card">
                <div class="card-header">video player</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="m-auto w-auto" >
                        <h3>{{$video->name}}</h3>
                        <video src="{{asset('storage/'.$video->video)}}" controls width="630px" height="360px">
                            {{-- <source  type="video/mp4" > --}}
                        </video>
                    </div>
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
