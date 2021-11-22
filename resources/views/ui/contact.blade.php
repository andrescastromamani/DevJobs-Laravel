<aside class="md:w-2/5 bg-green-500 p-3 rounded m-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2 class="text-center ">Contacta al Reclutador</h2>
    <form action="{{route('candidates.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap mt-5">
            <label for="name"
                   class="block text-gray-700 text-sm mb-2">Nombre</label>
            <input id="name" type="text"
                   class="p-2 bg-gray-300 rounded form-input w-full @error('name') is-invalid @enderror"
                   name="name"
                   value="{{ old('name') }}" autocomplete="name" autofocus>
            @error('name')
            <span
                class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1  mt-2 w-full text-sm rounded"
                role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="flex flex-wrap mt-5">
            <label for="email"
                   class="block text-gray-700 text-sm mb-2">Correo Electronico</label>
            <input id="email" type="email"
                   class="p-2 bg-gray-300 rounded form-input w-full @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
            <span
                class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1  mt-2 w-full text-sm rounded"
                role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="flex flex-wrap mt-5">
            <label for="cv"
                   class="block text-gray-700 text-sm mb-2">Curriculum (PDF)</label>
            <input id="cv" type="file"
                   class="p-2 bg-gray-300 rounded form-input w-full @error('cv') is-invalid @enderror"
                   name="cv">
            @error('cv')
            <span
                class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1  mt-2 w-full text-sm rounded"
                role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <input type="hidden" name="vacancy_id" value="{{$vacancy->id}}">
        <div class="flex flex-wrap mt-8 mb-5">
            <button type="submit"
                    class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline rounded">
                Contactar
            </button>
        </div>
    </form>
</aside>
