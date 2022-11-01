@extends('admin-panel.master')
@section('title', 'Book Store')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-center text-light">Partner list Create Form</h4>
                    </div>
                     
                    <form action="{{url('admin/partners')}}" method="POST">
                        @csrf 
                    <div class="card-body">
                            <div class="form-group">
                                <label for="">Partner Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Partner Name" value="{{old('name')}}">
                                @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <label for="">URL</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter URL" value="{{old('url')}}">
                                @error('url')
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