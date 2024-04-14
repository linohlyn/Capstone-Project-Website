<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostTagController extends Controller
{
    // Get all postTags
    public function index()
    {
        return view('postTag');
    }

    // Get specified postTag
    public function show (PostTag $postTag)
    {
        return view('postTag.view', ['postTag' => $postTag]);
    }

    //Show the create postTag form view
    public function create(Request $request)
    {
        // default route to redirect to after successful postTag creation
        $directTo = route('postTag');
        
        return view('postTag.create');
    }

    //Create a new postTag in the database
    public function store(Request $request)
    {
        //Validate the form fields
        $data = $request->validate([
            
        ]);

        //Add the current user id to postTag data
        $data['user_id'] = Auth::id();

        //Create the postTag and store it in the database
        $postTag = postTag::create($data);

        //Redirect to postTag view on successful postTag creation
        return redirect(route('postTag.show', ['postTag' => $postTag]));
    }

    //Delete the specific postTag
    public function destroy(PostTag $postTag)
    {
        $postTag->delete();
        return redirect(route('postTag.view'));
    }

    //Show the edit form
    public function edit(PostTag $postTag) {
        return view('postTag.edit');
    }

    //Update the specified postTag
    public function update(Request $request) {
        $data = $request->all();
        $postTag->update($data);
        return redirect(route('postTag.show', ['postTag' => $postTag]));
    }
}
