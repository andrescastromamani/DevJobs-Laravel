@extends('layouts.app')
@section('navegation')
    @include('ui.adminnav')
@endsection
@section('content')
    <h1 class="text-center my-5">Notificaciones</h1>
    @if (count($notifications) > 0)
        <ul class="max-w-md mx-auto">
            @foreach ($notifications as $notification)
                @php
                    $data = $notification->data;
                @endphp
                <li class="border border-gray-500 my-5 p-4 rounded">
                    <p class="mb-3">
                        Tienes un nuevo candidato en
                        <span class="font-bold">{{ $data['vacancy'] }}</span>
                    </p>
                    <p class="mb-3 color-gray-200">
                        Postulo
                        <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                    </p>
                    <a href="{{route('candidates.index', ['id'=>$data['idVacancy']])}}"
                       class="bg-green-500 px-5 rounded">
                        Ver Candidatos
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <div class="text-center" role="alert">
            No hay notificaciones
        </div>
    @endif
@endsection
