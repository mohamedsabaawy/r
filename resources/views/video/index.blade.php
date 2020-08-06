@extends('layouts.app')
@section('title')
    || videos
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col"><a href="{{route('video.create')}}" class="btn btn-info">Add Video</a></div>
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div id="video" class="m-auto">
                    
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(count($videos)>0)
                            <table class="table">
                                <thead>
                                    {{-- <tr>
                                        <th>name</th>
                                        <th>video</th>
                                        <th>Action</th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    @foreach ($videos as $video)
                                        <tr>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm" onclick= "video('{{asset('storage/'.$video->video)}}' , '{{$video->name}}')">
                                                    Play
                                                </button>
                                            </td>
                                            <td>
                                                {{$video->user->name}}
                                            </td>
                                            <td>
                                                <img width="70px" height="70px" src="{{asset('storage/'.$video->photo)}}">
                                            </td>
                                            <td><a class="nav-link" href="{{route('video.show' , $video->id)}}">{{$video->name}}</a></td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm float-right" href="{{route('video.edit' , $video->id)}}">edit</a>
                                                <form action="{{route('video.destroy' , $video->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-outline-danger btn-sm">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="m-auto">
                                <h1>No videos</h1>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
