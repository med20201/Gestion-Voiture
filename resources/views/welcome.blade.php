@extends('layout.master')
@section('swiper_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection
@section('style-home')
<link rel="stylesheet" href="{{asset('css/style_home.css')}}">
@endsection
@section('title','home')
@section('content')
<!-- home section starts -->
<section class="home" id="home">
    <h1 class="home-parallax" data-speed="-2">rent your car</h1>
    <img class="home-parallax" data-speed="5" src="{{asset('images/images/home-img.png')}}" alt="">

    <a href="{{route('car.index')}}" class="btn home-parallax" data-speed="7">More Cars</a>
</section>
<!-- home section ends -->
<!-- icons section starts -->
<section class="icons-container">

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>{{$cars->count()}}+</h3>
            <p>cars sold</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
            <h3>{{ $users->count() }}+</h3>
            <p>happy clients</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>{{$newCars->count()}}+</h3>
            <p>new cars</p>
        </div>
    </div>
</section>


<!-- icons section ends -->
<!-- vehicles section starts  -->
<section class="vehicles" id="vehicles">
    <h1 class="heading">Popullar <span>vehicles</span></h1>
    <div class="swiper vehicles-slider">
        <div class="swiper-wrapper">
            @isset($cars)
            @foreach ($cars as $car )
            <div class="swiper-slide box">
                @if (!empty($car->image))
                <img src="{{asset($car->image)}}" alt="">
                @else
                <img src="{{asset('photoCar/Default.png')}}" alt="">
                @endif

                <div class="content">
                    <h3>{{$car->marque}}</h3>
                    <div class="price"><span>price :</span>{{$car->prixJ}}DH / DAY</div>
                    <p>

                        <span class="fas fa-circle"></span>{{$car->model}}
                        <span class="fas fa-circle"></span>{{$car->vitesse}}
                        <span class="fas fa-circle"></span> {{$car->type}}
                        <br>
                        <span class="fas fa-circle"></span>
                        {{($car->dispo)?'Disponible':'Pas Disponible'}}
                    </p>
                    @if($car->dispo)
                    @auth
                    <a href="{{route('car.show',$car->id)}}" class="btn">Rent Now</a>
                    @else
                    <a href="{{route('login')}}" class="btn">Rent Now</a>

                    @endauth


                    @endif
                </div>
            </div>

            @endforeach
            @endisset

        </div>
        <div class="swiper-pagination"></div>
    </div>

</section>

<!-- vehicles section ends -->
<!-- service section starts -->
<section class="services" id="services">
    <h1 class="heading">our <span>services</span></h1>
    <div class="box-container">
        <div class="box">
            <i class="fas fa-car"></i>
            <h3>car rent</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus numquam ad similique totam blanditiis minima
            </p>
            <a href="#" class="btn">read more</a>
        </div>
        <div class="box">
            <i class="fas fa-tools"></i>
            <h3>part repair</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus numquam ad similique totam blanditiis minima
            </p>
            <a href="#" class="btn ">read more</a>
        </div>
        <div class="box">
            <i class="fas fa-car-crash"></i>
            <h3>car insurance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus numquam ad similique totam blanditiis minima
            </p>
            <a href="#" class="btn">read more</a>
        </div>
        <div class="box">
            <i class="fas fa-car-battery"></i>
            <h3>battry replacement</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus numquam ad similique totam blanditiis minima
            </p>
            <a href="#" class="btn">read more</a>
        </div>
        <div class="box">
            <i class="fas fa-gas-pump"></i>
            <h3>oil change</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus numquam ad similique totam blanditiis minima
            </p>
            <a href="#" class="btn">read more</a>
        </div>
        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>24/7 supports</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus numquam ad similique totam blanditiis minima
            </p>
            <a href="#" class="btn">read more</a>
        </div>
    </div>
</section>


<!-- service section ends -->
<!-- featured section starts -->
<section class="featured carF" id="fuetured">
    <h1 class="heading"><span>featured</span> cars</h1>
    <div class="swiper featured-slider">
        <div class="swiper-wrapper">
            @isset($carsF)
            @foreach($carsF as $car)
            <div class="swiper-slide box">
                @if (!empty($car->image))
                <img src="{{asset($car->image)}}" alt="">
                @else
                <img src="{{asset('photoCar/Default.png')}}" alt="">
                @endif
                <h3>{{$car -> marque}}</h3>

                <div class="price">{{$car -> prixJ}}DH/day</div>
                @if($car->dispo)
                @auth
                <a href="{{route('car.show',$car->id)}}" class="btn">Detaile Voiture</a>
                @else
                <a href="{{route('login')}}" class="btn">Rent Now</a>
                @endauth
                @endif
            </div>
            @endforeach
            @endisset
        </div>
        <div class="swiper-pagination"></div>
    </div>

</section>
<!-- featured section ends -->
<!-- logo section starts  -->
<section class="newsletter">
    <h3>marque voiture</h3>
    <div class="swiper featured-slider">
        <div class="swiper-wrapper"  style="margin: 30px 0px;">
            <div class="swiper-slide box">
                <img src="{{asset('images/logo/dacia.png')}}" alt="" width="150px">
            </div>
            <div class="swiper-slide box" style="margin: 30px;">
                <img src="{{asset('images/logo/fiat.png')}}" alt="" width="150px">
            </div>
            <div class="swiper-slide box" style="margin: 30px;">
                <img src="{{asset('images/logo/ford.png')}}" alt="" width="150px">
            </div>
            <div class="swiper-slide box" style="margin: 30px;">
                <img src="{{asset('images/logo/hundai.png')}}" alt="" width="150px">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- logo section ends -->
<!-- review section starts  -->
<section class="reviews" id="review">
    <h1 class="heading">client's <span>review</span></h1>
    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">
            
           @foreach ($comments as $cmt)
           <div class="swiper-slide box">
                <div class="content"> 
                    <p>{{$cmt->commentaire}}</p>
                    <h3>{{$cmt->user->name}}</h3>
                    
                </div>
            </div>    
           @endforeach
           
           
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- review section ends -->
<!-- comment sesection starts  -->

<h1 class="heading" id="comment"><span>Ajouter  </span>comment</h1>
<section class="contact" id="contact">
    <div class="row">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d150426.99765377382!2d-5.3625516!3d35.5888995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x43258dbd024e7abc!2s%D8%AA%D8%B7%D9%88%D8%A7%D9%86!5e0!3m2!1sen!2sma!4v1563267020561!5m2!1sen!2sma" allowfullscreen="" loading="lazy"></iframe>
      @auth
        <form action="{{route('commentaire.store')}}" method="post">
        @csrf
      @else
      <form action="{{route('login')}}" >

      @endauth      
        
            <h3>get in touch</h3>
           
            <textarea name="commentaire" placeholder="message" class="box" cols="30" rows="10"></textarea>
        
            <input type="submit" value="send message " class="btn">
        </form>
    </div>

</section>

<!-- comment sesection ends -->




@endsection
@section('swiper_js')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js">
</script>
@endsection
@section('script_home')
<script src="{{asset('js/script_home.js')}}"></script>
@endsection