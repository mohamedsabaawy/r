@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="col"><a href="{{route('audio.create')}}" class="btn btn-info">Add Audio</a></div> --}}
            <div class="card">
                <div class="card-header">Audio player</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="m-auto">
                        <h3>{{$audio->name}}</h3>
                        <audio controls autoplay>
                            <source src="{{asset('storage/'.$audio->audio)}}">
                        </audio>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
