<!DOCTYPE html>
<html data-theme="autumn">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Modificar mis datos</title>
    </head>
    <body>
        @include('alumno.layouts.navbar')
        <div class="card bg-base-100 shadow-xl max-w-xl mx-auto mt-12">
            <form action="/alumno/modificardatos" method="POST">
                @csrf
                <div class="mx-5 my-5">
                    <a class="btn btn-light">Modificar mi e-mail</a>
                    <a class="btn btn-light">Modificar mi celular</a>
                </div>
            </form>
        </div>
    </body>
<html>    

