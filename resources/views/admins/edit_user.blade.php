@extends('layout.master_admin')
@section('style_user_admin')
<link rel="stylesheet" href="{{asset('css/style_user_admin.css')}}">
@endsection
@section('section_admin')

<div class="form_car">
    <h1>Modifier User</h1>
    <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form_group">
            <label for="name">Nom Complet :</label>
            <input type="text" name="name" id="name" placeholder="Nom Complet" required value="{{$user->name}}">
        </div>
        <div class="form_group">
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" placeholder="Email" required value="{{$user->email}}">
        </div>
        <div class="form_group">
            <label for="phone">Phone :</label>
            <input type="text" name="phone" id="phone" placeholder="Phone" required value="{{$user->phone}}">
        </div>
        
        <div class="form_group">
            <label for="phone">Ville :</label>
            <input type="text" name="ville" id="ville" placeholder="Ville" required value="{{$user->ville}}">
        </div>
        <div class="form_group">
            <label for="phone">Admin :</label>
            <input style="margin-right: 200px;" type="radio" name="admin" id="admin" value="1" {{($user->admin)?'checked':null}} >
        </div>
        <div class="form_group">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" placeholder="password" required value="">
        </div>
        <div class="form_group">
            <label for="password">Password Confirmation :</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password" required>
        </div>
        <div class="form_group">
            <input type="submit" value="Enregistre modification ">
        </div>
    </form>
</div>

</div>

@endsection