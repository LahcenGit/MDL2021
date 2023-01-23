@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bread"><a href="#">Accueil</a> &rsaquo; dashboard</div>
                        <div class="bigtitle">Tableau de board</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <ul class="small-menu"><!--small-nav -->
            <li><a href=""  class="myshop">Mes commandes</a></li>
            <li><a href="" class="myacc">Mon profil</a></li>
            <li><a href=""  class="sign-out">Déconnexion</a></li>
        </ul><!--small-nav -->
        <div class="clearfix"></div>
        <div class="lines"></div>
    </div>

    <div id="title-bg">
        <div class="title">Mes commandes</div>
        
    </div>

    <div class="row" style="text-align: center;">
        <a href="{{ url('/success-order') }}"class="btn btn-default btn-green " style="font-size: 15px;">Lancez une commande </a>
    </div>
    
    <div class="table-responsive " style="margin-top: 10px;" >
        <table class="table table-bordered chart" id="myTable">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date Added</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>166</td>
                    <td>1/24/2012</td>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>Completed</td>
                    <td>$114.00</td>
                    <td><a href=""><i class="fa fa-eye"></i>View Details</a></td>
                </tr>
                <tr>
                    <td>166</td>
                    <td>1/24/2012</td>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>Completed</td>
                    <td>$114.00</td>
                    <td><a href=""><i class="fa fa-eye"></i>View Details</a></td>
                </tr>
                <tr>
                    <td>166</td>
                    <td>1/24/2012</td>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>Completed</td>
                    <td>$114.00</td>
                    <td><a href=""><i class="fa fa-eye"></i>View Details</a></td>
                </tr>
                <tr>
                    <td>166</td>
                    <td>1/24/2012</td>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>Completed</td>
                    <td>$114.00</td>
                    <td><a href=""><i class="fa fa-eye"></i>View Details</a></td>
                </tr>
                <tr>
                    <td>166</td>
                    <td>1/24/2012</td>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>Completed</td>
                    <td>$114.00</td>
                    <td><a href=""><i class="fa fa-eye"></i>View Details</a></td>
                </tr>
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
