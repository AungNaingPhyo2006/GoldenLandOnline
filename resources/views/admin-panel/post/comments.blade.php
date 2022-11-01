@extends('admin-panel.master')
@section('title', 'Book Review')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Comment List</h4>
                @if(Session('info'))
                   <div class="alert alert-success alert-dismissible show fade">
                     <div> {{Session('info')}} </div>
                     <button class="btn btn-close" data-bs-dismiss="alert"></button>
                   </div>
                @endif
              
                <table class="table table-bordered table-hover text-center">
                   <thead>
                    <tr class="bg-warning">
                        <th>Index</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                   </thead>
                    <tbody>
                        @if($comments->count() < 1)
                          <div class="btn btn-primary mb-2"> No Comment yet! </div>
                        @else
                        @foreach($comments as $index => $comment)
                          <tr>
                            <td><span class="rounded-pill btn btn-sm btn-primary">{{ $index + 1}}</span></td>
                            <td>{{ $comment->comment}}</td>
                            <td>
                                   <form action="{{url('admin/comment/'.$comment->id.'/show_hide')}}" method="POST">
                                    @csrf
                                  
                                    <button type="submit"  class="btn  btn-sm rounded-pill {{ $comment->status == 'show' ? 'btn-danger' : 'btn-success'}}">
                                        <i class="far {{ $comment->status == 'show' ? 'fa-eye-slash' : 'fa-eye'}}"></i>
                                         {{ $comment->status == 'show' ? 'Hide' : 'Show'}}</button>
                                 
                                   </form>

                            </td>
                          </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
@endsection