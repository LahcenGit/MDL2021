<?php $dash.='--'; ?>
@foreach($subcategories as $subcategory)
    <?php $_SESSION['i']=$_SESSION['i']+1; ?>
    <tr id= "{{$subcategory->id}}">
        <td>{{$_SESSION['i']}}</td>
        <td>{{$dash}}{{$subcategory->designation}}</td>
        <td>{{$subcategory->parent->designation}}</td>
        <td>
            <form action="{{url('admin/categories/'.$subcategory->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
            <div class="d-flex">
                <a href="{{url('admin/categories/'.$subcategory->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp "style="margin-right: 3px;"><i class="mdi mdi-border-color"></i></a>
                <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"style="margin-right: 3px;"><i class="mdi mdi-delete "></i></button>
            </div>
            </form>
        </td>
    </tr>
    @if(count($subcategory->childCategories))
        @include('sub-category-list',['subcategories' => $subcategory->childCategories])
    @endif
@endforeach
