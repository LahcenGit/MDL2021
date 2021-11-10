
    <input type="checkbox" class="form-check-input" name="categorie" value="{{$categorie->id}}"id="checkDefault">
    {{ $sub_categories->designation }}

@if ($sub_categories->categories)
    <ul style="margin-left: 1rem;">
        @if(count($sub_categories->categories) > 0)
            @foreach ($sub_categories->categories as $subCategories)
                @include('sub_categories', ['sub_categories' => $subCategories])
            @endforeach
        @endif
    </ul>
@endif

