<?php

namespace App\Http\Controllers\BackEndControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use App\Models\Audio;
use App\Http\Requests\AudioRequest;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('audio.index')->with('audios' , Audio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('audio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AudioRequest $request)
    {
        $a = new Audio();
        $a->name = $request->name;
        $a->audio =$request->audio->store('audio' , 'public');
        $a->save();
        return redirect(route('audio.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        // dd($audio);
        return view('audio.show')->with('audio' ,$audio);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        return view('audio.create')->with('audio',$audio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, audio $audio)
    {
        $audio->update([
            'name'=>$request->name,
            'audio'=>$request->audio->store('audio' , 'public')
        ]);
        return redirect(route('audio.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        Storage::disk('public')->delete($audio->audio);
        $audio->delete();
        return redirect(route('audio.index'));
    }
}