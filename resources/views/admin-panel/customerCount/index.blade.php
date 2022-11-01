@extends('admin-panel.master')
@section('title', 'Book Review')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center mb-5">Total Customers</h4>
                @if(Session('info'))
                   <div class="alert alert-success alert-dismissible show fade">
                     <div> {{Session('info')}} </div>
                     <button class="btn btn-close" data-bs-dismiss="alert"></button>
                   </div>
                @endif
        
                @if($customerCount->count() < 1)
                <form action="{{url('admin/customer_count/create')}}" method="POST">
                    @csrf 
                   <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="number" name="count" class="form-control rounded @error('count') is-invalid @enderror">
                            <button class="btn btn-primary rounded-pill ms-2">Create</button>
                        </div>
                        @error('count')
                        <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                   </div>
                </form>
                @endif

                <table class="table table-bordered table-hover text-center">
                    <thead class="bg-warning">
                        <tr>
                            <th>Index</th>
                            <th>Total Customer</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($custCount)
                          <tr>
                            <td>{{$custCount->id}}</td>
                            <td>
                                {{$custCount->count}}
                            </td>
                            <td> {{ date('d-M-y', strtotime($custCount->updated_at))}}</td>
                            <td>
                             <button class="btn btn-primary btn-sm" id="addBtn">
                                        <i class="fas fa-plus-circle"></i> Add More Customer
                            </button>

                            <form action="{{ url('admin/customer_count/'.$custCount->id.'/update')}}" method="POST" class="col-md-9" id="addForm" style="display: none">
                                @csrf
                                <div class="input-group">
                                    <input type="number" name="count" class="form-control rounded @error('count') is-invalid @enderror" required placeholder="Please Count">
                                    <button type="submit" class="btn btn-primary btn-sm rounded-pill ms-2">
                                        <i class="fas fa-plus-circle"></i> Add
                                    </button>
                                </div>
                                @error('count')
                                <small class="text-danger">{{$message}}</small>
                                 @enderror
                            </form>
                            </td>
                          </tr>
                          @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#addBtn').click(function(){
                $('#addForm').css('display','block');
                $(this).css('display', 'none');
            });
        });
    </script>
@endsection