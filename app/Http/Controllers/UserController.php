<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Get all userTags
    public function index()
    {
        return view('userTag');
    }

    // Get specified userTag
    public function show (UserTag $userTag)
    {
        return view('userTag.view', ['userTag' => $userTag]);
    }

    //Show the create userTag form view
    public function create(Request $request)
    {
        // default route to redirect to after successful userTag creation
        $directTo = route('userTag');
        
        return view('userTag.create');
    }

    //Create a new userTag in the database
    public function store(Request $request)
    {
        //Validate the form fields
        $data = $request->validate([
            
        ]);

        //Add the current user id to userTag data
        $data['user_id'] = Auth::id();

        //Create the userTag and store it in the database
        $userTag = userTag::create($data);

        //Redirect to userTag view on successful userTag creation
        return redirect(route('userTag.show', ['userTag' => $userTag]));
    }

    //Delete the specific userTag
    public function destroy(UserTag $userTag)
    {
        $userTag->delete();
        return redirect(route('userTag.view'));
    }

    //Show the edit form
    public function edit(UserTag $userTag) {
        return view('userTag.edit');
    }

    //Update the specified userTag
    public function update(Request $request) {
        $data = $request->all();
        $userTag->update($data);
        return redirect(route('userTag.show', ['userTag' => $userTag]));
    }
}
