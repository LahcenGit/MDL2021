@extends('layouts.milkcheck')
@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Milkcheck</a></li>
        <li class="breadcrumb-item active" aria-current="page">les tâches</li>
    </ol>
</nav>
@include('flash-message')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h6 class="card-title">Les tâches</h6>
            <p class="text-muted mb-3">Vous trouvez ici  toutes les tâches.</p>
            <div class="table-responsive">
            <table id="dataTableExample" class="table">
                <thead>
                <tr>
                    <th>Tâche</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($taches as $tache)
                    <tr>
                        <td>{{$tache->tache}}</td>
                        <td>
                        <form action="{{url('milkcheck/taches/'.$tache->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <div class="d-flex">
                            <a href="{{url('milkcheck/vendeurs/'.$tache->id.'/edit')}}" class="btn btn-secondary shadow btn-xs sharp " style="margin-right: 3px;"><i class="mdi mdi-border-color"></i></a>
                            <button type="submit" onclick="return confirm('Vous voulez vraiment supprimer?')" class="btn btn-danger shadow btn-xs sharp" ><i class="mdi mdi-delete "></i></button>
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
