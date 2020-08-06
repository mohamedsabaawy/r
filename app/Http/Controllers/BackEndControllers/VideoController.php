<?php

namespace App\Http\Controllers\BackEndControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('video.index')->with([
            'videos'=> video::all() ,
            'user'  => user::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , video $video)
    {
        $video->create([
            'name'          =>  $request->name,
            'descrebtion'   =>  $request->descrebtion,
            'user_id'       =>  $request->user_id,
            'video'         =>  $request->video->store('video' , 'public'),
            'photo'         =>  $request->photo->store('image' , 'public')
        ]);
        return redirect(route('video.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        return view('video.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        Storage::disk('public')->delete($video->video);
        Storage::disk('public')->delete($video->photo);
        $video->delete();
        return redirect(route('video.index'));
    }
}
