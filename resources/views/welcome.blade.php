<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

        
        <a href="add" class="btn btn-primary btn-sm">Insert</a>
      
            <tr>
            <table class="table table-dark">
               
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">city</th>
      <th scope="col">marks</th>
     <th scope="col">image</th>
     <th scope="col">action</th>
    </tr>   
       @foreach($crud as $data)
                   <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->city}}</td>
                    <td>{{$data->marks}}</td>

                  <td>  <img src={{"http://127.0.0.1:8000/images/{$data->image}"}} width="100px"></td>

               
                 <td><a href="delete/{{$data->id}}" class="btn btn-primary btn-sm">Delete</a>
                     <a href="edit/{{$data->id}}" class="btn btn-primary btn-sm">Edit</a></td>

                   </tr>
       @endforeach

</table>
</body>
</html>
