@extends('admin-panel.master')

@section('title', 'Book Review')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <table class="table table-bordered table-hover text-center">
                            <tr class="bg-warning">
                                <th>Index</th>
                                <th>Content</th>
                                <th>Total</th>
                            </tr>
                            <tr class="bg-info">
                                <td>1</td>
                                <td>User List</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded">{{$user->count()}}</button> 
                                </td>
                            </tr>
                            <tr class="bg-secondary">
                                <td>2</td>
                                <td class="text-info">Best Seller List</td>
                                <td>
                                    <button class="btn btn-light btn-sm rounded">{{$sell->count()}}</button>
                                </td>
                            </tr>
                            <tr class="bg-info">
                                <td>3</td>
                                <td>Partner List</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded">{{$partner->count()}}</button>  
                                </td>
                            </tr>
                            <tr class="bg-success">
                                <td>4</td>
                                <td class="text-info">Customer List</td>
                                <td>
                                   <button class="btn btn-light btn-sm rounded">
                                    @if($customCount)
                                    {{$customCount->count}}
                                    @endif
                                    </button>
                                </td>
                            </tr>
                            <tr class="bg-info">
                                <td>5</td>
                                <td>Category List</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded">{{$category->count()}}</button>
                                </td>
                            </tr>
                    </table>
                  
                </div>
            </div>
        </div>
    </div>
@endsection