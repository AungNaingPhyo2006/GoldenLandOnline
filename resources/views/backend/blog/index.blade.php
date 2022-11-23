@extends('backend.master')
@section('title', 'Golden Land')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h5 class="text-center text-uppercase"><strong>Blog list</strong></h5>
        @if(Session('info'))
            <div class="alert alert-success alert-dismissible show fade">
                {{ Session('info')}}
                <a class="btn btn-close" data-bs-dismiss="alert" ></a>
            </div>
        @endif

        <a href="{{url('admin/blog/create')}}" class="btn btn-primary mb-2"><i class="fa fa-plus-circle"></i> Add Blog</a>
        <table class="table table-bordered table-hover">
            <thead class="bg-danger text-center text-light">
                <tr>
                    <th>Index</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="text-center">
            
                @foreach($blogs as $blog)
                <tr>
                    <td> {{ $loop->index + 1}} </td>
                    <td> {{ $blog->title}} </td>
                    <td>
                        <img src="{{asset('storage/blog-images/'.$blog->image)}}" alt="" width="100px">
                     </td>
                    <td>
                         {{ $blog->content}} 
                    </td>
                    <td> {{ date('d-M-y', strtotime($blog->created_at))}} </td>
                    <td>
                      <form action="{{url('admin/blog/'.$blog->id)}}" method="POST">
                        @csrf @method('DELETE')
                        <a href="{{url('admin/blog/'.$blog->id.'/edit')}}" class="btn btn-primary btn-sm rounded-pill"><i class="far fa-edit"></i> Edit</a>
                       
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill"
                        onclick="return confirm('Are you sure you want to delete?')">
                           <i class="fas fa-trash"></i> Del</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $categories->links()}} --}}
    </div>
</div>
@endsection