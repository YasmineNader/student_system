

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
        <h2>Student Update form</h2>
        <form action="{{ url('Student/'.$student_data->id ) }}" method="post" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="_method" value="put">
                <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name"  value="{{ $student_data->name }}" class="form-control" id="name"  placeholder="Enter Your Name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" value="{{ $student_data->email }}"  class="form-control" id="email" placeholder="Enter Your E-mail">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>

</html>








