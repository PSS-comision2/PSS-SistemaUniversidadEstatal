<!DOCTYPE html>
<html data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Cargar Carrera</title>
</head>

<body>
    @include('administrador.layouts.navbar')

    <form action="/administrador" method="POST">
        @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" required value="{{old('nombre')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Numero de plan</label>
                <input id="plan" name="plan" type="text" class="form-control" tabindex="2" required value="{{old('plan')}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Departamento</label>
                <input id="depto" name="depto" type="text" class="form-control" tabindex="3" required value="{{old('depto')}}">
            </div>

            <a href="/administrador" class="btn btn-danger" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-success" tabindex="6">Guardar</button>

        </form>
</body>

</html>
