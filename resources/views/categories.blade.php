<ul style="line-height: 1.69230769;">
    @if(count($categories) > 0)
    @foreach ($categories as $categorie)
        
            <input type="checkbox" name="categorie" value="{{$categorie->id}}" class="form-check-input" id="checkDefault">
            {{ $categorie->designation }}
       
        
        <ul style="margin-left: 1rem;">
            @if(count($categorie->childCategories))
                @foreach ($categorie->childCategories as $subCategories)
                    @include('sub_categories', ['sub_categories' => $subCategories])
                @endforeach
            @endif
        </ul>
    @endforeach
    @endif
   
  
<ul>