<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerCount;
use Illuminate\Http\Request;

class CustomerCountController extends Controller
{
    public function index()
    {
        $customerCount = CustomerCount::all();
        $custCount = $customerCount->find(1);
        return view('admin-panel.customerCount.index', compact('customerCount', 'custCount'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'count' => 'required',
        ]);
        CustomerCount::create([
            'count' => $request->count,
        ]);
        return back();
    }
    public function update(Request $request, $id)
    {
        $customerCount = CustomerCount::find($id);

        $customerCount->update([
            'count' => $customerCount->count + $request->count,
        ]);
        return back();
    }
}
