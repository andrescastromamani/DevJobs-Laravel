<a href="{{route('vacancies.index')}}"
   class="text-white text-sm font-bold p-3 {{Request::is('vacantes')  ? 'bg-green-500' : ''}}">Ver Vacantes</a>
<a href="{{route('vacancies.create')}}"
   class="text-white text-sm font-bold p-3 {{Request::is('vacantes/crear' )? 'bg-green-500': ''}}">Crear Vacante</a>
