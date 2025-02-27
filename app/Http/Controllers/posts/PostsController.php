<?php


namespace App\Http\Controllers\posts;

use App\Models\User;
use App\Models\post\Comment;
use Illuminate\Http\Request;
use App\Models\post\Category;
use App\Models\post\PostModel;
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
        $commentNumber = $comments->count();

        $moreBlogs = PostModel::where('category' , $single->category)->where('id','!=', $id)->take(4)->get();
    
        return view('posts.single', compact('single', 'user', 'popularPost', 'categories', 'comments', 'moreBlogs', 'commentNumber'));
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
       
    

    }

    public function createPost()
    {
        $categories = Category::all();

        if(auth()->user()){
            return view('posts.create-post', compact('categories'));
        }else{
            return abort(404);
        }

    }
    public function storePost(Request $request)
    {
        $destination = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destination, $myimage), $myimage);

        $insertPosts = PostModel::create([
            "title" => $request->title,
            "category" => $request->category,
            "user_id" => Auth::user()->id,
            "user_name" => Auth::user()->name,
            "description" => $request->description,
            "image" => $myimage,
        ]);

     

        return redirect('/posts/create-post')->with('success', 'Post created successfully!');

        // $post = new PostModel();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->category = $request->category;
        // $post->user_id = Auth::user()->id;
        // $post->save();

        // return redirect('/posts/index')->with('success', 'Post created successfully!');
    }
    public function deletePost($id)
    {
        $post = PostModel::find($id);
        $post->delete();

        return redirect('/posts/index')->with('delete', 'Post deleted successfully!');
    }
    public function editPost($id){
        $categories = Category::all();
        $single = PostModel::find($id);

        if(auth()->user()){
            if(Auth::user()->id == $single->user_id){
                return view('posts.post-edit', compact('single', 'categories'));
            }
            else{
                return abort(404);
            }
        }
     

    }

    public function updatePost(Request $request, $id){
        $updatePost = PostModel::find($id);
        $updatePost->update($request->all());
        if($updatePost){
            return redirect('/posts/single/'.$updatePost->id.'')->with('update', 'Post updated successfully!');
        }

    }

    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
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