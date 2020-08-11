<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        if(count($posts) == 0){
            return redirect()->route('posts.create');
        }

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if(count($categories) == 0){
            return redirect()->route('categories.create');
        }
        elseif(count($tags) == 0){
            return redirect()->route('tags.create');
        }

        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('uploads/postImages', $featured_new_name);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'featured' => '/uploads/postImages/' . $featured_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index');
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
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'categories' => Category::all(),
            'post' => $post,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'featured' => 'image',
        ]);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/postImages', $featured_new_name);
            $post->featured = '/uploads/postImages/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($request->title);
        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->forceDelete();

        $trashed = Post::onlyTrashed()->get();

        if($trashed->count() == 0)
        {
            return redirect()->route('posts.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function trashed(){
       $posts = Post::onlyTrashed()->get();

       return view('admin.posts.trashed', [
           'posts' => $posts
       ]);
    }

    public function trash($id){
        Post::findOrFail($id)->delete();

        return redirect()->route('posts.index');
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        $trashed = Post::onlyTrashed()->get();

        if($trashed->count() == 0)
        {
            return redirect()->route('posts.index');
        }
        else
        {
            return redirect()->back();
        }
    }
}
