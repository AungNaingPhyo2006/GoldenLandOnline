@extends('admin-panel.master')
@section('title', 'Book Store')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-center text-light">Post list Edit Form</h4>
                    </div>
                     
                    <form action="{{url('admin/posts/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                    <div class="card-body">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{ $post->category_id == $category->id ? 'selected' : ''}}>
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Image</label> <br>
                                <input type="file" name="image" class=" mb-2 @error('image') is-invalid @enderror"> <br>
                                <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" width="110px" style="border: 2px solid blue">
                                @error('image')
                                    <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title" value="{{old('title') ?? $post->title}}">
                                @error('title')
                                    <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                               <textarea name="content" id="" rows="3" class="form-control @error('content') is-invalid @enderror" placeholder="Text content">{{old('content') ?? $post->content}}</textarea>
                                @error('content')
                                    <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection