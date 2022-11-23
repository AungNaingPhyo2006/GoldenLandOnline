@extends('backend.master')

@section('title', 'Golden Land')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 bg-info">
                    <table class="table table-bordered table-hover text-center">
                            <tr class="bg-secondary">
                                <th class="text-warning">Index</th>
                                <th class="text-warning">Content</th>
                                <th class="text-warning">Total</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>All User List</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded">{{count($users)}}</button> 
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Categories</td>
                                <td>
                                    <button class="btn btn-light btn-sm rounded">{{count($category)}}</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Courses</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded">{{count($category)}}</button>  
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Review</td>
                                <td>
                                   <button class="btn btn-light btn-sm rounded">3 </button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Blogs</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded">{{count($blogs)}}</button>
                                </td>
                            </tr>
                    </table>
                  
                </div>
            </div>
        </div>
    </div>
@endsection