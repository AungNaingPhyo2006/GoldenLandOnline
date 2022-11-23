@extends('backend.master')
@section('title', 'Golden Land')

@section('content')
<div class="row">
    <div class="col-md-12">
       
        @if(Session('info'))
            <div class="alert alert-success alert-dismissible show fade">
                {{ Session('info')}}
                <a class="btn btn-close" data-bs-dismiss="alert" ></a>
            </div>
        @endif
      
        </div>
     <form action="{{url('admin/blog/'.$blog->id)}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <div class="card text-center bg-info">
            <div class="card-header bg-success">
                <h5 class="text-center text-uppercase"><strong>Blog Edit form</strong></h5>
            </div>
            <div class="card-body col-md-6" style="align-self: center">
                <label for="" class="text-uppercase">Title</label> <br>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title." value="{{old('title') ?? $blog->title}}"> 
                @error('title') 
                    <span class="text-danger"><small>{{$message}}</small></span><br>
                @enderror

                <label for="" class="text-uppercase">Image</label> <br>
                <input type="file" name="image" class="form-control mb-2 @error('image') is-invalid @enderror"> 
                <img src="{{asset('storage/blog-images/'.$blog->image)}}" alt="" style="width: 100px; border: 1px solid red;"> <br>
                @error('image') 
                    <span class="text-danger"><small>{{$message}}</small></span><br>
                @enderror

                <label for="" class="text-uppercase mt-3">Content</label> <br>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Enter Content"> {{old('content') ?? $blog->content}} </textarea>
                @error('content') 
                    <span class="text-danger"><small>{{$message}}</small></span><br>
                @enderror
            </div>  
            <button type="submit" class="btn btn-primary col-md-3 mb-3" style="align-self: center">Edit</button> 
     </form>
    </div>
</div>
@endsection