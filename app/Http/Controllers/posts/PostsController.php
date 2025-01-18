<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post\PostModel;
use App\Models\User;

class PostsController extends Controller
{
    // public function index()
    // {
    //     // Get the first 2 posts
    //     $posts = PostModel::orderBy('id', 'desc')->take(2)->get();

    //     // Get the latest post
    //     $postOne = PostModel::orderBy('id', 'desc')->first();

    //     return view('posts.index', compact('posts', 'postOne'));
    // }

    public function index(){

        // first section

        $posts = PostModel::all()->take(2);
        $postOne = PostModel::take(1)->orderBy('id', 'desc')->get();
        $postTwo = PostModel::take(2)->orderBy('title', 'desc')->get();


        // business section

        $postBusiness = PostModel::where('category', 'Business')->take(2)->get();
        $postBusinessTwo = PostModel::where('category', 'Business')->take(3)->orderBy('title', 'desc')->get();

        // random post section
        $randPost = PostModel::take(4)->orderBy('category', 'desc')->get();

        // culture section
        $postCulture = PostModel::where('category', 'Culture')->take(2)->get();
        $postCultureTwo = PostModel::where('category', 'Culture')->take(3)->get();

        //politics section

        $postPolitics = PostModel::where('category', 'Politics')->take(9)->get();

        //travel section
        $postTravel = PostModel::where('category', 'Travel')->take(1)->orderBy('title', 'desc')->get();
        $postTravelTwo = PostModel::where('category', 'Travel')->take(2)->orderBy('id', 'desc')->get();
        $postTravelOne = PostModel::where('category', 'Travel')->take(1)->orderBy('description', 'desc')->get();


        return view('posts.index',
        compact('posts' , 'postOne', 'postTwo', 'postBusiness', 'postBusinessTwo', 'randPost', 'postCulture', 'postCultureTwo', 'postPolitics', 'postTravel', 'postTravelTwo', 'postTravelOne'));
    }

    public function single($id){
        $single = PostModel::find($id);
        
        // Author User

        $user = User::find($single->user_id);

        $popularPost = PostModel::take(3)->orderBy('id', 'desc')->get();;


        return view('posts.single' , compact('single', 'user', 'popularPost'));

    }
}
