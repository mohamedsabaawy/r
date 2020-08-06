@extends('layouts.app')

@section('title')
    || upload new video
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Video</div>
                    <div class="container">
                        <form action="{{isset($video) ? route('video.update' , $video->id) : route('video.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($video)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label for="">Video Name</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Enter video name" value="{{isset($video) ? $video->name : ''}}" required>
                            </div>
                            <div class="form-group">
                                
                                <input type="text" class="form-control" name="user_id" id="" placeholder="Enter video name" value="{{Auth::user()->id}}" hidden required>
                            </div>
                            <div class="form-group">
                                <label for="">Video Descrebtion</label>
                                <textarea type="text" class="form-control" name="descrebtion" id="" placeholder="Enter video descrbtion" value="{{isset($video) ? $video->name : ''}}" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Video</label>
                                <input type="file" class="form-control" name="video" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input type="file" class="form-control" name="photo" id="" required>
                            </div>
                            <button class="btn btn-info form-text">Upload</button>
                        </form>
                    </div>
                    @isset($video)
                        <audio controls>
                            <source src="{{asset('storage/'.$video->video)}}">
                        </audio>
                    @endisset
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection