

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

   

    
    <div class="container">
        <h2>Student form</h2>
        <form action="{{url('login')}}" method="post" enctype="multipart/form-data">

            @csrf
            
           

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}"  class="form-control" id="email" placeholder="Enter Your E-mail">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{ old('password') }}"  class="form-control" id="password" placeholder="Enter Your Password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

           
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
              </div>
            <button type="submit" class="btn btn-primary">LogIn</button>
        </form>
    </div>

</body>

</html>








