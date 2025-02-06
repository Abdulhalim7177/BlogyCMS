<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post\Category;
use App\Models\post\PostModel;

class CategoriesController extends Controller
{
    public function category($name)
    {
       $Categories = Category::where('category', $name)->take(5)->orderBy('created_at','desc')->get();

       return view('categories.category', compact('Categories'));
    }
}
