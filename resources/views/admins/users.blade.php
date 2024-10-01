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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">ville</th>
                        <th scope="col">Date inscreption</th>
                        <th scope="col">Statu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($users  as $user)

                    <tr>
                        <td>{{$user->name }}</td>
                        <td>{{$user->email }}</td>
                        <td>{{$user->phone }}</td>
                        <td>{{$user->ville }}</td>
                        
                       <td>{{$user->created_at }}</td>
                       <td>{{($user->admin)?'Admin':'User' }}</td>
                        <td>
                            <form action="{{route('user.destroy',$user->id)}}" method='post'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger " onclick="return confirm('vous voulez suprimmer user')">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        
@endsection