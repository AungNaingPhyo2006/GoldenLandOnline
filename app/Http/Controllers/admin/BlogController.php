<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
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
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();

        $image->storeAs('public/blog-images', $imageName);

        Blog::create([
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blog.index')->with('info', 'You have successfully created.');
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
        $blog = Blog::find($id);
        return view('backend.blog.edit', compact('blog'));
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
        $data =  $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::find($id);

        if ($request->hasFile('image')) {
            $blogImage = $blog->image;

            File::delete('storage/blog-images/' . $blogImage);

            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();

            $image->storeAs('public/blog-images', $imageName);
            $data['image'] = $imageName;
        }
        $blog->update($data);

        return redirect()->route('blog.index')->with('info', 'You have successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blogImage = $blog->image;

        File::delete('storage/blog-images/' . $blogImage);
        $blog->delete();

        return redirect()->route('blog.index')->with('info', 'You have successfully deleted.');
    }
}
