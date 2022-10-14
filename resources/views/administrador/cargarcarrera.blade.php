<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cargar Carrera</title>
</head>

<body>
    @include('administrador.layouts.navbar')
    <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
        <form action="/administrador/cargarcarrera" method="POST">
            @csrf
            <div class="mx-5 my-5">
                <h2 class="card-title mx-auto">Crear nueva carrera</h2>
                <div class="my-3">
                    <label class="label"><span class="label-text">Nombre</span></label>
                    <input id="nombre" name="nombre" type="text" class="input input-bordered w-full"
                        tabindex="1" required value="{{ old('nombre') }}" placeholder="Ingrese el nombre">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Numero de plan</span> </label>
                    <input id="plan" name="plan" type="text" class="input input-bordered w-full"
                        tabindex="2" required value="{{ old('plan') }}" placeholder="Ingrese el numero de plan">
                </div>
                <div class="my-3">
                    <label class="label"><span class="label-text">Departamento</span> </label>
                    <input id="depto" name="depto" type="text" class="input input-bordered w-full"
                        tabindex="3" required value="{{ old('depto') }}"  placeholder="Ingrese el departamento">
                </div>

                <div class="grid grid-cols-2 gap-4 content-center mt-10">
                    <a href="/administrador" class="btn btn-secondary " tabindex="4">Cancelar</a>
                    <button type="submit" class="btn btn-success" tabindex="5">Guardar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
