@extends('layouts.dashboard-commercial')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Les visites</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">

    <h6 class="card-title">Les visites</h6>

    <p class="text-muted mb-3">Vous trouvez ici  toutes les visites.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Client</th>
            <th>Etat</th>
            <th>Remarque</th>
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
            @foreach($visits as $visit)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$visit->professional->user->name}}</td>
            <td>@if($visit->etat == 0)Accépté @else Refus @endif</td>
            <td>{{$visit->note}}</td>

            <td>
              <form action="" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="{{ asset('commercial/visits/'.$visit->id.'/edit') }}" class=" btn-xs sharp mr-1 "><i data-feather="edit"></i></a>
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
