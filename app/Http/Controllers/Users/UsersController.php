<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function editProfile($id){

        $user = User::find($id);
        
        return view ('users.update-profile', compact('user'));
    }

    public function updateProfile(Request $request, $id){
        
        $updateProfile = User::find($id);
        $updateProfile->update($request->all());
        
        if($updateProfile){
            return redirect('posts/index')->with('update.user', 'User Profile updated successfully!');
        }

    }
}
