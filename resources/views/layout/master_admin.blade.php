@extends('layout.master')
@section('admin_css')
<link rel="stylesheet" href="{{asset('css/style_admin.css')}}">

@endsection


@section('header')
<header class="header">
     <div id="menu-btn" class="fas fa-bars"></div>
    <a href="{{route('home')}}" class="logo"><span>auto</span>rent</a>
    <nav class="navbar">
    <a href="{{route('admin')}}">accueil</a>
      <a href="{{route('user.index')}}">users</a>
      <a href="{{route('car.admin')}}">vehicules</a>
      <a href="{{route('command.admin')}}" >commands</a>
    </nav>
   
   @auth
      
   <div id="login-btn">
    <form action="{{route('logout')}}" method="post" class="conecxion">
      @csrf
       <button type="submit" class="btn">Deconecte</button>      
       <!-- <span>Bounjour {{auth()->user()->name}} </span> -->
      <i class="far fa-user"></i>
    </form>
 
    <a href="{{route('user.show',auth()->user()->id)}}"><button class="btn">Profil</button></a> 
    </div>
   
     @else
     <div id="login-btn">
       <a href="{{route('login')}}"><button class="btn">login</button>
        <i class="far fa-user"></i></a> 
    </div>
   @endauth
  </header>
  
@endsection
@section('content_admin')
<div class="container">
    <div class="sidebar">
        <h1 id="titre">Options Admins </h1>
        <ul class="option avtive">
            <a href="{{route('add.Admin')}}"><li>Ajouter Admin</li></a>
            <a href="{{route('car.create')}}"><li>Ajouter Car </li></a>
        </ul>
    </div>
    <div class="content">
        <div class="bg-img">

        </div>
        <div class="wrapper">
           @yield('section_admin')
        </div>
    </div>
</div>
@endsection





@section('footer')
@endsection
@section('script_admin')
<script src="{{asset('js/script_admin.js')}}"></script>
@endsection