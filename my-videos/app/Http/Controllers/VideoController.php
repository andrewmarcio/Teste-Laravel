<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request);
            $createdVideo = Video::create([
                'category_id' => $request->category_id,
                'title' => $request->video_title,
                'url' => $request->video_url 
            ]);

            if ($createdVideo) {
                $message = 'Video successfully added.';
            }else{
                $message = 'There was an error adding the video.';
            }

            return redirect()->back()->with('message', $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $videoId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function commentStore($videoId, Request $request){
        try {
            $createdComment = Comment::create([
                "video_id" => $videoId,
                "user_id" => Auth::user()->id,
                "comment" => $request->comment
            ]);

            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $videoId
     * @return \Illuminate\Http\Response
     */
    public function show($videoId)
    {
        $video = Video::find($videoId);
        $comments = DB::table('comments')
        ->join('videos', 'videos.id', '=', 'comments.video_id')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select(['users.name as username', 'comments.comment','comments.created_at'])->get();

        return view('video.videos', compact('video', 'comments'));
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
    public function destroy($id)
    {
        //
    }
}
