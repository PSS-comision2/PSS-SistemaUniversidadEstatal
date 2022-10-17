<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cursados</title>
</head>

<body>
    @include('profesor.layouts.navbar')
    <div class="card bg-base-100 shadow-2xl max-w-5xl mx-auto mt-12">
        <h2 class="card-title mx-auto">Cursado de {{ $materia->nombre }} </h2>
        <div class="overflow-x-auto">
            <form action="/profesor/cargarnotascursado/{{ $materia->id }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table w-full mx-15">
                    <thead class="text-center">
                        <tr>
                            <th>LU</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($alumnos_cursan as $alumno_cursa)
                            <tr>
                                <th><input id="lus" name="LUs[]" type="text" class="text-center bg-base-100" readonly value="{{$alumno_cursa->alumno->LU}}"></th>
                                </th>
                                <th>{{ $alumno_cursa->alumno->apellido }}</th>
                                <th>{{ $alumno_cursa->alumno->nombre }}</th>
                                <th><input id="nota" name="notas[]" type="number" class="input input-bordered text-center" min="0" tabindex="{{ $loop->index+1}}" value="{{$alumno_cursa->nota}}"></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="grid grid-cols-2 gap-4 content-center my-5 mx-5">
                    <a href="/profesor/cursados" class="btn btn-secondary" tabindex="{{count($alumnos_cursan)+1}}">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="{{count($alumnos_cursan)+2}}">Guardar</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>
