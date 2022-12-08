<header>
    @extends('layouts.app')
    @extends('layouts.navigation')

    @section('creates')
        <div class="d-flex justify-content-between px-5">
            @include('admin.create_consult')
            @include('admin.register_doctor')
        </div>
    @endsection
</header>

{{-- sessão para mostrar na home (mostrar apenas 6 e depois uma mensagem de "ver mais") --}}
@section('search')
    @include('components.search')
@endsection

@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    {{-- <div class="d-flex justify-content-between align-items-center m-2 mx-3 px-5 rounded"
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
                        {{-- no home, só deve aparecer botão de visualizar -
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
    </div> --}}
@endsection

@section('table')

     <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="w-100 d-flex justify-content-center">
        <a href="#" class="m-3 text-dark" id="consult"> Consultas </a>
        <a href="#" class="m-3 text-dark" id="doctor"> Médicos </a>
    </div>

    <div class="container" id="PageConsult">
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
                            <td class="text-center px-2 p-1 col-3"> <img src="storage/{{$consult->image}}"
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
                                <form action="{{route('delete.consult', ['id' => $consult->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="botaoGeral my-1" type="submit">deletar</button>
                                </form>
                                <form action="{{route('delete.consult', ['id' => $consult->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="botaoGeral my-1" type="submit">deletar</button>
                                </form>
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


        <div class="my-5">
            {{ $consults->appends(['search' => request()->get('search')])->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

@endsection
