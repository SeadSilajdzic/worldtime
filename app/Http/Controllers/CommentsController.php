<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comments.index', [
            'comments' => Comment::orderBy('created_at', 'desc')->paginate(15),
        ]);
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
    public function commentCreate(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'content' => 'required'
        ]);

        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'is_active' => 0,
            'author' => $user->name,
            'email' => $user->email,
            'content' => $request->content
        ]);

        $request->session()->flash('comment_message', 'Your comment is submitted and is waiting for moderation!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back();
    }

    public function comment_un_approve($id){
        $comment = Comment::findOrFail($id);
        $comment->is_active = 0;
        $comment->save();

        return redirect()->back();
    }

    public function comment_approve($id){
        $comment = Comment::findOrFail($id);
        $comment->is_active = 1;
        $comment->save();

        return redirect()->back();
    }

    public function reply_un_approve($id){
        $reply = Reply::findOrFail($id);
        $reply->is_active = 0;
        $reply->save();

        return redirect()->back();
    }

    public function reply_approve($id){
        $reply = Reply::findOrFail($id);
        $reply->is_active = 1;
        $reply->save();

        return redirect()->back();
    }
}
