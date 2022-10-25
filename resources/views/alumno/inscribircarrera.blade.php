<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscribir a carrera</title>
</head>

<body>
    @include('alumno.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/alumno/guardarcarrera" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Seleccione la carrera a la que desea inscribirse</h2>
                @if (count($carreras) == 0)
                    <span class="mt-5">No hay carreras a las que se pueda inscribir</span>
                @else
                    <select class="select select-bordered w-full mt-5" name="carrera" id="carrera" tabindex="3">
                        @foreach ($carreras as $carrera)
                            <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                        @endforeach
                    </select>
                    <div class="grid grid-cols-2 gap-4 content-center mt-10">
                        <a href="/alumno" class="btn btn-secondary " tabindex="7">Cancelar</a>
                        @if (count($carrerasinscripto) == 2)
                            <div class="alert alert-warning shadow-lg my-5 mx-auto max-w-screen-lg text-white">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                    <span class="mt-5">Se alcanzo el maximo de carreras a las que se puede inscribir</span>
                                </div>
                            </div>
                        @else
                            <button type="submit" class="btn btn-success" tabindex="8">Inscribirme</button>
                        @endif
                    </div>
                @endif


            </div>
        </form>
    </div>

</body>

</html>
