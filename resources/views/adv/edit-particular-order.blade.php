@extends('layouts.dashboard-adv')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier statut</li>
        </ol>
    </nav>
    <div class="row d-flex ">
        <div class="col-md-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{url('adv/particular-orders/'.$order->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                     @csrf
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="exampleFormControlSelect1" class="form-label">Statut</label>
								<select class="form-select" name="status"  class="form-control input-default " id="exampleFormControlSelect1">
                                    <option>select</option>
                                    <option value="1" @if ($order->status == 1) selected @endif > En attente</option>
                                    <option value="2" @if ($order->status == 2) selected @endif > En production</option>
                                    <option value="3" @if ($order->status == 3) selected @endif > Validé</option>
                                    <option value="4" @if ($order->status == 4) selected @endif > Annulé</option>
                                </select>

                            </div>
                         </div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
