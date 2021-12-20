<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Les Achats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" rel="stylesheet">

  </head>

  <style>
  
  </style>
  <body>
  

    <div class="d-flex justify-content-between mb-2">
        <img src="{{asset('/assets/images/logo.png')}}">
        
       <h5 class="text-center">Les Achats de : {{$date}}</h5>
        
     
    </div>
    <div class="container-fluid">
    <table class="table table-bordered ">
      <thead>
        <tr>
          <th >Vendeurs</th>
         
          <th >Quantité</th>
        
          <th>Destination</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        
         @foreach ($achats as $achat)
         <tr>
                <td >{{$achat->vendeur->name}} </td>
               
                <td>{{$achat->qte}}</td>
                <td>{{$achat->destination}}</td>
                <td>{{$achat->created_at}}</td>
              
         </tr>
        @endforeach

        <tr>
            
            <th colspan="2" >Total  : </th>
            <td  colspan="2"><b>{{$countachat}} Achats </b> </td>
          </tr>
      </tbody>
    </table>
    </div>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
</html>