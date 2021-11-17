@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
          integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
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
            <a href="/storage/vacancies/{{$vacancy->image}}" data-lightbox="image">
                <img src="/storage/vacancies/{{$vacancy->image}}" class="w-40 mt-5">
            </a>
            <div class="mt-5">
                {!! $vacancy->description !!}
            </div>
        </div>
        <div class="md:w-2/5">
            2
        </div>
    </div>
@endsection
