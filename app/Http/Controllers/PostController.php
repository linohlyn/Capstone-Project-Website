<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\postTag;
use App\Models\Tag;


class PostController extends Controller
{
    // Get all Posts
    public function index()
    {
        return view('welcome', ['posts' => Post::all()]);
    }

    // Get specified post
    public function show (Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    //Show the create post form view
    public function create(Request $request)
    {
        // default route to redirect to after successful post creation
        $directTo = route('posts');
        
        return view('post.create');
    }

    //Create a new post in the database
    public function store(Request $request)
    {
        //Validate the form fields
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        //Add the current user id to post data
        $data['user_id'] = Auth::id();

        //Create the post and store it in the database
        $post = Post::create($data);

        //Redirect to post view on successful post creation
        return redirect(route('post.show', ['post' => $post]));
    }

    //Delete the specific post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.view'));
    }

    //Show the edit form
    public function edit(Post $post) {
        return view('post.edit');
    }

    //Update the specified post
    public function update(Request $request) {
        $data = $request->all();
        $post->update($data);
        return redirect(route('post.show', ['post' => $post]));
    }
}
