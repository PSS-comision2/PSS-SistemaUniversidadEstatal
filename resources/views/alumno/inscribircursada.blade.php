<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscribir a cursada</title>
</head>

<body>
    @include('alumno.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/alumno/inscribircursada" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Seleccione la materia a la que desea inscribirse</h2>
                <select class="select select-bordered w-full" name="materia" id="materia" tabindex="3">
                    @foreach ($materias_puede_anotarse as $materia_puede_anotarse)
                    <option value="{{$materia_puede_anotarse->id}}">{{$materia_puede_anotarse->nombre}}</option>
                    @endforeach
                </select>
                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/alumno" class="btn btn-secondary " tabindex="7">Cancelar</a>
                    @if (count($materias_inscripto) == 4)
                        <div class="alert alert-warning text-white">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                <span class="mt-5">Se alcanzo el maximo de materias a las que se puede inscribir</span>
                            </div>
                        </div>
                    @else
                        <button type="submit" class="btn btn-success" tabindex="8">Inscribirme</button>
                    @endif
                </div>
            </div>
        </form>
    </div>

</body>

</html>
