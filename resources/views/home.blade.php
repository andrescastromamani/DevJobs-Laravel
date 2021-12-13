@extends('layouts.app')

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
                <h2 class="text-black-50 text-center">Nuevas Vacantes</h2>
                <ul>
                    @foreach($vacancies as $vacancy)
                        <li class="flex items-center mt-5">
                            <div class="w-1/3 mx-5">
                                <img class="w-20"
                                     src="/storage/vacancies/{{$vacancy->image}}" alt="">
                            </div>
                            <div class="w-2/3">
                                <h3 class="text-xl font-bold">{{$vacancy->title}}</h3>
                                <p class="text-gray-500">{!! $vacancy->category->name !!}</p>
                                <a href="{{route('vacancies.show', $vacancy->id)}}"
                                   class="text-green-500">Ver Vacante</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
