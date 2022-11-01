@extends('ui-panel.master')

@section('title', 'home page')

@section('content')
    <div class="container">
       <div class="row">
         <div class="col-md-12">
                  <!-- ABOUT ME & SKILLS SECTION-->  
          <div class="aboutme">
            <div class="row">
              <div class="col-md-5 text-uppercase">
                <br>
                <h3 class="text-center">Our goals</h3>
                <br>
                <p>
                 "Books train your mind to imagination to think big. - Taylor Swift." "If you are going to get anywhere in life you have to read a lots of books. - Roald Dahl."
                </p>
                <p>
                  "Reading is to the mind what exercise is to the body. - Joseph Addison." "The whole world opened up to me when I learned to read. - Mary McCleod Bethune."
                </p>

                <div class="row">
                  <div class="col-md-6">
                    <div class="total-project mb-2">
                      <i class="fas fa-flag"></i>
                      <br>
                      <strong>{{count($partners)}}</strong>
                      <p class="text-center">Total Partners</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="total-student">
                      <i class="fas fa-users"></i>
                      <br>
                      <strong>
                        @if($customerCount)
                        {{$customerCount->count}}
                        @endif
                      </strong>
                      <p class="text-center">Total Customers</p>
                    </div>
                  </div>
                </div>
              </div>  

              <div class="col-md-7">
                <br>
                <h4 class="text-center">Best sellers</h4>
                <br>

                @foreach($sells as $sell)
                <div class="row mb-2">
                  <div class="col-md-9">
                      <div class="progress mt-2" style=" border: 1px solid gray;">
                        <div class="progress-bar" style="width: {{$sell->percent}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          {{ $sell->percent}}%
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                     <i class="fas fa-book"></i> {{ $sell->name}}
                  </div>                 
                </div>
                @endforeach
                <br>
                {{ $sells->links()}}
              </div>
            </div>
          </div>

          <br><br><br>

          <!-- MY PROJECTS SECTION -->
          <h2 class="text-center">Our Best Partners</h2><br>
          <div class="row">
             @foreach($partners as $partner)
             <div class="col-sm-6 col-md-4 mb-3">
              <a href="{{$partner->url}}"  target="_blank">
                <div class="project-image-div">
                  <img src="images/Aung.png" class="project-img" alt="">
                    <div class="overlay">
                      <div class="text"> <i class="fas fa-flag"></i> {{$partner->name}}</div>
                    </div>
                </div>
              </a>
          </div>
             @endforeach
          </div>

          <br><br><br>
          <!-- LATEST POSTS SECTION  -->
          <h2 class="text-center">LATEST REVIEWS</h2><br>
          <p class="text-center">
            Hi Everyone! We are warmly welcome you to read some of our blog posts. Here are very interesting and exciting posts you can read that we are supporting for you!
          </p>
          <div class="row text-center">
            @foreach($posts as $post)
            <div class="col-sm-6 col-md-4">
                <a href="{{url('/posts/'.$post->id.'/details')}}">
                    <div class="latest-post">
                      <img src="{{ asset('storage/post-images/'.$post->image)}}" alt="post-image">
                      <small>Posted on: {{$post->created_at->diffForHumans()}} </small>
                      <p><strong>{{$post->title}}</strong></p>
                      <P>
                       {{ substr($post->content,0,100)}}
                      </P>
                    </div>
                </a>
            </div>
            @endforeach
          </div>
       </div>
     </div>
 </div>

@endsection