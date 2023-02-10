@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bread"><a href="{{asset('/')}}">Accueil</a> &rsaquo; dashboard</div>
                        <div class="bigtitle" style="color:#1847AD">Tableau de board</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <ul class="small-menu"><!--small-nav -->
            <li><a href="{{ asset('/app-professional') }}"  class="myshop">Mes commandes</a></li>
            <li><a href="{{ asset('app-professional/profil') }}" class="myacc">Mon profil</a></li>
            <li><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"  class="sign-out">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul><!--small-nav -->
        <div class="clearfix"></div>
        <div class="lines"></div>
    </div>

    <div id="title-bg">
        <div class="title">Mes commandes</div>

    </div>

    <div class="row" style="text-align: center;">
        <a href="{{ url('app-professional/order-professional') }}"class="btn btn-default  btn-red btn-sm " style="font-size: 15px;">Lancez une commande </a>
    </div>

    <div class="table-responsive " style="margin-top: 10px;" >
        <table class="table table-bordered chart" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ number_format($order->total,2)}} Da</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    @if($order->status == 1)
                    <td>En attente</td>
                    @elseif($order->status == 2)
                    <td>En production</td>
                    @elseif($order->status == 3)
                    <td>Validé</td>
                    @else
                    <td>Annulé</td>
                    @endif
                    <td><a href="{{ url('/app-professional/order-lines/'.$order->id) }}"><i class="fa fa-eye"></i>Voir détail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="spacer"></div>
</div>




@endsection

@push('script-app')
<script>

</script>
@endpush
