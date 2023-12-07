@extends('layouts.milkcheck')
@section('content')
<style>
    .btn{
        padding: 0.4rem 0.4rem !important;
    }

</style>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">productions</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des productions</h6>
    <p class="text-muted mb-3">Vous trouvez ici  les productions.</p>
    <div class="d-flex flex-row-reverse">
      <a href="{{asset('/milkcheck/lpc/productions/create')}}" type="button" class="btn btn-primary mb-3 add-brand">Ajouter Production</a>
   </div>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>DATE</th>
            <th>LPC</th>
            <th>PDL 0%</th>
            <th>PDL 26%</th>
            <th>EAU</th>
            <th>FILM</th>
            <th>LAIT CRU</th>
          </tr>
        </thead>
        <tbody>
            @foreach($productions as $production)
          <tr>
            <td>{{$production->created_at->format('Y-m-d H:i')}}</td>
            <td><b>{{$production->LPC}} L</b> </td>
            <td>{{$production->PDL0}} Kg</td>
            <td>{{$production->PDL26}} Kg</td>
            <td>{{$production->eau}} L</td>
            <td>{{$production->film}} Kg</td>
            <td>{{$production->lvc}} L</td>
            <td>
              <form action="{{url('milkcheck/productions/'.$production->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                  <a href="{{url('milkcheck/productions/'.$production->id.'/edit')}}" class="btn btn-outline-success" style="margin-right: 3px;"><i data-feather="edit"></i></a>
                  <button type="submit" onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-outline-danger" ><i data-feather="trash"></i></button>
                </div>
              </form>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>
@endsection
