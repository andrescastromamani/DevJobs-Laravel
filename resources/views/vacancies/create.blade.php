@extends('layouts.app')
@section('navegation')
    @include('ui.adminnav')
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xl ">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-10">
                    <h1 class="text-center mt-5">Nueva vacante</h1>
                    <div class="py-10 px-10">
                        <form method="POST" novalidate>
                            @csrf
                            <div class="flex flex-wrap">
                                <label for="title" class="block text-gray-700 text-sm mb-2">Titulo</label>
                                <input id="title" type="text"
                                       class="p-2 bg-gray-300 rounded form-input w-full @error('email') is-invalid @enderror"
                                       name="title"
                                       value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('title')
                                <span
                                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1 mt-2 w-full text-sm rounded"
                                    role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <label for="category" class="block text-gray-700 text-sm mb-2">Categoria</label>
                                <select id="category" name="category"
                                        class="p-2 bg-gray-300 rounded form-input w-full @error('category') is-invalid @enderror">
                                    <option disabled selected>-Seleccione-</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span
                                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1 mt-2 w-full text-sm rounded"
                                    role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <label for="experience" class="block text-gray-700 text-sm mb-2">Experiencia</label>
                                <select id="experience" name="experience"
                                        class="p-2 bg-gray-300 rounded form-input w-full @error('experience') is-invalid @enderror">
                                    <option disabled selected>-Seleccione-</option>
                                    @foreach($experiences as $experience)
                                        <option value="{{$experience->id}}">{{$experience->title}}</option>
                                    @endforeach
                                </select>
                                @error('experience')
                                <span
                                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1 mt-2 w-full text-sm rounded"
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
                                        <option value="{{$location->id}}">{{$location->title}}</option>
                                    @endforeach
                                </select>
                                @error('location')
                                <span
                                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1 mt-2 w-full text-sm rounded"
                                    role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <label for="salary" class="block text-gray-700 text-sm mb-2">Salario</label>
                                <select id="salary" name="salary"
                                        class="p-2 bg-gray-300 rounded form-input w-full @error('salary') is-invalid @enderror">
                                    <option disabled selected>-Seleccione-</option>
                                    @foreach($salaries as $salary)
                                        <option value="{{$salary->id}}">{{$salary->title}}</option>
                                    @endforeach
                                </select>
                                @error('salary')
                                <span
                                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-1 mt-2 w-full text-sm rounded"
                                    role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-wrap mb-5 mt-5">
                                <button type="submit"
                                        class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline rounded">
                                    Publicar Vacante
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
