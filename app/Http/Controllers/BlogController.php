<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('post.single')->withPost($post);
    }

    public function getList()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(8);
        return view('post.list')->withPosts($posts);
    }
}
