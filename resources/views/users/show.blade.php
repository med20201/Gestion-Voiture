@extends('layout.master')
@section('bootstrap_css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endsection
@section('style-home')
<link rel="stylesheet" href="{{asset('css/style_profil.css')}}">
@endsection
@section('content')
<div class="container container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="infos text-center">
                <div class="name">
                    <h1 class="text-center mb-4"> Hello {{$user->name}}</h1>
                </div>
                <div class="phone">
                    <h2> Phone : {{$user->phone}}</h2>
                </div>
                <div class="email">
                    <h2> Email : {{$user->email}}</h2>
                </div>
                <div class="ville">
                    <h2> Ville : {{$user->ville}}</h2>
                </div>

            </div>

        </div>
        <div class="col-8">
            <h1 class="text-center">Reservation</h1>
            <table class="table table-hover tab_res">
                <thead>
                    <tr>
                        <th scope="col">Marque</th>
                        <th scope="col">Type</th>
                        <th scope="col">PrixJ/dh</th>
                        <th scope="col">Jours</th>
                        <th scope="col">Date debut</th>
                        <th scope="col">Date Fin</th>
                        <th scope="col">PrixTTC/dh</th>
                        <th scope="col">Statu</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($commandes = auth()->user()->commands as $command)

                    <tr>
                        <td>{{$command->car->marque }}</td>
                        <td>{{$command->car->type }}</td>
                        <td>{{$command->car->prixJ }}dh</td>
                        <td>{{$command->jours }}</td>
                        <td>{{$command->dateL }}</td>
                        <td>{{$command->dateR }}</td>
                        <td>{{$command->prixTTC }}dh</td>
                        <td>{{$command->statu}}</td>
                        <td>
                            @if ($command->statu == 'en_coure')
                                
                            @else
                            <form action="{{route('commande.destroy',$command->id)}}" method='post'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger " onclick="return confirm('vous voulez Suprimmer cette commande')">Suprimmer</button>
                            </form>
                            @endif
                        
                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection
@section('bootstrap_js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endsection