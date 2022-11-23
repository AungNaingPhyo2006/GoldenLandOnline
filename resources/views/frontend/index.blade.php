<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Land</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- custom js file link  -->
    <script src="{{asset('js/script.js')}}" defer></script>

     <!-- Scripts -->
     @vite(['resources/js/app.js'])

</head>

<body style="background-color:#6495ed;">
    
<!-- header section starts  -->

<div id="menu-btn" class="fas fa-bars"></div>

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-graduation-cap"></i> Golden Land</a>

    <nav class="navbar1">
        <a href="#home"> <i class="fas fa-angle-right"></i> home </a>
        <a href="#courses"> <i class="fas fa-angle-right"></i> courses </a>
        <a href="#reviews"> <i class="fas fa-angle-right"></i> reviews </a>
        <a href="#blogs"> <i class="fas fa-angle-right"></i> blogs </a> 
        <a href="#contact"> <i class="fas fa-angle-right"></i> contact </a>
        
        @if(Auth::check())
        <a href="{{url('/register')}}"> <i class="fas fa-angle-right"></i> {{ Auth::user()->name}} ({{Auth::user()->status}})</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fas fa-angle-right"></i> logout
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
         </form>

         @else
         <a href="{{url('/login')}}"> <i class="fas fa-angle-right"></i> login </a>
         <a href="{{url('/register')}}"> <i class="fas fa-angle-right"></i>  register </a>

         @endif
    </nav>

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
    </div>

    <p class="credit">Education is <span>the key</span> to heaven.</p>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home" style="background-color:#6495ed;">

    <div class="image">
        <img src="images/home-img.svg" alt="">
        <div class="transition">
            <span style="font-size:28px ;">🌼</span>
        </div>
    </div>

    <div class="content">
        <span>online education</span>
        <h3>Knowledge will give you power. <a href="#">get started</a></h3>
        <p>Push yourself, because no one else is going to do it for you.</p>
        <a href="#courses" class="btn1">our courses</a> 
    </div>


</section>

<!-- home section ends -->

<!-- img slider start -->

<section style="background-color:#8b0000 ;">
    <div class="slider">
        <div class="slider-track">
            <div class="slider">
                <img src="images/course-1.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-2.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-3.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-4.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-5.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-6.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-1.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-2.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-3.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-4.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-5.svg" width="250" height="100" alt="">
            </div>
            <div class="slider">
                <img src="images/course-6.svg" width="250" height="100" alt="">
            </div>
        </div>
    </div>
</section>

<!-- img slider end  -->

<!-- category section starts  -->

<section class="category" id="category" style="background-color:#6495ed;">

    <div class="heading">
        <span>our category</span>
        <h3>our top category</h3>
    </div>

    <div class="box-container">
        @foreach($categories as $category)
        <div class="box">
            <i class="fas fa-code"></i>
            <h3 class="text-white">{{$category->name}}</h3>
            <p></p>
        </div>
        @endforeach
    </div>

</section>

<!-- category section ends -->

<!-- about section starts  -->

<section class="about" id="about" style="background-color:#6495ed;">

    <div class="image">
        <img src="images/about-img.svg" alt="">
    </div>

    <div class="content">
        <span>about us</span>
        <h3>best online platform for e-learning.</h3>
        <p>Easy learning with records. Repeat learning life-time.</p>
        <a href="#" class="btn1">read more</a>
    </div>

</section>

<!-- about section ends -->
<section class="courses" id="courses">

    <div class="heading">
        <span>our top courses</span>
        <h3>popular courses</h3>
    </div>

    <div class="box-container">
        @foreach($categories as $category)
        <div class="box">
            <div class="image">
                <img src="images/course-1.svg" alt="">
                <h3>{{$category->name}}</h3>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3 class="text-primary">{{$category->name}}</h3>
                <p class="text-primary">{{ $category->content}}</a>
            </div>
        </div>
        @endforeach
    </div>

</section>

<!-- courses section ends -->

<!-- pricing section starts  -->

