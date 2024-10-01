@extends('layout.master')
@section('style-home')
<link rel="stylesheet" href="{{asset('css/style_show_car.css')}}">
@endsection
@section('content')
<section class="product">
	<div class="product__photo">
		<div class="photo-container">
			<div class="photo-main">
			@if (!empty($car->image))
                    <img src="{{asset($car->image)}}" alt="">
                @else
                    <img src="{{asset('photoCar/Default.png')}}" alt="" width="180px">
                @endif
			</div>
		
		</div>
	</div>
	<div class="product__info">
		<div class="title">
			<h1>{{$car -> marque}}</h1>
		</div>
		<div class="price">
			 <span>{{$car -> prixJ}}</span> DH/J
		</div>
		<!-- <div class="variant">
			<h3>SELECT A COLOR</h3>
			<ul>
				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302064/codepen/delicious-apples/green-apple2.png" alt="green apple"></li>
				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302752/codepen/delicious-apples/yellow-apple.png" alt="yellow apple"></li>
				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302427/codepen/delicious-apples/orange-apple.png" alt="orange apple"></li>
				<li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302285/codepen/delicious-apples/red-apple.png" alt="red apple"></li>
			</ul>
		</div> -->
		<div class="description">
			<h3 style="color: black;">Fonctionnalités</h3>
			<ul>
				<li>Model :{{$car -> model}} </li>
				<li>Carburant : {{$car -> type}}</li>
				<li>Transmission : {{$car -> vitesse}}</li>
                
				<li>Disponible : {{($car->dispo)?'Disponible':'Pas Disponible'}}</li>
			</ul>
		</div>
        @if ($car->dispo)
		@auth
			<a href="{{route('command.craete', ['id' => $car->id])}}"> <button class="buy--btn">Rent Now</button></a> 
			@else
			<a href="{{route('login')}}"> <button class="buy--btn">Rent Now</button></a> 
		@endauth
          
           <a href="{{route('car.index')}}"><button class="buy--btn">More Car</button></a> 
        @else
        <a href="{{route('car.index')}}" class="dispo"><button class="buy--btn dispo ">Pas Disponible</button></a> 
           <a href="{{route('car.index')}}"><button class="buy--btn">More Car</button></a>
        @endif
		
	</div>
</section>
@endsection
@section('footer')
@endsection


