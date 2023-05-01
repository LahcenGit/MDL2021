@extends('layouts.dashboard-adv')

@section('content')
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
            <th>Email</th>
            <th>Téléphone</th>
            <th>Entreprise</th>
            <th>Adresse</th>
            <th>Wilaya</th>
            <th>RC</th>
            <th>NIF</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($professionals as $professional)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$professional->name}}</td>
                    <td>{{$professional->email}}</td>
                    @if($professional->professional->phone)
                    <td>{{$professional->professional->phone}}</td>
                    @endif
                    <td>{{$professional->professional->entreprise}}</td>
                    <td>{{$professional->professional->adresse}}</td>
                    <td>{{$professional->professional->wilaya}}</td>
                    <td>{{$professional->professional->RC}}</td>
                    <td>{{$professional->professional->NIF}}</td>
                    <td>
                    <form action="{{url('adv/professionals/'.$professional->professional->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="d-flex">
                            <a href="{{ asset('adv/professionals/'.$professional->professional->id.'/edit') }}" class=" btn-xs sharp mr-1 "><i data-feather="edit"></i></a>
                            <button style="background-color: #ffffff; border-color:#ffffff" onclick="return confirm('Vous voulez vraiment supprimer?')"><i data-feather="trash"></i></button>
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
