<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Session;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myPosts()
    {
        $user = Auth::user();
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', $user->id)->paginate(8);

        return view('post.myposts')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required'
        ));

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        $post->save();
        Session::flash('success', 'The post was successfully saved.');

        return redirect()->route('single-blog', $post->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('post.edit')->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valArray = array(
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required'
        );

        $post = Post::find($id);

        if ($post->slug != $request->slug) {
            $valArray['slug'] = 'required|alpha_dash|min:5|max:255|unique:posts,slug';
        }

        $this->validate($request, $valArray);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        $post->save();
        Session::flash('success', 'The post was successfully updated.');

        return redirect()->route('single-blog', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('user.posts');
    }
}
