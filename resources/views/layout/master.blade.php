<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style_master.css')}}">
    @yield('swiper_css')
    @yield('style-home')
    @yield('bootstrap_css')
    @yield('car_css')
    @yield('admin_css')
    @yield('style_show_car')
    @yield('style_user_admin')
    <title>@yield('title')</title>
</head>
<body>

@section('header')
<!-- header section starts -->
<header class="header">
     <div id="menu-btn" class="fas fa-bars"></div>
    <a href="{{route('home')}}" class="logo"><span>auto</span>rent</a>
    <nav class="navbar">
      <a href="{{route('home')}}">home</a>
      <a href="{{route('car.index')}}">vehicules</a>
      <a href="#services" >services</a>
      <a href="#fuetured">fuetured</a>
      <a href="#review">review</a>
      <a href="#comment">comment</a>
    </nav>
   
   @auth
      
   <div id="login-btn">
    <form action="{{route('logout')}}" method="post" class="conecxion">
      @csrf
       <button type="submit" class="btn">Deconecte</button>      
       <!-- <span>Bounjour {{auth()->user()->name}} </span> -->
      <i class="far fa-user"></i>
    </form>
    @if (auth()->user()->isAdmin())
    <a href="{{route('admin')}}"><button class="btn">Dash Board</button></a> 

    @endif
      
    
    <a href="{{route('user.show',auth()->user()->id)}}"><button class="btn">Profil</button></a> 
    </div>
   
     @else
     <div id="login-btn">
       <a href="{{route('login')}}"><button class="btn">login</button>
        <i class="far fa-user"></i></a> 
    </div>
   @endauth
   

   
   
  </header>
<!-- header section ends -->

@show
@yield('content_admin')
@yield('content')

@section('footer')
<!-- footer section starts -->
<section class="footer">
  <div class="box-container">
    <div class="box">
      <h3>our branches</h3>
      <a href=""><i class="fas fa-map-marker-alt"></i>
    tetouan</a>
    <a href=""><i class="fas fa-map-marker-alt"></i>
    meknes</a>
    <a href=""><i class="fas fa-map-marker-alt"></i>
    youssofiya</a>
    <a href=""><i class="fas fa-map-marker-alt"></i>
    marakesh</a>
    </div>
    <div class="box">
      <h3>quick links</h3>
      <a href=""><i class="fas fa-arrow-right"></i>
    home</a>
    <a href=""><i class="fas fa-arrow-right"></i>
    vehicles</a>
    <a href=""><i class="fas fa-arrow-right"></i>
    services</a>
    <a href=""><i class="fas fa-arrow-right"></i>
    featured</a>
    <a href=""><i class="fas fa-arrow-right"></i>
    reviews</a>
    <a href=""><i class="fas fa-arrow-right"></i>
    contact</a>
    </div>
    <div class="box">
      <h3>quick links</h3>
      <a href=""><i class="fas fa-phone"></i>
    +212-00-00-00-00</a>
    <a href=""><i class="fas fa-phone"></i>
    +212-00-00-00-00</a>
    <a href=""><i class="fas fa-envelope"></i>
    auto.rent@gmail.com</a>
    <a href=""><i class="fas fa-map-marker-alt"></i>
    morocco , jamae mezwak TEOUAN - 93000</a>
    </div>
    <div class="box">
      <h3>quick links</h3>
      <a href=""><i class="fab fa-facebook-f"></i>
facebook : Auto Rent</a>
<a href=""><i class="fab fa-twitter"></i>twitter</a>
<a href=""><i class="fab fa-instagram"></i>instagram</a>
<a href=""><i class="fab fa-linkedin"></i>linkedin</a>
<a href=""><i class="fab fa-email">G</i>gmail</a>
   
    </div>
  </div>
  <div class="credit">create by jamae mezwak gang  | all rights reserved!</div>
</section>



<!-- footer section ends -->

@show
  @yield('bootstrap_js')
  @yield('swiper_js')
  @yield('script_home')
  @yield('script_admin')
  <script src="{{asset('js/script_master.js')}}"></script>

</body>
</html>