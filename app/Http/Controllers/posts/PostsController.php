<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post\PostModel;

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

        return view('posts.index',
        compact('posts' , 'postOne', 'postTwo', 'postBusiness', 'postBusinessTwo'));
    }

    public function single($id){

    }
}
