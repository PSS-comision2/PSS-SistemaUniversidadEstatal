<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Cargar Profesor</title>
</head>

<body>
    @include('administrador.layouts.navbar')

    <form action="/administrador" method="POST">
        @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="input w-full max-w-xs" tabindex="1" required value="{{old('nombre')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2" required value="{{old('apellido')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">DNI</label>
                <input id="dni" name="dni" type="text" class="form-control" tabindex="3" required value="{{old('dni')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Legajo</label>
                <input id="legajo" name="legajo" type="text" class="form-control" tabindex="4" required value="{{old('legajo')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input id="email" name="email" type="text" class="form-control" tabindex="5" required value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Celular</label>
                <input id="celular" name="celular" type="text" class="form-control" tabindex="6" required value="{{old('celular')}}">
            </div>

            <a href="/administrador" class="btn btn-danger" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-success" tabindex="6">Guardar</button>

        </form>
</body>

</html>
