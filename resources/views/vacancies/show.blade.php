@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5 text-3xl">{{ $vacancy->title }}</h1>
    <div class="mt-5 mb-5 md:flex  justify-center">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-1">Publicado: <span
                    class="font-normal">{{$vacancy->created_at}}</span></p>
            <p class="block text-gray-700 font-bold my-1">Categoria: <span
                    class="font-normal">{{$vacancy->category->name}}</span></p>
            <p class="block text-gray-700 font-bold my-1">Salario: <span
                    class="font-normal">{{$vacancy->salary->title}}</span></p>
            <p class="block text-gray-700 font-bold my-1">Ubicacion: <span
                    class="font-normal">{{$vacancy->location->title}}</span></p>
            <p class="block text-gray-700 font-bold my-1">Experiencia: <span
                    class="font-normal">{{$vacancy->experience->title}}</span></p>
            <h1 class="text-center mt-5 text-3xl">Conocimientos y Tecnologias</h1>
            @php
                $skills = explode(',', $vacancy->skills);
            @endphp
            @foreach($skills as $skill)
                <p class="inline-block  bg-gray-300 border m-2 rounded p-3  mt-5">{{$skill}}</p>
            @endforeach
            <div class="mt-5">
                {!! $vacancy->description !!}
            </div>
        </div>
        <div class="md:w-2/5">
            2
        </div>
    </div>
@endsection
