@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css"
          type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
@endsection
@section('navegation')
    @include('ui.adminnav')
@endsection
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xl ">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-5">
                    <h1 class="text-center mt-5">Nueva vacante</h1>
                    <div class="py-10 px-10">
                        <form method="POST" novalidate>
                            @csrf
                            <div class="flex flex-wrap">
                                <label for="title" class="block text-gray-700 text-sm mb-2">Titulo</label>
                                <input id="title" type="text"
                                       class="p-2 bg-gray-300 rounded form-input w-full @error('email') is-invalid @enderror"
                                       name="title"
                                       value="{{ old('email') }}" autocomplete="email" autofocus>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <label for="category" class="block text-gray-700 text-sm mb-2">Categoria</label>
                                <select id="category" name="category"
                                        class="p-2 bg-gray-300 rounded form-input w-full @error('category') is-invalid @enderror">
                                    <option disabled selected>-Seleccione-</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <label for="experience" class="block text-gray-700 text-sm mb-2">Experiencia</label>
                                <select id="experience" name="experience"
                                        class="p-2 bg-gray-300 rounded form-input w-full @error('experience') is-invalid @enderror">
                                    <option disabled selected>-Seleccione-</option>
                                    @foreach($experiences as $experience)
                                        <option value="{{$experience->id}}">{{$experience->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <label for="location" class="block text-gray-700 text-sm mb-2">Ubicacion</label>
                                <select id="location" name="location"
                                        class="p-2 bg-gray-300 rounded form-input w-full @error('location') is-invalid @enderror">
                                    <option disabled selected>-Seleccione-</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-wrap mt-5">
                                <label for="salary" class="block text-gray-700 text-sm mb-2">Salario</label>
                                <select id="salary" name="salary"
                                        class="p-2 bg-gray-300 rounded form-input w-full @error('salary') is-invalid @enderror">
                                    <option disabled selected>-Seleccione-</option>
                                    @foreach($salaries as $salary)
                                        <option value="{{$salary->id}}">{{$salary->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-5">
                                <label for="description" class="block text-gray-700 text-sm mb-2">Descripcion del
                                    Puesto</label>
                                <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
                                <input type="hidden" name="description" id="description">
                            </div>
                            <div class="mt-5">
                                <label for="dropzoneDevJobs" class="block text-gray-700 text-sm mb-2">Imagen
                                    Vacante</label>
                                <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
                                <input type="hidden" name="image" id="image">
                                <p id="errorImage"></p>
                            </div>
                            <div class="flex flex-wrap mb-5 mt-5">
                                <button type="submit"
                                        class="bg-green-500 w-full hover:bg-green-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline rounded">
                                    Publicar Vacante
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {
            //Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote'],
                    sticky: true,
                    static: true
                },
                placeholder: {
                    text: 'Mas informacion...'
                }
            });
            editor.subscribe('editableInput', function (eventObj, editable) {
                const content = editor.getContent();
                document.querySelector('#description').value = content;
            })

            //Dropzone
            const dropzone = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Subi aqui tu archivo',
                acceptedFiles: ".png, .jpg,.jpeg,.gif,.bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar Archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                success: function (file, response) {
                    console.log(response)
                    document.querySelector('#errorImage').textContent = ''
                    document.querySelector('#image').value = response.correct;
                    file.nameServer = response.correct;
                },
                maxfilesexceeded: function (file) {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                removedfile: function (file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    console.log('El archivo borrado fue: ', file)
                    params = {
                        image: file.nameServer
                    }
                    axios.post('/vacantes/borrarimagen', params).then(response => console.log(response))
                }
            })
        })
    </script>
@endsection
