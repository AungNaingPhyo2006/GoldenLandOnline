<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $category = Category::all();
        $users =  User::all();
        $blogs = Blog::all();
        return view('backend.dashboard', compact('users', 'category', 'blogs'));
    }
}
