@extends('backend.master')
@section('title', 'Golden Land')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h5 class="text-center text-uppercase"><strong>user list</strong></h5>
        @if(Session('info'))
            <div class="alert alert-success alert-dismissible show fade">
                {{ Session('info')}}
                <a class="btn btn-close" data-bs-dismiss="alert" ></a>
            </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead class="bg-danger text-center text-light">
                <tr>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="text-center">
            
                @foreach($users as $user)
                <tr>
                    <td> {{ $loop->index + $users->firstItem()}} </td>
                    <td> {{ $user->name}} </td>
                    <td> {{ $user->email}} </td>
                    <td> {{ $user->status}} </td>
                    <td> {{ date('d-M-y', strtotime($user->created_at))}} </td>
                    <td>
                      <form action="{{url('admin/users/'.$user->id.'/delete')}}" method="POST">
                        @csrf 
                        <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary btn-sm rounded-pill"><i class="far fa-edit"></i> Edit</a>
                       
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill"
                        onclick="return confirm('Are you sure you want to delete?')">
                           <i class="fas fa-trash"></i> Del</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links()}}
    </div>
</div>
@endsection