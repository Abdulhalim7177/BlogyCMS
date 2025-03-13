<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\post\PostModel;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function editProfile($id){

        $user = User::find($id);

        if(auth()->user()){

            if(Auth::user()->id == $user->id){
                return view ('users.update-profile', compact('user'));
            }
            else{
                return abort(404);
            }
        }
        else {
            return abort(404);
        }


        
    }

    public function updateProfile(Request $request, $id){
        
        
        $updateProfile = User::find($id);

        Request()->validate([
            'name'=> 'required|max:50',
            'email' => 'required|max:50',
            'bio' => 'required|max:300',

        ]);

        $updateProfile->update($request->all());
        
        if($updateProfile){
            return redirect('posts/index')->with('update.user', 'User Profile updated successfully!');
        }

    }
    public function profile($id){
        $profile = User::find($id);
        $latestPost = PostModel::where('user_id', $id)
        ->take(4)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('users.profile', compact('profile', 'latestPost'));
    }
}
