@extends('ui-panel.master')
@section('title','Book Review')

@section('content')

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 post-details">
                          <div class="card text-center bg-secondary">
                            <div class="card-header bg-dark">
                               <div class="float-start text-warning">
                                <small class="ms-3"> 
                                    <strong> 
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        Posted On:
                                    </strong>
                                        {{ $post->created_at->diffForHumans()}}
                                </small>
                                <small class="ms-3">
                                    <strong>
                                       <i class="fa fa-list"></i> Category:
                                    </strong>
                                    {{$post->category->name}}
                                </small>
                               </div>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('storage/post-images/'.$post->image)}}" alt="" width="30%" style="border: 3px solid white">
                            
                                <br><br>
                                <h5><strong>{{ $post->title}}</strong></h5>

                               <div class="card p-3 bg-dark text-white">
                                <div class="card-body">
                                    <p style="text-align: justify;font-size:18px;">
                                        {{ $post->content }}
                                     </p>
                                </div>
                               </div>
                            </div>

                            <div class="card-footer">
                                <div>
                                    
                                    <div class="text-white">
                                        <span> {{$likes->count()}} Like</span> &nbsp;&nbsp;
                                        <span> {{ count($dislikes)}} DisLike</span> &nbsp;&nbsp;
                                        <span> {{ count($comments)}} Comment</span>
                                    </div>
                                    

                                    @auth
                                   <form  method="POST">
                                    @csrf 

                                    <button type="submit" formaction="{{url('/post/like/'.$post->id)}}" class="btn btn-sm btn-success like" 

                                     @if($likeStatus)
                                        @if($likeStatus->type == 'like')
                                            disabled
                                        @endif
                                     @endif>

                                        <i class="far fa-thumbs-up"></i> Like
                                    </button>&nbsp;&nbsp;

                                    <button type="submit" formaction="{{url('/post/dislike/'.$post->id)}}" class="btn btn-sm btn-danger like"

                                        @if($likeStatus)
                                            @if($likeStatus->type == 'dislike')
                                                disabled
                                            @endif
                                        @endif>

                                        <i class="far fa-thumbs-down"></i> Dislike
                                    </button>&nbsp;&nbsp;

                                    <button type="button" class="btn btn-sm btn-info comment" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                                        <i class="far fa-comment"></i> Comment
                                    </button>
                                    
                                   </form>
                                </div>
                                
                                <div class="comment-form mt-3 float-start">
                                    <div class="collapse" id="collapseExample">
                                        <form action="{{url('/post/comment/'.$post->id)}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <textarea name="text" id="" cols="30" rows="3" required></textarea>
                                                <br>
                                                <button type="submit"  class="btn btn-primary btn-sm">
                                                    <i class="far fa-paper-plane"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                        <br>
                                        <br>
                                        @foreach($comments as $comment)
                                        <div class="comment-show">
                                            {{-- <img src="" alt="" width="60px" style="border-radius:50%" height="60px">  --}}
                                           
                                            <div class="float-start mb-2 bg-primary text-white">{{$comment->user->name}}  </div>
                                            
                                                <div class="comment-box mt-2 bg-success text-light">
                                                {{ $comment->comment}}
                                                </div>

                                        </div>
                                        @endforeach
                                        <br><br>
                                      </div>
                                </div>
                                @endauth
                            </div>
                          </div>

                           
                        </div>
                    </div>
                </div>
@endsection