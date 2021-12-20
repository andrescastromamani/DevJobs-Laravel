<h2 class="mt-5 text-xl">Buscar Vacante</h2>
<form action="{{route('search.search')}}" method="post">
    @csrf
    <div class="flex flex-wrap mt-5">
        <label for="category" class="block text-gray-700 text-sm mb-2">Categoria</label>
        <select id="category" name="category"
                class="p-2 bg-gray-300 rounded form-input w-full @error('category') is-invalid @enderror">
            <option disabled selected>-Seleccione-</option>
            @foreach($categories as $category)
                <option
                    {{old('category')==$category->id ? 'selected':''}}
                    value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
        <span
            class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1  mt-2 w-full text-sm rounded"
            role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>
    <div class="flex flex-wrap mt-5">
        <label for="location" class="block text-gray-700 text-sm mb-2">Ubicacion</label>
        <select id="location" name="location"
                class="p-2 bg-gray-300 rounded form-input w-full @error('location') is-invalid @enderror">
            <option disabled selected>-Seleccione-</option>
            @foreach($locations as $location)
                <option
                    {{old('location')==$location->id ? 'selected':''}}
                    value="{{$location->id}}">{{$location->title}}</option>
            @endforeach
        </select>
        @error('location')
        <span
            class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1  mt-2 w-full text-sm rounded"
            role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>
    <div class="flex flex-wrap mb-5 mt-5">
        <button type="submit"
                class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline rounded">
            Buscar Vacantes
        </button>
    </div>
</form>
