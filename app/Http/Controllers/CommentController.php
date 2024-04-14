<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Get all Comments
    public function index()
    {
        return view('comment');
    }

    // Get specified comment
    public function show (Comment $comment)
    {
        return view('comment.view', ['comment' => $comment]);
    }

    //Show the create comment form view
    public function create(Request $request)
    {
        // default route to redirect to after successful comment creation
        $directTo = route('comment');
        
        return view('comment.create');
    }

    //Create a new comment in the database
    public function store(Request $request)
    {
        //Validate the form fields
        $data = $request->validate([
            'content' => 'required|string'
        ]);

        //Add the current user id to comment data
        $data['user_id'] = Auth::id();

        //Create the comment and store it in the database
        $comment = Comment::create($data);

        //Redirect to comment view on successful comment creation
        return redirect(route('comment.show', ['comment' => $comment]));
    }

    //Delete the specific comment
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect(route('comment.view'));
    }

    //Show the edit form
    public function edit(Comment $comment) {
        return view('comment.edit');
    }

    //Update the specified comment
    public function update(Request $request) {
        $data = $request->all();
        $comment->update($data);
        return redirect(route('comment.show', ['comment' => $comment]));
    }
}
