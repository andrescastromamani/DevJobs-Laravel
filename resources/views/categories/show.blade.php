@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-center">
            <div class="mt-10 p-10 shadow bg-white rounded-lg">
                <h1 class="text-black-50 text-center font-bold">Categoria: {{$category->name}}</h1>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($vacancies as $vacancy)
                        <li class="flex items-center mt-5 border rounded-lg shadow p-3">
                            <div class="w-1/5">
                                <img class="w-20"
                                     src="/storage/vacancies/{{$vacancy->image}}" alt="">
                            </div>
                            <div class="w-4/5">
                                <h3 class="text-xl font-bold">{{$vacancy->title}}</h3>
                                <p class="text-gray-500">{!! $vacancy->category->name !!}</p>
                                <p class="text-gray-500">Ubicacion: {!! $vacancy->location->title !!}</p>
                                <p class="text-gray-500">Experiencia: {!! $vacancy->experience->title !!}</p>
                                <p class="text-gray-500">Salario: {!! $vacancy->salary->title !!}</p>
                                <a href="{{route('vacancies.show', $vacancy->id)}}"
                                   class="text-green-500 font-bold">Ver Vacante</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
