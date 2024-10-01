@extends('layout.master_admin')
@section('style_user_admin')
<link rel="stylesheet" href="{{asset('css/style_user_admin.css')}}">
@endsection
@section('bootstrap_css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endsection
@section('section_admin')
<table class="table table-hover ">
    <thead>
        <tr>
            <th scope="col">User_id</th>
            <th scope="col">name User</th>
            <th scope="col">Car_id</th>
            <th scope="col"> name Car</th>
            <th scope="col">date Location</th>
            <th scope="col">date Retour</th>
            <th scope="col">Jours</th>
            <th scope="col">prixTTC</th>
            <th scope="col">statu</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($commandes as $command)

        <tr>
            <td>{{$command->user_id }}</td>
            <td>{{$command->user->name}}</td>
            <td>{{$command->car_id }}</td>
            <td>{{$command->car->marque }}</td>
            <td>{{$command->dateL }}</td>
            <td>{{$command->dateR }}</td>
            <td>{{($command->jours) }}Joure</td>
            <td>{{$command->prixTTC}}/DH</td>
            <td>{{$command->statu}}</td>
            <td>
                @if ($command->statu == 'en_coure')
                <form action="{{route('command.termineCmd',$command->id)}}" method='post' >
                    @csrf               
                    <button class="btn accept">terminee</button>

                </form>        
                
                @else
                <form action="{{route('commande.destroy',$command->id)}}" method='post' >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn " onclick="return confirm('Vous voulez supprimer cette commande')">Suprimmer</button>
                </form>
                
                
                @endif
                <form action="{{route('command.acceptCmd',$command->id)}}" method='post' class="mt-3">
                    @csrf
                    @if ($command->statu === 'non_traiter')
                    <button class="btn accept">Accepte</button>
                   
                    @elseif ($command->status === 'en_coure')
                    <button class="btn accept">terminer</button>
                    @else
                       
                    @endif
                </form>

            </td>


        </tr>
        @endforeach

    </tbody>
</table>

@endsection