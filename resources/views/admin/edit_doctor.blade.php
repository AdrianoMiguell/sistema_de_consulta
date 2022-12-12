@extends('layouts.guest')

@section('edit')
<span class="title position-absolute top-0 start-0 p-1 pe-4 fs-1 bg-white bg-opacity-75" style="border-bottom-right-radius: 80px;">
    <a href="{{ Route('home') }}" >Consultas</a>
</span>
<div class="position-absolute d-flex justify-content-center align-items-center col-12 h-100 bg-gray bg-opacity-75">
    <div class="bg-white position-absolute rounded p-4 bg-opacity-75">
        <h1 class="modal-title fs-3 text-center"> Editar médico </h1>
           <!-- Validation Errors -->
    <x-auth-validation-errors class="alert alert-danger my-1" :errors="$errors" />
        <form method="POST" action="{{ route('edit.doctor', ['id' => $doctors->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <label for="name" class="form-label"> Nome do médico </label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                    name="name" value="{{ $doctors->name}}" size="40">
            </div>
            <div class="d-flex justify-content-around align-items-center my-3">
                <div class="mx-2">
                    <select name="especialidade_id" id="especialidade" title="especialidade"
                        class="btn btn-success">
                        <option selected value="{{ $doctors->especialidade->id }} ">
                            {{ $doctors->especialidade->name }}
                        </option>
                        @foreach ($especialidades as $especialidade)
                            <option value="{{ $especialidade->id }} ">
                                {{ $especialidade->name }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="my-3">
                    <label for="image" class="form-label" title="imagem opcional"> Foto do médico :
                    </label>
                    <img class="styleImgPerfil m-3" src="{{ asset('storage/images/'. $doctors->image) }}" alt="" style="width: 90px; height: 90px;">
                    <br>
                    <label for="image" class="form-label" title="imagem opcional"> Nova Foto :
                    </label>
                    <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="d-flex justify-content-between mt-1">
                <button type="submit" class="botaoGeral px-3"> Editar </button>
                <a href="{{ route('dashboardDoctor') }} " class="botaoGeral px-4 p-1" title="Voltar a pagina de Administração"> Voltar </a>
            </div>
        </form>
    </div>
</div>
@endsection

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/navigation.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/gerals.css">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <img src="sistemImages\marcar-consulta-medica.jpg" alt="" class="col-12 h-100 position-absolute">
    <div class="position-absolute bg-transparent d-flex justify-content-center align-items-center col-12 h-100">
        <div class="bg-white position-absolute col-6 rounded p-5 bg-opacity-75">
            <h1 class="modal-title fs-5 text-success text-center fs-1"> Editar médico </h1>
            <form method="POST" action="{{ route('edit.doctor', ['id' => $doctors->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label"> Nome do médico </label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        name="name" value="{{ $doctors->name}}">
                </div>
                <div class="d-flex justify-content-around align-items-center my-3">
                    <div class="mx-2">
                        <select name="especialidade_id" id="especialidade" title="especialidade"
                            class="btn btn-success">
                            <option selected value="{{ $doctors->especialidade->id }} ">
                                {{ $doctors->especialidade->name }}
                            </option>
                            @foreach ($especialidades as $especialidade)
                                <option value="{{ $especialidade->id }} ">
                                    {{ $especialidade->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="my-3">
                    <label for="image" class="form-label" title="imagem opcional"> Foto do médico :
                    </label>
                    <input type="file" class="form-control-file" id="image" name="image"
                        value="{{ $doctors->image }}">
                </div>
                <button type="submit" class="btn btn-primary"> Registrar </button>
                <a href="{{ route('dashboardDoctor') }} " class="btn btn-primary"> Voltar </a>
            </form>
        </div>
    </div>
</body>

</html> --}}
