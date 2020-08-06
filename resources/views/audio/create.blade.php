@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Audio</div>
                    <form action="{{isset($audio) ? route('audio.update' , $audio->id) : route('audio.store')}}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                        @isset($audio)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="" value="{{isset($audio) ? $audio->name : ''}}">
                            @error('name')
                            <small class="alert alert-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div>
                            <label for=""></label>
                            <input type="file" class="form-control" name="audio" id="" placeholder="">
                            @error('audio')
                            <small class="alert alert-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button class="btn btn-info form-control">save</button>
                    </form>
                    @isset($audio)
                        <audio controls>
                            <source src="{{asset('storage/'.$audio->audio)}}">
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
