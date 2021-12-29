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
          <th>F</th>
          <th>D</th>
          <th>C</th>
          <th>S</th>
          <th>P</th>
          <th>W</th>
          <th>L</th>
          <th>T</th>
          <th>FP</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        
         @foreach ($achats as $achat)
         <tr>
                <td >{{$achat->vendeur->name}} </td>
               
                <td>{{$achat->qte}}</td>
                <td>{{$achat->destination}}</td>
                <td>{{$achat->analyse->f}}</td>
                <td>{{$achat->analyse->d}}</td>
                <td>{{$achat->analyse->c}}</td>
                <td>{{$achat->analyse->s}}</td>
                <td>{{$achat->analyse->p}}</td>
                <td>{{$achat->analyse->w}}</td>
                <td>{{$achat->analyse->l}}</td>
                <td>{{$achat->analyse->t}}</td>
                <td>{{$achat->analyse->fp}}</td>
                <td>{{$achat->created_at->format('d-m-Y')}}</td>
              
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
