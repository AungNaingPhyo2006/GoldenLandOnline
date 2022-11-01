@extends('admin-panel.master')
@section('title', 'Book Review')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Best Seller Book List</h4>
                @if(Session('info'))
                   <div class="alert alert-success alert-dismissible show fade">
                     <div> {{Session('info')}} </div>
                     <button class="btn btn-close" data-bs-dismiss="alert"></button>
                   </div>
                @endif
                <a href="{{url('admin/sell/create')}}" class="btn btn-primary mb-2"><i class="fa fa-plus-circle"></i> Add New List</a>
                <table class="table table-bordered table-hover text-center">
                    <thead class="bg-warning">
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Percent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sells as $sell)
                          <tr>
                            <td>{{$loop->index + $sells->firstItem()}}</td>
                            <td>{{$sell->name}}</td>
                            <td>{{$sell->percent}}</td>
                            <td>
                                   <form action="{{url('admin/sell/'.$sell->id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <a href="{{ url('admin/sell/'.$sell->id.'/edit')}}" class="btn btn-primary btn-sm rounded-pill">
                                        <i class="far fa-edit"></i> Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm rounded">
                                        <i class="fas fa-trash"></i> Del</button>
                                   </form>

                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $sells->links() }} 
            </div>
        </div>
    </div>
@endsection