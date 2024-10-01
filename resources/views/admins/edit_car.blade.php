@extends('layout.master_admin')
@section('style_user_admin')
<link rel="stylesheet" href="{{asset('css/style_user_admin.css')}}">
@endsection
@section('section_admin')

<div class="form_car">
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
</ul>
@endif
    <h1>Modifier Voiture</h1>
    <form action="{{route('car.update',$car->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form_group">
            <label for="marque">Marque de Voiture :</label>
            <input type="text" name="marque" id="marque" placeholder="Marque de Voiture" value="{{$car->marque}}" required >
        </div>
        <div class="form_group">
            <label for="model">Model Voiture :</label>
            <input type="text" name="model" id="model" placeholder="Model Voiture" value="{{$car->model}}" required>
        </div>
        <div class="form_group">
            <label for="prixJ">Prix Voiture Par Joure :</label>
            <input type="text" name="prixJ" id="prixJ" placeholder="Prix de Voiture Par Joure" value="{{$car->prixJ}}" required>
        </div>
        
      
        <div class="form_group">
            <label for="type">Carburant Voiture :</label>
            <select name="type" id="">
                <option value="" disabled >Choissie Type :</option>
                <option value="diesel"  {{($car->type == 'diesel')?'selected':null}}>Diesel</option>
                <option value="essence" {{($car->type == 'essence')?'selected':null}}>Essence</option>
            </select>
        </div>
     
        <div class="form_group">
            <label for="vitesse">Transmission :</label>
           
            <input type="radio" name="vitesse" id="vitesse" value="automatique" {{($car->vitesse == 'automatique')?'checked':null}}>automatique
            <input type="radio" name="vitesse" id="vitesse" value="manuelle" {{($car->vitesse == 'manuelle')?'checked':null}}>manuelle
        </div>
      
        <div class="form_group">
        @isset($car->image)
                <img src="{{ asset($car->image) }}" alt="" width="200px"><br>
             @endisset
  <label for="image" class="form-label">Image de Voiture : </label>
  <input  type="file" id="formFile" name="image" >
</div>
        <div class="form_group">
            <input type="submit" value="Modifier ">
        </div>
    </form>
</div>

</div>

@endsection