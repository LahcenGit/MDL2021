@extends('layouts.dashboard-admin')

@section('content')
<div class="page-content">
<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productions</li>
        </ol>
</nav>
    @include('flash-message')
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
             <h6 class="card-title">La table des productions</h6>
             <p class="text-muted mb-3">Vous trouvez ici  toutes les productions.</p>
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Produit</th>
                        <th>Qte</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($productionlines as $productionline)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td >{{ $productionline->product->soft_name }} {{ $productionline->product->capacity }}</td>
                            <td>{{ $productionline->qte }}</td>
                            <td>{{ $productionline->created_at->format('d-m-Y  H:i') }}</td>
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

