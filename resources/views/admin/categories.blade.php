@extends('layouts.dashboard-admin')

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categorie</li>
        </ol>
    </nav>
    @include('flash-message')
    <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">La table des categories</h6>
                <p class="text-muted mb-3">Vous trouvez ici  toutes les categories.</p>
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Designation</th>
                        <th>Parent catégorie</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($categories))
                        <?php $_SESSION['i'] = 0; ?>
                            @foreach($categories as $category)
                                <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                <tr id="{{$category->id}}">
                                    <?php $dash=''; ?>
                                    <td>{{$_SESSION['i']}}</td>
                                    <td>{{$category->designation}}</td>
                                    <td>
                                        @if(isset($category->parent_id))
                                            {{$category->childCategories->designation}}
                                        @else
                                        <i class="mdi mdi-minus "></i>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{url('admin/categories/'.$category->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        <div class="d-flex">
                                            <a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp " style="margin-right: 3px;"><i class="mdi mdi-border-color"></i></a>
                                            <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"style="margin-right: 3px;"><i class="mdi mdi-delete "></i></button>
                                        </div>
                                        </form>
                                    </td>
                                </tr>
                                @if(count($category->childCategories))
                                    @include('sub-category-list',['subcategories' => $category->childCategories])
                                @endif

                            @endforeach
                        <?php unset($_SESSION['i']); ?>
                         @endif
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>

@endsection
