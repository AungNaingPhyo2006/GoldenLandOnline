<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $categories =  Category::all();
        $blogs = Blog::all();
        return view('frontend.index', compact('categories', 'blogs'));
    }
}
