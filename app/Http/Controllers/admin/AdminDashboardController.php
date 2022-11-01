<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomerCount;
use App\Models\Partner;
use App\Models\Sell;
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
        $customCount = CustomerCount::find(1);
        $user = User::all();
        $sell =  Sell::all();
        $category = Category::all();
        $partner = Partner::all();

        return view('admin-panel.dashboard', compact('customCount', 'user', 'sell', 'category', 'partner'));
    }
}
