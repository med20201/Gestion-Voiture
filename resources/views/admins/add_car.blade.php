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
    <h1>Ajouter New Voiture</h1>
    <form action="{{route('car.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form_group">
            <label for="marque">Marque de Voiture :</label>
            <input type="text" name="marque" id="marque" placeholder="Marque de Voiture" required>
        </div>
        <div class="form_group">
            <label for="model">Model Voiture :</label>
            <input type="text" name="model" id="model" placeholder="Model Voiture" required>
        </div>
        <div class="form_group">
            <label for="prixJ">Prix Voiture Par Joure :</label>
            <input type="text" name="prixJ" id="prixJ" placeholder="Prix de Voiture Par Joure" required>
        </div>
        
      
        <div class="form_group">
            <label for="type">Type Voiture :</label>
            <select name="type" id="">
                <option value="" disabled selected>Choissie Type :</option>
                <option value="diesel">Diesel</option>
                <option value="essence">Essence</option>
            </select>
        </div>
     
        <div class="form_group">
            <label for="vitesse">Vitesse :</label>
           
            <input type="radio" name="vitesse" id="vitesse" value="automatique">automatique
            <input type="radio" name="vitesse" id="vitesse" value="manuelle">manuelle
        </div>
      
        <div class="form_group">
  <label for="image" class="form-label">Image de Voiture : </label>
  <input  type="file" id="formFile" name="image">
</div>
        <div class="form_group">
            <input type="submit" value="Ajoute Car ">
        </div>
    </form>
</div>

</div>

@endsection