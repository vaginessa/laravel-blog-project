<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller
{

    public function getIndex()
    {
        $posts = Post::orderBy("created_at", "desc")->take(5)->get();;
        return view('pages.index')->withPosts($posts);
    }

    public function getAbout()
    {
        return view('pages.about');
    }

}