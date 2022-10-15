<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cargar Materia</title>
</head>

<body>
    @include('administrador.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administrador/cargarmateria" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nueva materia</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">Nombre</span></label>
                    <input id="nombre" name="nombre" type="text" class="input input-bordered w-full"
                        tabindex="1" required value="{{ old('nombre') }}" placeholder="Ingrese el nombre">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Codigo</span></label>
                    <input id="codigo" name="codigo" type="number" min="1"
                        class="input input-bordered w-full" tabindex="2" required value="{{ old('codigo') }}"
                        placeholder="Ingrese el codigo">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Profesor</span></label>
                    <select class="select select-bordered w-full" name="profesor" id="profesor" tabindex="3">
                        @foreach ($profesores as $profesor)
                            <option value={{ $profesor->legajo }}> {{ $profesor->apellido }} {{ $profesor->nombre }} - LU:
                                {{ $profesor->legajo }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Plan de materia (PDF)</span></label>
                    <input id="plan" name="plan" type="file" class="" tabindex="4"
                        value="{{ old('plan') }}" accept="application/pdf" required>
                </div>

                <a href="/administrador" class="btn btn-danger" tabindex="5">Cancelar</a>
                <button type="submit" class="btn btn-success" tabindex="6">Guardar</button>
            </div>
        </form>
    </div>

</body>

</html>
