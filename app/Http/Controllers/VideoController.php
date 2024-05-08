<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Playlist;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('video.index', ['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }

    public function search(Request $request)
    {
        $term = $request->query('term');
        $results = Video::where('title', 'like', "%$term%")->get();

        $playlist = Playlist::find($request["pid"]);
        return view('video.searchlistitem', ['videos' => $results, 'playlist' => $playlist]);
    }

    public function addtoplaylist(Request $request)
    {
        $playlist = Playlist::find($request["pid"]);
        $video = Video::find($request["vid"]);

        $playlist->videos()->attach($video);
        return view('video.showlistitem', ['playlist' => $playlist, 'video' => $video]);
    }

    public function removefromplaylist(Request $request)
    {
        $playlist = Playlist::find($request["pid"]);
        $video = Video::find($request["vid"]);
        
        $playlist->videos()->detach($video);
    }
}
