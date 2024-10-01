@extends('layout.master_admin')
@section('style_user_admin')
<link rel="stylesheet" href="{{asset('css/style_user_admin.css')}}">
@endsection
@section('bootstrap_css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endsection
@section('section_admin')

<table class="table table-hover ">
    <caption>
        @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
    </caption>
    <thead>
        <tr>
            <th scope="col">Marque</th>
            <th scope="col">Model</th>
            <th scope="col">Carburant</th>
            <th scope="col">Transmission</th>
            <th scope="col">prixJ</th>
            <th scope="col">Statu</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($cars as $car)

        <tr>
            <td>{{$car->marque }}</td>
            <td>{{$car->model }}</td>
            <td>{{$car->type }}</td>
            <td>{{$car->vitesse }}</td>
            <td>{{$car->prixJ }} DH</td>
            <td>{{($car->dispo)?'Disponible':'Pas Disponible' }}</td>

            <td>
                @if (!empty($car->image))
                <img src="{{asset($car->image)}}" alt="" width="80px">
            </td>
            @else
            <img src="{{asset('photoCar/default.png')}}" alt="" width="80px"> </td>

            @endif

            <td>
                <form action="{{route('car.destroy',$car->id)}}" method='post'>
                    @csrf
                    @method('DELETE')
                    <a href="{{route('car.edit' , $car->id)}}" class="btn">Modifier</a>
                    <button type="submit" class="btn  " onclick="return confirm('vous voulez suprimmer car')">DELETE</button>
                </form>
            </td>


        </tr>
        @endforeach

    </tbody>
</table>

@endsection