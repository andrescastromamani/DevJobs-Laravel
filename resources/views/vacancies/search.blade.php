@extends('layouts.app')
@section('navegation')
    @include('ui.categoriesnav')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-center">
            <div class="mt-10 p-10 shadow bg-white rounded-lg">
                <h1 class="text-black-50 text-center font-bold">Resultados de la Busqueda</h1>
                @if (count($vacancies) > 0)
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
                @else
                    <h1 class="text-gray-500 text-center font-bold mt-5 te">Lo sentimos no se encontraron
                        resultados</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
