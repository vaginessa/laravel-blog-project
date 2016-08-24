<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($limit = 15, $offset = 0)
    {
        $user = null;
        $this->authenticate($user);

        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->skip($offset)
            ->get();
        return response()->json(["posts" => $posts], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = null;
        $this->authenticate($user);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->messages()], 400);
        }

        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        if (!$post->save()) {
            return response()->json(['message' => 'Saving failed'], 404);
        } else {
            return response()->json(['message' => 'Post has been saved successfully.', 'post' => $post], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = null;
        $this->authenticate($user);

        $post = Post::where('id', $id)->first();
        $category = Category::where('id', $post->category_id)->first();

        if (is_null($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        } else {
            return response()->json(["post" => $post, "category" => $category], 200);
        }
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
        $user = null;
        $this->authenticate($user);

        $post = Post::find($id);

        if (is_null($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $valArray = [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required'
        ];

        if ($post->slug != $request->slug) {
            $valArray['slug'] = 'required|alpha_dash|min:5|max:255|unique:posts,slug';
        }

        $validator = Validator::make($request->all(), $valArray);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->messages()], 400);
        }

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        if (!$post->save()) {
            return response()->json(['message' => 'Saving failed'], 404);
        } else {
            return response()->json(['message' => 'Post has been saved successfully.', 'post' => $post], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = null;
        $this->authenticate($user);

        $post = Post::find($id);

        if (is_null($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        if ($post->user_id != $user->id) {
            return response()->json(['message' => 'Request forbidden.'], 403);
        }

        if (!$post->delete()) {
            return response()->json(['message' => 'Deletion failed'], 404);
        } else {
            return response()->json(['message' => 'Post has been deleted successfully.'], 200);
        }
    }

    public function getCategories()
    {
        $user = null;
        $this->authenticate($user);

        $categories = Category::all();
        return response()->json(["categories" => $categories], 200);
    }

    private function authenticate(&$user)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['message' => 'Request unauthorized.'], 401);
        }
    }
}
