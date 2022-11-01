@extends('ui-panel.master')
@section('title','Book Review')

@section('content')
<div class="row">
  <div class="col-md-8">
     <div class="row">
         <div class="col-md-12">
           
         @foreach($posts as $post)
          <div class="post text-center">

            <div class="card bg-dark">
                <div class="card-header">
                    <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" width="30%" style="border: 2px solid white">
                </div>
                <div class="card-body text-white">
                    <h5><strong>{{$post->title}}</strong></h5>
                <p style="text-align: justify">
                   {{substr_replace($post->content,'...',100)}}
                </p>
                <a href="{{url('/posts/'.$post->id.'/details')}}">
                    <button class="btn btn-info">See More <i class="fas fa-angle-double-right"></i> </button>
                </a>
                </div>
            </div>
             
          </div>
          @endforeach
          {{ $posts->links()}}
         </div>
     </div>
  </div>
  <div class="col-md-4">
      <div class="siderbar">
          <form action="{{url('/search_posts')}}" method="GET">
            @csrf
                <div class="input-group">
                    <input type="text" name="search_data" class="form-control" placeholder="Search">
                    <button type="submit" class="btn btn-success">
                        Submit <i class="fa fa-search"></i>
                    </button>
                </div>
          </form>
          <hr>
          <h5>CATEGORIES</h5>
          @foreach($categories as $category)
          <ul class="text-uppercase">
              <li> <a href="{{url('/search_posts_by_category/'.$category->id)}}">{{$category->name}}</a> </li>
          </ul>
          @endforeach
          {{$categories->links()}}
      </div>
  </div>
</div>
@endsection
               