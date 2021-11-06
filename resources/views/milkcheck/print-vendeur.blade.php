<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Les Vendeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" rel="stylesheet">

  </head>

  <style>
  
  </style>
  <body>
  
    
    <div class="d-flex justify-content-between mb-2">
        
        <img src="{{asset('/assets/images/logo.png')}}">
        <div class="container">
        <div class="row justify-content-center">
        <h3>Les Vendeurs </h3>
     
        </div>
        </div>
    </div>
  
    <div class="container-fluid">
    <table class="table table-bordered ">
      <thead>
        <tr>
          <th  scope="col">Vendeur</th>
          <th  scope="col">Quantité</th>
        </tr>
      </thead>
      <tbody>
        
         @foreach ($vendeurs as $vendeur)
         <tr>
                <td >{{$vendeur->vendeur->name}} </td>
               
                <td>{{$vendeur->qte}} L</td>
               
         </tr>
        @endforeach

      </tbody>
    </table>
    
    </div>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
</html>
