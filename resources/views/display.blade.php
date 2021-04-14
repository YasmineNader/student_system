
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
<h3>ALL students</h3>
<h3>{{ session()->get('Message') }}</h3>

{{session()->flush()}}
 
{{-- <p>{{ 'welcome '.auth()->user()->name }}</p> --}}
<a href="{{ url('LogOut') }}">LogOut</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail </th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($student_data as $data)

    <tr>
      <th>{{ $data->id }}</th>
      <td>{{ $data->name }}</td>
      <td>{{ $data->email }}</td>
      
      <td>
          <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}" >Delete</a>
          <a href="{{ url('Student/'.$data->id).'/edit' }}" class="btn btn-success" >Edit</a>
    </td>
    </tr> 

    <div class="modal fade" id="exampleModal{{ $data->id }}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ "Confirm to delete  ". $data->name}}
      </div>
      <div class="modal-footer">
        <form action="{{url('Student/'.$data->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <div class="not-empty-record">
                <button type="submit" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            </div>
        </form>
    </div>
  </div>
</div>
    @endforeach
  </tbody>
</table>
<a href="{{url('Student/create')}}" class="btn btn-primary mb-3">Add student</a>
</div>
</div>
</div>
</body>
</html>



