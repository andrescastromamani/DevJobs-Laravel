@extends('layouts.app')
@section('navegation')
    @include('ui.categoriesnav')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-center">
            <div class="flex flex-col lg:flex-row shadow bg-white rounded-lg">
                <div class="lg:w-1/2 px-5 lg:px-8 py-12 lg:py-24">
                    <p class="text-2xl text-gray-500">
                        Dev<span class="font-bold">Jobs</span>
                    </p>
                    <h1 class="text-3xl font-bold text-gray-700">
                        Encuentra un trabajo remoto o en tu pais
                        <span class="block text-green-500">Para Desarrolladores y Diseñadores</span>
                    </h1>
                </div>
                <div class="block lg:w-1/2">
                    <img class="inset-0 h-full w-full object-cover object-center" src="{{asset('img/home.jpg')}}"
                         alt="">
                </div>
            </div>
            <div class="mt-10 p-10 shadow bg-white rounded-lg">
                <h1 class="text-black-50 text-center font-bold">Nuevas Vacantes</h1>
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
