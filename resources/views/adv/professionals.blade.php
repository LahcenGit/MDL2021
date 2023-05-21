@extends('layouts.dashboard-adv')

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
            <li class="breadcrumb-item active" aria-current="page">Clients</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">La table des clients</h6>
    <p class="text-muted mb-3">Vous trouvez ici  tous les clients.</p>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Wilaya</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($professionals as $professional)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$professional->name}}</td>
                    <td>{{$professional->professional->phone}}</td>
                    <td>{{$professional->professional->wilaya}}</td>
                    <td>
                    <form action="{{url('adv/professionals/'.$professional->professional->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="d-flex">
                            <a href="{{ asset('adv/professionals/'.$professional->professional->id.'/edit') }}" class="btn btn-outline-warning" style="margin-right: 3px;"><i data-feather="edit"></i></a>
                            @if($professional->professional->latitude)
                            <a href="{{asset('redirect-position/'.$professional->professional->latitude.'/'.$professional->professional->longitude)}}"class="btn btn-outline-success"style="margin-right: 3px;" target="_blank" style="margin-right: 3px;"><i data-feather="map-pin"></i></a>
                            @endif
                            <button  onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-outline-danger"style="margin-right: 3px;"><i data-feather="trash"></i></button>

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
