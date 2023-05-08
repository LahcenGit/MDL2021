@extends('layouts.milkcheck')
@section('content')
<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Milkcheck</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Transformations lait</li>
    </ol>
</nav>
    @include('flash-message')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h6 class="card-title">Les transformations lait</h6>
        <p class="text-muted mb-3">Vous trouvez ici  toutes les transformations lait.</p>
        <div class="table-responsive">
        <table id="dataTableExample" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Designation</th>
                <th>Qte</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($fabrications as $fabrication)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$fabrication->designation}}</td>
                <td>{{$fabrication->qte}} L</td>
                <td>@if($fabrication->type == 1) Entrée @else Sortie @endif  </td>
                <td>{{$fabrication->created_at->format('Y-m-d')}}</td>

                <td>
                <form action="{{url('milkcheck/product-fabrication/'.$fabrication->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="d-flex">
                        <a href="{{url('milkcheck/product-fabrication/'.$fabrication->id.'/edit')}}" class=" btn-xs sharp " style="margin-right: 3px;"><i data-feather="edit"></i></a>
                        <button  onclick="return confirm('Vous voulez vraiment supprimer?')"class=" btn-xs sharp " style="margin-right: 3px;"><i data-feather="trash"></i></button>
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

