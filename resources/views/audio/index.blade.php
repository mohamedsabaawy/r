@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col"><a href="{{route('audio.create')}}" class="btn btn-info">Add Audio</a></div>
            <div class="card">
                <div class="card-header">Dashboard</div>
{{------------------------------ AUDIO PLAYER ---------------------------}}
                <div id="audio" class="m-auto">
                    
                </div>
{{------------------------------END PLAYER -------------------------------}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (count($audios) > 0)
                            <table class="table">
                                <thead>
                                    {{-- <tr>
                                        <th>name</th>
                                        <th>audio</th>
                                        <th>Action</th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    @foreach ($audios as $audio)
                                        <tr>
                                            <td>
                                                <button class="btn btn-outline-primary" onclick= "audio('{{asset('storage/'.$audio->audio)}}' , '{{$audio->name}}')">
                                                    Play
                                                </button>
                                            </td>
                                            <td><a class="nav-link" href="{{route('audio.show' , $audio->id)}}">{{$audio->name}}</a></td>
                                            {{-- <td>{{$audio->audio}}</td> --}}
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm float-right" href="{{route('audio.edit' , $audio->id)}}">edit</a>
                                                <form action="{{route('audio.destroy' , $audio->id)}}" method="POST">
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
                            <div class="ml-5">
                                <h1>no audio</h1>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
