@extends('admin-panel.master')
@section('title', 'Book Review')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-center text-light">Best Seller list Edit Form</h4>
                    </div>
                     
                    <form action="{{url('admin/sell/'.$sell->id)}}" method="POST">
                        @csrf @method('PATCH')
                    <div class="card-body">
                            <div class="form-group">
                                <label for="">Book Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Book Name" value="{{ $sell->name ?? old('name')}}">
                                @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Percent</label>
                                <input type="text" name="percent" class="form-control @error('percent') is-invalid @enderror" placeholder="Enter Percent" value="{{ $sell->percent ?? old('percent')}}">
                                @error('percent')
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