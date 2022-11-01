<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\CustomerCount;
use App\Models\likesDislike;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $sells = Sell::paginate(10);
        $partners =  Partner::all();
        $customerCount = CustomerCount::find(1);
        $posts = Post::latest()->take(6)->get();


        return view('ui-panel.index', compact('sells', 'partners', 'customerCount', 'posts'));
    }
    public function postIndex()
    {
        $categories = Category::paginate(5);
        $posts  =  Post::latest()->paginate(5);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
    public function postDetailIndex($id)
    {
        $post = Post::find($id);
        $likes = likesDislike::where('post_id', $id)->where('type', 'like')->get();
        $dislikes = likesDislike::where('post_id', $id)->where('type', 'dislike')->get();

        $comments = Comment::where('post_id', $id)->where('status', 'show')->get();

        $likeStatus = likesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first(); //disabled
        return view('ui-panel.post-details', compact('post', 'likes', 'dislikes', 'likeStatus', 'comments'));
    }
    public function search(Request $request)
    {
        $searchData = "%" . $request->search_data . "%";
        $categories = Category::paginate(5);
        $posts = Post::where('title', 'like', $searchData)
            ->orWhere('content', 'like', $searchData)
            ->orWhereHas('category', function ($category) use ($searchData) {
                $category->where('name', 'like', $searchData);
            })
            ->paginate(10);

        return view('ui-panel.posts', compact('posts', 'categories'));
    }

    public function searchByCategory($catId)
    {
        $categories = Category::paginate(5);
        $posts = Post::where('category_id', '=', $catId)->paginate(10);

        return view('ui-panel.posts', compact('posts', 'categories'));
    }
}
