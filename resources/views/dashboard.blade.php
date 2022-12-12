
    @extends('layouts.app')
    @section('creates')
        <div class="d-flex justify-content-between px-5">
            @include('admin.create_consult')
            @include('admin.register_doctor')
        </div>
    @endsection

{{-- sessão para mostrar na home (mostrar apenas 6 e depois uma mensagem de "ver mais") --}}
@section('search')
    @include('components.search')
@endsection

@section('content')


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
    <x-auth-session-status class="alert alert-success my-2" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="alert alert-danger my-2" :errors="$errors" />

    <div class="w-100 d-flex justify-content-center">
        <a href="{{route('dashboard')}}" class="m-3 mx-5" id="consult" style="opacity: 1;"> Consultas </a>
        <a href=" {{route('dashboardDoctor')}} " class="m-3 mx-5" id="doctor"> Médicos </a>
    </div>

    <div class="container" id="PageConsult">
        <table class="table">
            <h3 class="titTable">Consultas cadastradas</h3>
            <thead>
                <tr>
                    <th class="col-2"> Titulo </th>
                    <th> Descrição </th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th> Médico </th>
                    <th> Ações </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($consults as $key => $consult)
                    <tr>
                        <td class="text-center px-2 p-1 col-2"> <strong>{{ $consult->title }}</strong> </td>
                        <td class="text-center px-2 p-1 col-2"> {{ $consult->description }} </td>
                        <td class="text-center px-2 p-1 col-1"> {{ date('d/m/Y', strtotime($consult->date)) }} </td>
                        <td class="text-center px-2 p-1 col-1"> {{ date('H:i:s', strtotime($consult->hour)) }} </td>
                        <td class="text-center px-2 p-1 col-3"> <div class="d-flex flex-column align-items-center"><span class="my-1">{{ $consult->doctor->name }} </span> <img class="styleImgPerfil my-2" src="{{ asset('storage/images/'. $consult->doctor->image) }}" alt=""></div> </td>
                        <td class="px-2 p-1 col-1">
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('viewEditConsult', ['id' => $consult->id]) }}" class="botaoGeral my-2 px-3 py-1">Editar
                                </a>
                                <form action="{{ route('consultDelete', ['id' => $consult->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="botaoGeral my-2 px-2 py-1" type="submit">Deletar</button>
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

        {{-- <script>
            $(document).ready(function() {
                $('.table').DataTable();
            });
        </script> --}}
        <div class="my-5">
            {{ $consults->appends(['search' => request()->get('search')])->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>
@endsection
