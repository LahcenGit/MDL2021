@extends('layouts.dashboard-commercial')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Professionnels</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">

    <h6 class="card-title">La table des professionnels</h6>

    <p class="text-muted mb-3">Vous trouvez ici  tous les professionnels.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom complet</th>
            <th>Téléphone</th>
            <th>Wilaya</th>
            <th>Type</th>
           <th>Action</th>
          </tr>
        </thead>
          <tbody>
            @foreach($professionals as $professional)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$professional->user->name}}</td>
            <td>{{$professional->phone}}</td>
            <td>{{$professional->wilaya}}</td>
            <td>{{$professional->type}}</td>
            <td>
              <form action="" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="d-flex">
                    <a href="{{ asset('commercial/professionals/edit/'.$professional->id) }}" class=" btn-xs sharp mr-1 "><i data-feather="edit"></i></a>
                    <a href="{{$professional->gps}}" target="_blank" style="margin-right: 3px;"><i data-feather="map-pin"></i></a>
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
