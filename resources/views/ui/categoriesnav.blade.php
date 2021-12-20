@foreach($categories as $category)
    <a class="text-white py-3 pr-3" href="{{route('categories.show',$category->id)}}">{{$category->name}}</a>
@endforeach
