<header>
    @extends('layouts.app')
    @extends('layouts.navigation')

    @section('navbar')
        <div class="dropdown mx-2">
            <button class="botaoGeral dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <div>{{ Auth::user()->name }}</div>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <div class="dropdown-item text-center">{{ Auth::user()->name }}</div>
                </li>
                <li>
                    <div class="dropdown-item text-center">{{ Auth::user()->email }}</div>
                </li>
                <li class="d-flex justify-content-center align-items-center mt-2">

                    <!-- Authentication -->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item botaoGeral" type="submit">Sair</button>
                    </form>

                </li>
            </ul>
        </div>
    @endsection

    @section('criar_consult')
        <button type="button" class="botaoGeral" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Consulta
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-success" id="exampleModalLabel"> Criar nova consulta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('create.consult') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label"> Nome do especialista </label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    name="name">
                            </div>
                            <div class="d-flex justify-content-around align-items-center my-3">
                                <div class="mx-2">
                                    <label for="especialidade"> Especialidade</label>
                                    <select name="especialidade" id="especialidade" title="especialidade"
                                        class="btn btn-success">
                                        <option value="Dermatologista">Dermatologista</option>
                                        <option value="Genética Geral">Genética Geral</option>
                                        <option value="Clinica Geral">Clinica Geral</option>
                                        <option value="Psiquiatria">Psiquiatria</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center my-3 mx-2">
                                <div>
                                    <label for="date" class="form-label"> Data </label>
                                    <input type="date" class="form-control" id="date" aria-describedby="emailHelp"
                                        name="date">
                                </div>
                                <div>
                                    <label for="time" class="form-label"> Hora </label>
                                    <input type="time" class="form-control" id="time" aria-describedby="emailHelp"
                                        name="hour">
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="image" class="form-label" title="imagem opcional"> Imagem da consulta :
                                </label>
                                <input type="file" class="form-control-file" id="image" aria-describedby="emailHelp"
                                    name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Criar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</header>

@section('search')
    <div class="divSearch">
        <img src="storage/boa_consulta_medica.jpg" alt="">
        <h3> Pesquisar Consultas </h3>
        <form class="mt-4 d-flex justify-content-around" role="search" action="{{ route('dashboard') }}" method="GET">
            <input class="form-control me-2" type="search" aria-label="Search" name="search"
                size="40" placeholder="search" value="{{ request()->get('search') }}">
            <button class="botaoGeral" type="submit">Search</button>
        </form>
    </div>
@endsection
{{-- sessão para mostrar na home (mostrar apenas 6 e depois uma mensagem de "ver mais") --}}
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center m-2 mx-3 px-5 rounded"
        style="overflow-x: scroll; background-color: #55D6C2;">
        @forelse ($consults as $key => $consult)
            @if ($consult->image != null)
                <div class=" imgs styleImgs flex-column justify-content-between align-items-center col-4"
                    style="background-image: url(storage/{{ $consult->image }});">
                    <div class="caixaTextoContent w-100">
                        <h4 class="text-center"> Especialidade <br> {{ $consult->especialidade }}</h4>
                    </div>
                    <div class="caixaTextoContent align-items-end py-3 w-100">>
                        <button class="botaoGeral btn btn-success mx-2">visualizar</button>
                    </div>
                </div>
            @elseif ($consult->image == null)
                <div class="imgs styleImgs col-5"
                    style="background-image: url(storage/quadroMedico.png); box-shadow: 0 0 1rem #233D4D inset,
                0 0 2rem #009dff inset;">
                    <div class="d-flex justify-content-between flex-column py-1" style="opacity: 1">
                        <h4 class="my-2 text-center"> Médico : <br> {{ $consult->name }} </h4>
                        <h5> Especialidade : <em>{{ $consult->especialidade }}</em>
                        </h5>
                        <h5> Data : {{ $consult->date }} </h5>
                        <h5> Hora : {{ $consult->hour }} </h5>
                        {{-- no home, só deve aparecer botão de visualizar --}}
                        <div class="caixaTextoContent align-items-center my-1 w-100 ">
                            <button class="botaoGeral btn btn-success mx-2">visualizar</button>
                        </div>
                    </div>
                </div>
            @endif

        @empty
            <div class="alert alert-danger my-5">
                Nenhuma consulta cadastrada!
            </div>
        @endforelse
    </div>
@endsection

@section('table')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <table>
            <h3 class="titTable">Consultas cadastradas</h3>
            <thead>
                <tr>
                    <th class="col-2">Nome do Médico</th>
                    <th>Especialização</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th> imagem </th>
                    <th> Ações </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($consults as $key => $consult)
                    <tr>
                        <td class="text-center px-2 p-1 col-2"> <strong>{{ $consult->name }}</strong> </td>
                        <td class="text-center px-2 p-1 col-2"> {{ $consult->especialidade }} </td>
                        <td class="text-center px-2 p-1 col-1"> {{ date('d/m/Y', strtotime($consult->date)) }} </td>
                        <td class="text-center px-2 p-1 col-1"> {{ date('H:i:s', strtotime($consult->hour)) }} </td>

                        @if ($consult->image != null)
                            <td class="text-center px-2 p-1 col-3"> <img src="storage/{{ $consult->image }}"
                                    alt="" class="w-75 h-75 styleImgs"> </td>
                        @else
                            <td class="text-center px-2 p-1 col-3">
                                <img src="storage/boa_consulta_medica.jpg" alt="" class="w-75 h-75 styleImgs">
                            </td>
                        @endif
                        <td class="px-2 p-1 col-1">
                            <div class="d-flex flex-column align-items-center">
                                <button class="botaoGeral my-1" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editar_consult">
                                    Editar
                                </button>
                                <button class="botaoGeral my-1" type="submit">deletar</button>
                            </div>
                        </td>
                    </tr>

                    {{-- Execultar na ultima linha da tabela
                         <tr>
                            <td>
                                <div class="bg-succecc"> <button class="btn danger">Criar mais tabelas</button> </div>
                            </td>
                         </tr>
                        --}}
                @empty
                    <script>
                        var table = document.querySelector("table");
                        table.style.display = "none";
                    </script>

                    <div class="alert alert-danger my-5">
                        Nenhuma consulta encontrada ou cadastrada!
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="my-5">
        {{ $consults->appends(['search' => request()->get('search')])->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
