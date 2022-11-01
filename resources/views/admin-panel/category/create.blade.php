@extends('admin-panel.master')
@section('title', 'Book Review')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-center text-light">Category list Create Form</h4>
                    </div>
                     
                    <form action="{{url('admin/categories')}}" method="POST">
                        @csrf 
                    <div class="card-body">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" value="{{old('name')}}">
                                @error('name')
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