<section class="pricing" id="pricing">

    <div class="heading">
        <span>choose a plan</span>
        <h3>affordable plans</h3>
    </div>

    <div class="box-container">

        <div class="box">
            <h3>basic plan</h3>
            <img src="images/price-1.svg" alt="">
            <div class="amount"> <span>$</span>30<span>/month</span> </div>
            <div class="list">
                <p> <i class="fas fa-check"></i> full courses </p>
                <p> <i class="fas fa-check"></i> online exams </p>
                <p> <i class="fas fa-check"></i> certificate </p>
                <p> <i class="fas fa-times"></i> full modules </p>
                <p> <i class="fas fa-times"></i> 24/7 support </p>
            </div>
            <a href="#" class="btn1">choose plan</a>
        </div>

        <div class="box">
            <h3>standard plan</h3>
            <img src="images/price-2.svg" alt="">
            <div class="amount"> <span>$</span>50<span>/month</span> </div>
            <div class="list">
                <p> <i class="fas fa-check"></i> full courses </p>
                <p> <i class="fas fa-check"></i> online exams </p>
                <p> <i class="fas fa-check"></i> certificate </p>
                <p> <i class="fas fa-check"></i> full modules </p>
                <p> <i class="fas fa-times"></i> 24/7 support </p>
            </div>
            <a href="#" class="btn1">choose plan</a>
        </div>

        <div class="box">
            <h3>premium plan</h3>
            <img src="images/price-3.svg" alt="">
            <div class="amount"> <span>$</span>90<span>/month</span> </div>
            <div class="list">
                <p> <i class="fas fa-check"></i> full courses </p>
                <p> <i class="fas fa-check"></i> online exams </p>
                <p> <i class="fas fa-check"></i> certificate </p>
                <p> <i class="fas fa-check"></i> full modules </p>
                <p> <i class="fas fa-check"></i> 24/7 support </p>
            </div>
            <a href="#" class="btn1">choose plan</a>
        </div>

    </div>

</section>

<!-- pricing section ends -->
<section class="reviews" id="reviews">

    <div class="heading">
        <span>client reviews</span>
        <h3>what they say?</h3>
    </div>

    <div class="box-container">

        <div class="box">
            <img src="images/pic-1.png" alt="">
            <h3>Aung</h3>
            <p>Education is the door to heaven.The more you give, the more you receive.Every you do,comes back to you.Do good,be good.As long as you feel pain,you are still alive.As long as you make mistakes,you are still human.As long as you keep trying,there is still hope.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/pic-2.png" alt="">
            <h3>Naing</h3>
            <p>Education is the door to heaven.The more you give, the more you receive.Every you do,comes back to you.Do good,be good.As long as you feel pain,you are still alive.As long as you make mistakes,you are still human.As long as you keep trying,there is still hope.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/pic-3.png" alt="">
            <h3>Phyo</h3>
            <p>Education is the door to heaven.The more you give, the more you receive.Every you do,comes back to you.Do good,be good.As long as you feel pain,you are still alive.As long as you make mistakes,you are still human.As long as you keep trying,there is still hope.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

    </div>

</section>

<!-- reviews section ends -->

<!-- blogs section starts -->

<section class="blogs" id="blogs" style="background-color: #2196f3;">

    <div class="heading">
        <span>our blogs</span>
        <h3>our untold stories</h3>
    </div>

    <div class="box-container">
        @foreach($blogs as $blog)
        <div class="box">
            <img src="{{asset('storage/blog-images/'.$blog->image)}}" alt="">
            <a href="#" class="title">{{$blog->title}}</a>
            <p class="blog-description">{{$blog->content}}</p>
            <div class="icons">
                <p><i class="fas fa-calendar"></i>{{$blog->created_at->diffForHumans()}}</p>
                <a href="#">read more</a>
            </div>
        </div>
        @endforeach

    </div>
    
</section>

<!-- blogs section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

    <div class="heading">
        <span>contact us</span>
        <h3>get in touch</h3>
    </div>

    <div class="row">

        <div class="contact-info-container">

            <div class="box">
                <i class="fas fa-phone"></i>
                <div class="info">
                    <h3>phone :</h3>
                    <p>+959-762-539-496</p>
                    <p>+959-693-762-282</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <div class="info">
                    <h3>email :</h3>
                    <p>aung.anp.2006@gmail.com</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-map"></i>
                <div class="info">
                    <h3>address :</h3>
                    <p>Yangon, Myanmar.</p>
                </div>
            </div>

            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>

        <form action="">
            <div class="inputBox">
                <input type="text" placeholder="name" name="" id="">
                <input type="email" placeholder="email" name="" id="">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="phone" name="" id="">
                <input type="text" placeholder="subject" name="" id="">
            </div>
            <textarea name="" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn1">
        </form>

    </div>

</section>
<!-- contact section ends -->

<!-- javaScript  -->

<script>
    window.onload = function(){
        document.getElementsByClassName('transition')[0].classList.add('translateAnimationClass');
    }
</script>
</body>
</html>