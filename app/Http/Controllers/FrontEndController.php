<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Reply;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $categories = Category::take(6)->get();
        $all_categories = Category::all();

        $latest_post = Post::orderBy('created_at', 'desc')->get()->first();
        $three_posts = Post::orderBy('created_at', 'desc')->take(3)->get();

        if($latest_post){
            return view('index', [
                'categories' => $categories,
                'all_categories' => $all_categories,
                'three_posts' => $three_posts,
                'latest_post' => $latest_post
            ]);
        } else {
            return view('404', [
                'categories' => $categories
            ]);
        }
    }

    public function category(Category $category){
        $categories = Category::take(6)->get();
        $three_posts = Post::orderBy('created_at', 'desc')->take(3)->get();

        $posts = Post::where('category_id', $category->id)->get();

        return view('category', [
            'category' => $category,
            'categories' => $categories,
            'posts' => $posts,
            'three_posts' => $three_posts
        ]);
    }

    public function tag(Tag $tag){
        $categories = Category::take(6)->get();
        $three_posts = Post::orderBy('created_at', 'desc')->take(3)->get();

        return view('tag', [
            'tag' => $tag,
            'categories' => $categories,
            'three_posts' => $three_posts
        ]);
    }

    public function single_post($slug){
        $post = Post::where('slug', $slug)->first();
        $categories = Category::take(6)->get();
        $comments = Comment::orderBy('created_at', 'desc')->where('post_id', '=', $post->id)->where('is_active', '=', 1)->paginate(5);

        return view('single', [
            'post' => $post,
            'title' => $post->title,
            'categories' => $categories,
            'comments' => $comments
        ]);
    }
}
