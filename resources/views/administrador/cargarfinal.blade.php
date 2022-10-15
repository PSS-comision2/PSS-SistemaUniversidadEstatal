<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cargar Profesor</title>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @include('administrador.layouts.navbar')

    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administrador/cargarexamenfinal" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nuevo examen final</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">Materia</span></label>
                    <select class="select select-bordered w-full" name="materia" id="materia" tabindex="1">
                        @foreach ($materias as $materia)
                            <option value={{ $materia->id }}> {{ $materia->nombre }} - {{ $materia->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Profesor</span></label>
                    <select class="select select-bordered w-full" name="profesor" id="profesor" tabindex="2">
                        @foreach ($profesores as $profesor)
                            <option value={{ $profesor->id }}> {{ $profesor->apellido }} {{ $profesor->nombre }} -
                                LU:
                                {{ $profesor->legajo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Ubicación</span> </label>
                    <input id="ubicacion" name="ubicacion" type="text" class="input input-bordered w-full"
                        tabindex="3" required value="{{ old('ubicacion') }}" placeholder="Ingrese la ubicación">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Fecha</span> </label>
                    <input id="fecha" name="fecha" type="date" class="input input-bordered w-full"
                        tabindex="4" required value="{{ old('fecha') }}" placeholder="Ingrese la fecha">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Hora</span> </label>
                    <input id="hora" name="hora" type="time" class="input input-bordered w-full"
                        tabindex="5" required value="{{ old('hora') }}" placeholder="Ingrese la hora">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Observaciones</span> </label>
                    <textarea id="observaciones" name="observaciones" class="textarea textarea-bordered w-full" value="{{ old('observaciones') }}" tabindex="6"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administrador" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
                </div>
            </div>
        </form>
</body>

</html>
