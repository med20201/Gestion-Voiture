@extends('layout.master')
@section('bootstrap_css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<!-- Font Awesome -->

@endsection

@section('car_css')
<link rel="stylesheet" href="{{asset('css/style_car.css')}}">
@endsection
@section('header')
  <!-- header section starts -->
<header class="header">
     <div id="menu-btn" class="fas fa-bars"></div>
    <a href="{{route('home')}}" class="logo"><span>auto</span>rent</a>
    <nav class="navbar">
      <a href="{{route('home')}}">home</a>
      <a href="{{route('car.index')}}">vehicules</a>
      <a href="{{route('home')}}" >services</a>
      <a href="{{route('home')}}">fuetured</a>
      <a href="{{route('home')}}">review</a>
      <a href="#comment">Comment</a>
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
@endsection
@section('content')
<div class="container ">
  <!-- nav search start  -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Categorie :</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('carType', 'diesel') }}">Diesel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('carType', 'essence') }}">Essence</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('carVitesse', 'automatique') }}">Automatique</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('carVitesse', 'manuelle') }}">Manuelle</a>
          </li>


        </ul>
        <form class="d-flex" role="search" action="{{route('car.index')}}">
          @csrf
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- nav search end -->
  <!-- cars list starts -->
  <div class="row " id="ads">
    @isset($cars)
    @foreach ($cars as $car)
    <div class="col-md-4 mb-5">
      <div class="card rounded">
        <div class="card-image">
          <span class="card-notify-badge">New</span>
          <span class="card-notify-year">{{$car -> model}}</span>
          @if (!empty($car->image))
            <img class="img-fluid" src="{{asset($car->image)}}" alt="Alternate Text"/>
            @else
            <img class="img-fluid" src="{{asset('photoCar/default.png')}}" alt="Alternate Text"  width="280px"/>

          @endif
          
        </div>
        <div class="card-image-overlay m-auto">
          <span class="card-detail-badge">Used</span>
          <span class="card-detail-badge">{{$car -> vitesse}}</span>
          <span class="card-detail-badge">{{$car -> type}}</span>
          <span class="card-detail-badge">{{$car -> prixJ}}DH/J</span>
        </div>
        <div class="card-body text-center">
          <div class="ad-title m-auto">
            <h5>{{$car -> marque}}</h5>
          </div>
          @if ($car ->dispo)
          @auth
          <a href="{{route('car.show',$car->id)}}" class="ad-btn">Rent Now</a>
          @else
          <a href="{{route('login')}}" class="ad-btn">Rent Now</a>
          @endauth


          @else
          <a href="#" class="ad-btn dispo">Pas Disponible</a>
          @endif
          <a href="{{route('car.show',$car -> id)}}" class="ad-btn ">Detaile Car</a>
        </div>
      </div>
    </div>
    @endforeach

    @endisset




  </div>


  {{ $cars->links() }}
  <!-- cars list ends -->
</div>

@endsection
@section('footer')

@endsection