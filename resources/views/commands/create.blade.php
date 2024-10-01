@extends('layout.master')
@section('style-home')
<link rel="stylesheet" href="{{asset('css/style_commande.css')}}">
@endsection
@section('content')
<section class="product">
  <div class="product__photo">
    <div class="photo-container">
      <div class="photo-main">
      @if (!empty($car->image))
                    <img src="{{asset($car->image)}}" alt="">
                @else
                    <img src="{{asset('photoCar/Default.png')}}" alt="" style="width: 300px;
    margin-left: 40px">
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
      <form action="{{route('commande.store')}} " method="post"  class="reservation-form">
        @csrf
        <input type="hidden" name="car_id" value="{{$car->id}}">
        <div class="dateL">
          <label for="dateL">Date Debut :</label>
          <input type="date" name="dateL" id="dateL">
        </div>
        <div class="dateR">
          <label for="dateR">Date Fin :</label>
          <input type="date" name="dateR" id="dateR">
        </div>
        <a href=""> <button class="buy--btn">Reserver</button></a>
     
      </form>
  </div>

</section>
@endsection
@section('footer')
@endsection