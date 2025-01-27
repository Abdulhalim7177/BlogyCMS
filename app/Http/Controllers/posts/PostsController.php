<?php


namespace App\Http\Controllers\posts;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\post\PostModel;
use App\Models\post\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        // politics section
        $postPolitics = PostModel::where('category', 'Politics')->take(9)->get();

        // travel section
        $postTravel = PostModel::where('category', 'Travel')->take(1)->orderBy('title', 'desc')->get();
        $postTravelTwo = PostModel::where('category', 'Travel')->take(2)->orderBy('id', 'desc')->get();
        $postTravelOne = PostModel::where('category', 'Travel')->take(1)->orderBy('description', 'desc')->get();

        return view('posts.index', compact(
            'posts', 'postOne', 'postTwo', 
            'postBusiness', 'postBusinessTwo', 
            'randPost', 'postCulture', 'postCultureTwo', 
            'postPolitics', 'postTravel', 'postTravelTwo', 'postTravelOne'
        ));
    }

    public function single($id)
    {
        $single = PostModel::find($id);
        
        // Author User
        $user = User::find($single->user_id);
    
        // Popular posts
        $popularPost = PostModel::take(3)->orderBy('id', 'desc')->get();
    
        // Categories with post counts
        $categories = DB::table('categories')
            ->leftJoin('posts', 'posts.category', '=', 'categories.name') // Use leftJoin to avoid excluding categories with no posts
            ->select(
                'categories.name AS name',
                'categories.id AS id',
                DB::raw('COUNT(posts.id) AS Total') // Count posts per category
            )
            ->groupBy('categories.id', 'categories.name') // Group only by category name and id
            ->get();
    
        // Optional: To debug the query result
        // dd($categories); // Or use print_r($categories) to inspect the result

        $comments = Comment::where('post_id', $id)->get();

        // $comments = Comment::select('comment', 'post_id', 'user_id', 'user_name')->where('post_id', $id)->get();

        // $moreBlogs = PostModel::where('category', $single->category)->where('id', '<>', $id)->take(4)->get();

        $moreBlogs = PostModel::where('category' , $single->category)->where('id','!=', $id)->take(4)->get();
    
        return view('posts.single', compact('single', 'user', 'popularPost', 'categories', 'comments', 'moreBlogs'));
    }

    public function storeComment(Request $request)
    {
        $insertComment = Comment::create([
            "comment" => $request->comment,
            "post_id" => $request->post_id,
            "user_id" => Auth::user()->id,
            "user_name" => Auth::user()->name,
        ]);

        echo "<script>alert('Comment added successfully!')</script>";

        return redirect('/posts/single/'.$request->post_id.'')->with('success', 'Comment added successfully!');
        // $comment = new Comment();
        // $comment->comment = $request->comment;
        // $comment->post_id = $request->post_id;
        // $comment->user_id = $request->user_id;
        // $comment->user_name = $request->user_name;
        // $comment->save();
    

    }
    
}




/*

namespace App\Http\Controllers\posts;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\post\PostModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


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

        // $categories  = DB::table('categories')
        // ->join('posts', 'posts.category', '=', 'categories.name')
        // ->select('categories.name AS name', 'categories.id AS id', 'posts.user_id AS user_id', DB::raw('COUNT(posts.category) AS Total'))
        // ->groupBy('post.category')
        // ->get();

        $categories = DB::table('categories')
        ->join('posts', 'posts.category', '=', 'categories.name')
        ->select('categories.name AS name', 'categories.id AS id', 'posts.user_id AS user_id', DB::raw('COUNT(posts.category) AS Total'))
        ->groupBy('posts.category', 'categories.name', 'categories.id', 'posts.user_id') // Corrected groupBy
        ->get();


        print_r($categories);


       return view('posts.single' , compact('single', 'user', 'popularPost', 'categories'));

    }
}
*/