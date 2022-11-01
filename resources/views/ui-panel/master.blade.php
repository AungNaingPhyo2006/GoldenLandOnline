<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
     <!-- FONT AWESOME  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
     <!-- CUSTOM CSS  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
     
    <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  
      <!-- Scripts -->
      @vite(['resources/js/app.js'])
</head>
<body>
    
            <nav class="navbar navbar-expand-lg bg-primary sticky-top">
              <div class="container-fluid p-2">
                <a class="navbar-brand text-white text-uppercase" href="{{url('/')}}"><i class="fas fa-book"></i> Book Review</a>
              
                  <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light text-uppercase">
                      <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="{{url('/')}}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/posts')}}">Reviews</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#">Books</a>
                      </li>

                      @if(Auth::check())
                        <li class="nav-item">
                          <a class="nav-link text-dark btn btn-info" href="{{ url('/register')}}"> {{ Auth::user()->name}} </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="" 
                          onclick="event.preventDefault(); 
                         if(confirm('Are you sure you want to logout?')){document.getElementById('logout-form').submit()}">Logout</a>

                          <form action="{{ url('/logout')}}" id="logout-form" method="POST" style="display: none">
                            @csrf
                          </form>
                        </li>
                      @else
                        <li class="nav-item">
                          <a class="nav-link text-white" href="{{ url('/login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href=" {{ url('/register')}}">Register</a>
                        </li>
                      @endif

                    </ul>

                  <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success bg-light" type="submit"><i class="fas fa-search"></i></button>
                  </form>
                </div>
              </div>
            </nav>
    {{-- ------ end --}}
    <div class="container-fluid">
        <div class="row bg-info">
            <div class="col-md-12">
                  @yield('content')
            </div>
        </div>
   </div>    

                <!-- FOOTER SECTION  -->
    <div class="footer">
        <div class="row">
          <div class="col-sm-12 col-md-4 mb-4">
            <h5>ABOUT THIS WEBSITE</h5>
            <p>
              Book Review - Dynamic Web App using PHP/laravel,Bootstrap,jQuery,
            </p>
          </div>
  
          <div class="col-sm-12 col-md-4 mb-4">
            <h5>CONTACT INFO</h5>
            <span> <i class="fas fa-mobile-alt"></i> +959 762 539 496 </span> <br>
            <span> <i class="far fa-envelope"></i> aung.anp.2006@gmail.com </span>
          </div>
  
          <div class="col-sm-12 col-md-4">
            <h5>FOLLOW ME ON</h5>
            <a href="https://www.facebook.com" target="_blank" class="btn btn-sm btn-outline-warning">
              <i class="fab fa-facebook-square"></i>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="https://www.instagram.com" target="_blank"  class="btn btn-sm btn-outline-warning">
            <i class="fab fa-instagram-square"></i>
           </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.linkedin.com" target="_blank"  class="btn btn-sm btn-outline-warning">
              <i class="fab fa-linkedin"></i>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://wwww.twitter.com" target="_blank" class="btn btn-sm btn-outline-warning">
              <i class="fab fa-twitter-square"></i>
            </a>
          </div>
  
        </div>
      </div>
   
    </div>

    <!-- CUSTOMS JS  -->
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>