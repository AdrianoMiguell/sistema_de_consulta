@extends('layouts.app')

    @section('creates')
        <div class="d-flex justify-content-between px-5">
            @include('admin.create_consult')
            @include('admin.register_doctor')
        </div>
    @endsection

{{-- sessão para mostrar na home (mostrar apenas 6 e depois uma mensagem de "ver mais") --}}
@section('search')
    @include('components.searchDoctor')
@endsection

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

@endsection

@section('table')
    <!-- Session Status -->
    <x-auth-session-status class="alert alert-success my-2" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="alert alert-danger my-2" :errors="$errors" />

    <div class="w-100 d-flex justify-content-center">
        <a href="{{route('dashboard')}}" class="m-3 mx-5" id="consult"> Consultas </a>
        <a href="{{route('dashboardDoctor')}}" class="m-3 mx-5" id="doctor" style="opacity: 1;"> Médicos </a>
    </div>

    <div class="container" id="PageConsult">
        <table class="table">
            <h3 class="titTable">Médicos cadastradas</h3>
            <thead>
                <tr>
                    <th class="col-2">Nome do Médico</th>
                    <th>Especialidade</th>
                    <th> Imagem </th>
                    <th> Ações </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($doctors as $key => $doctor)
                    <tr>
                        <td class="text-center px-2 p-1 col-2"> <strong>{{ $doctor->name }}</strong> </td>
                        <td class="text-center px-2 p-1 col-2"> {{ $doctor->especialidade->name }} </td>
                        <td class="text-center px-2 p-1 col-3"> <img class="styleImgPerfil" src="{{ asset('storage/images/'. $doctor->image) }}" alt=""> </td>
                        {{-- Botões de editar e excluir --}}
                        <td class="px-2 p-1 col-1">
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('viewEditDoctor', ['id' => $doctor->id]) }}" class="botaoGeral my-2 px-3 py-1">Editar
                                </a>

                                <form action="{{ route('doctorDelete', ['id' => $doctor->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="botaoGeral my-2 px-2 py-1" type="submit">Deletar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
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
            {{ $doctors->links('vendor.pagination.bootstrap-4') }}
            {{-- appends(['search' => request()->get('search')]) --}}
        </div>

    </div>
@endsection
