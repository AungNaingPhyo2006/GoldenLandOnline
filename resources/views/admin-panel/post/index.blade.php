@extends('admin-panel.master')
@section('title', 'Book Review')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Post List</h4>
                @if(Session('info'))
                   <div class="alert alert-success alert-dismissible show fade">
                     <div> {{Session('info')}} </div>
                     <button class="btn btn-close" data-bs-dismiss="alert"></button>
                   </div>
                @endif
                <a href="{{url('admin/posts/create')}}" class="btn btn-primary mb-2"><i class="fa fa-plus-circle"></i> Add New List</a>
              
                <table class="table table-bordered table-hover text-center">
                    <thead class="bg-warning">
                        <tr>
                            <th>Index</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                          <tr>
                            <td>{{$loop->index+ $posts->firstItem()}}</td>
                            <td>{{$post->category->name}}</td>
                            <td class="bg-success">
                                <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" width="110px" style="border: 1px solid white">
                            </td>
                            <td>{{$post->title}}</td>
                            <td class="py-3"><textarea readonly>{{$post->content}}</textarea></td>
                            <td>
                                   <form action="{{url('admin/posts/'.$post->id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <a href="{{ url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-primary btn-sm rounded-pill">
                                        <i class="far fa-edit"></i> Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm rounded" onclick="return confirm('Are you sure you want to delete?')">
                                        <i class="fas fa-trash"></i> Del</button>

                                    <a href="{{url('admin/posts/'.$post->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-comments"></i> Comments</a>
                                   </form>

                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection