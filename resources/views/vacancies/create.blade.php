@extends('layouts.app')
@section('navegation')
    @include('ui.adminnav')
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-20">
                    <h1 class="text-center mt-5">Nueva vacante</h1>
                    <div class="py-10 px-10">
                        <form method="POST" novalidate>
                            @csrf
                            <div class="flex flex-wrap mt-5">
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
                            <div class="flex flex-wrap mb-5 mt-5">
                                <button type="submit"
                                        class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline rounded">Publicar Vacante
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
