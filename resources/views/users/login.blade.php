<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/style_login.css')}}">
  <title>Create Account</title>

</head>

<body>
  <div class="bg-image"></div>

  <div class="wrapper">
      <!-- login form starts-->
  <div class="login-form-container">
  <span class="fas fa-times" id="close-login-form"></span>
  
  <form action="{{route('auth')}}" method="post">
    @csrf
    <h3>user <span>login</span> </h3>
    <div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
    <div>
    <a href="/"><button type="button" class="btn-close" aria-label="Close"></button></a> 
    </div>  
    <input type="email" name="email" id="email" placeholder="email" class="box">
    <div>
   
    </div>
    <input type="password" name="password" id="password" placeholder="password" class="box">
    @if($message=Session::get('error'))
    <div class="alert alert-danger">
        <p>{{$message}}</p>
    </div>
@endif
<input type="submit" value="login now" class="btn">
    <p>forget your password <a href="#" class="btn">click here</a></p>
    
    <p>don't have an account <a href="{{route('user.create')}} " id="create-btn"><span class="create">create one</span> </a> </p>
  </form>
</div>
  <!-- login form ends-->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>