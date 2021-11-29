@extends('layouts.app')
@section('navegation')
    @include('ui.adminnav')
@endsection
@section('content')
    <h1 class="text-center my-5">Candidatos para {{$vacancy->title}}</h1>
    @if (count($vacancy->candidates) > 0)
        <ul class="max-w-md mx-auto">
            @foreach ($vacancy->candidates as $candidate)
                <li class="border border-gray-500 my-5 p-3 rounded">
                    <p>
                        {{$candidate->name}}
                    </p>
                    <p href="" class="text-gray-500 mb-3">{{$candidate->email}}</p>
                    <a href="/storage/cv/{{$candidate->cv}}" class="bg-green-500 px-5 rounded">CV</a>
                </li>
            @endforeach
        </ul>
    @else
        <div class=" text-center">
            <h3>No hay candidatos de momento</h3>
        </div>
    @endif
@endsection
