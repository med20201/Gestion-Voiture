<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style_create_client.css')}}">
    <title>Create Account</title>
</head>
<body>
<div class="bg-image"></div>
    <!-- create forms starts -->
    <div class="container">
        
        <h1>create your <span>account</span></h1>
         <div>
           <a href="/"><button type="button" class="btn-close" aria-label="Close"  ></button></a> 
           </div>  
        <form action="{{route('user.store')}}" method="post">
         @csrf
            <input type="hidden" name="admin" value="0">
            <div class="mb-3">
                <label for="name" class="form-label">Nom Complet</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tapez votre Nom" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Tapez votre mail" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Tapez votre password" >
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmmer Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Tapez votre password" >
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Number Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Tapez votre number" >
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Tapez votre ville" >
            </div>
            <div class="mb-3">
              
            <button class="btn btn-primary" type="submit">Create</button>

            </div>

        </form>
        
    </div>
    <!-- create forms ends -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>