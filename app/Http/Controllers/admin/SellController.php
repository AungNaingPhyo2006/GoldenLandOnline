<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sell;
use Illuminate\Http\Request;


class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = Sell::paginate(5);
        return view('admin-panel.sell.index', compact('sells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.sell.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ]);
        Sell::create([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);

        return redirect('/admin/sell')->with('info', 'You have successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sell = Sell::find($id);

        return view('admin-panel.sell.edit', compact('sell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sell = Sell::find($id);

        $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ]);

        $sell->update([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);
        return redirect('admin/sell')->with('info', 'You have successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell = Sell::find($id);
        $sell->delete();

        return redirect('admin/sell')->with('info', 'You have successfully deleted.');
    }
}
