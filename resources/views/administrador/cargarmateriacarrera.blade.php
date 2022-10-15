<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cargar materia a carrera</title>
</head>

<body>
    @include('administrador.layouts.navbar')

    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administrador/cargarmateriacarrera" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Cargar una materia a una carrera</h2>

                <div class="my-3">
                    <label class="label"><span class="label-text">Carrera</span></label>
                    <select class="select select-bordered w-full" name="carrera" id="carrera" tabindex="2">
                        @foreach ($carreras as $carrera)
                            <option value={{ $carrera->id }}> {{ $carrera->nombre }} -
                                {{ $carrera->departamento }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label class="label"><span class="label-text">Materia</span></label>
                    <select class="select select-bordered w-full" name="materia" id="materia" tabindex="1">
                        @foreach ($materias as $materia)
                            <option value={{ $materia->id }}> {{ $materia->nombre }} - {{ $materia->id }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administrador" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
                </div>
            </div>
        </form>
</body>

</html>
