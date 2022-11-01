<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   
     <!-- Fontawesome  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Scripts -->
     @vite(['resources/js/app.js'])

     <style>
        body{
            overflow-x: hidden;
        }
        ul a{
            text-decoration: none;
        }
     </style>
    
</head>
<body class="bg-info">
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 bg-info pe-2 fixed-top mt-2">
                <h1 class="h5 text-dark text-uppercase text-center py-2">
                    <i class="fas fa-user-cog me-2"></i>
                    <span class="d-none d-lg-inline">Admin Dashboard</span>
                </h1>
                <!-- Menu Items -->
                <ul class="list-group text-center text-lg-start mt-4 ms-2">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <strong>Controls</strong>
                    </span>
                    
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ url('/admin/dashboard')}}">
                            <i class="fas fa-home me-2"></i>
                            <span class="d-none d-lg-inline">Home</span>
                        </a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{url('/admin/categories')}}">
                            <i class="fas fa-user-edit me-2"></i>
                            <span class="d-none d-lg-inline">Categories</span>
                        </a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{url('admin/posts')}}">
                            <i class="fas fa-chart-line me-2"></i>
                            <span class="d-none d-lg-inline">Latest Reviews</span>
                        </a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{url('/admin/sell')}}">
                            <i class="fas fa-book me-2"></i>
                            <span class="d-none d-lg-inline">Best Sellers</span>
                        </a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{url('/admin/partners')}}">
                            <i class="fas fa-flag me-2"></i>
                            <span class="d-none d-lg-inline">Total Partners</span>
                        </a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{ url('/admin/customer_count')}}">
                            <i class="fas fa-users me-2"></i>
                            <span class="d-none d-lg-inline">Total Customers</span>
                        </a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{ url('/')}}">
                            <i class="fas fa-globe me-2"></i>
                            <span class="d-none d-lg-inline">View Website</span>
                        </a>
                    </li>

                </ul>

                <!-- Actions -->
                <div class="list-group mt-4 text-center text-lg-start ms-2 mb-2">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <strong>Action</strong>
                    </span>
                    <a href="{{url('/admin/users')}}" class="list-group-item list-group-item-action">
                        <i class="fas fa-user"></i>
                        <span class="d-none d-lg-inline">User List</span>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-edit"></i>
                        <span class="d-none d-lg-inline">Update Data</span>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="d-none d-lg-inline">Add Events</span>
                    </a>
                </div>
            </nav>

            <main class="col-10 bg-info ms-auto">
                <div class="navbar navbar-expand navbar-light bg-info">
                    <div class="flex-fill bg-info"> 
                        <h6 class="text-center mt-2 text-dark text-uppercase"><strong>Book Store Admin Dashboard</strong></h6>
                    </div>

                    <div class="navbar-nav bg-info">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-dark text-uppercase" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end bg-warning">
                                <li><a href="#" class="dropdown-item">Profile</a></li>
                                <li class="dropdown-divider"></li>
                               
                                <li>
                                  <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>

              <div class="container-fluid mt-3 p4">
                    @yield('content')
              </div>

            </main>
             
            <!-- Social Media -->

            <div class="text-center mt-5 ms-5" style="font-size: 25px;"> 
                
                <span>
                   <a href="https://facebook.com">
                       <i class="fab fa-facebook"></i></a>
                </span>
                     
                <span class="ms-2">
                   <a href="https://linkedin.com">
                       <i class="fab fa-linkedin"></i></a>
                </span>
   
                <span class="ms-2">
                   <a href="https://twitter.com">
                       <i class="fab fa-twitter"></i></a>
                </span>
   
                <span class="ms-2">
                   <a href="https://instagram.com">
                       <i class="fab fa-instagram"></i></a>
                </span>
   
                <span class="ms-2">
                   <a href="https://youtube.com">
                       <i class="fab fa-youtube"></i></a>
                </span>
                   
               </div>

              <!-- footer -->

            <footer class="text-center py-4 text-muted ms-5">&copy; Copyright 2022 Aung Naing Phyo &trade;</footer>
        </div>
    </div>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    @yield('script');
</body>
</html>
