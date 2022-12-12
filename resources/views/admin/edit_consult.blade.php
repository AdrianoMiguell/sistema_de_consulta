@extends('layouts.guest')

@section('edit')
    <span class="title position-absolute top-0 start-0 p-1 pe-4 fs-1 bg-white bg-opacity-75"
        style="border-bottom-right-radius: 80px;">
        <a href="{{ Route('home') }}">Consultas</a>
    </span>
    <div class="position-absolute d-flex justify-content-center align-items-center col-12 h-100 bg-gray bg-opacity-75">
        <div class="bg-white position-absolute rounded p-4 bg-opacity-75">
            <h1 class="modal-title fs-3 text-center"> Editar consulta </h1>
               <!-- Validation Errors -->
    <x-auth-validation-errors class="alert alert-danger my-1" :errors="$errors" />
    
            <form method="POST" action="{{ route('edit.consult', ['id' => $consults->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label"> Titulo da consulta </label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="title"
                        value="{{ $consults->title }} ">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"> Descrição </label>
                    <textarea class="form-control" id="description" aria-describedby="emailHelp" name="description" rows="2"
                        value="{{ $consults->description }} "></textarea>
                </div>
                <div class="d-flex flex-column my-3">
                    <label for="especialidade" class="form-label"> Doutor (Especialidade)</label>
                    <select name="doctor_id" id="especialidade" title="especialidade" class="botaoGeral mx-5 p-1 px-2">
                        @forelse ($doctors as $key => $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->especialidade->name }})
                            </option>
                        @empty
                            <option value="0" disabled> Nenhum especialisata cadastrado</option>
                        @endforelse
                    </select>
                </div>
                <div class="d-flex justify-content-between align-items-center my-3 mx-2">
                    <div class="mx-4">
                        <div>
                            <label for="date" class="form-label"> Data marcada : {{date('d/m/Y', strtotime($consults->date))}}</label>
                        </div>
                        <div class="d-flex"> 
                            <label for="date" class="form-label  me-2"  title="Nova data da consulta"> Data </label>
                            <input type="date" class="form-control" id="date" aria-describedby="emailHelp"
                                name="date" value="{{$consults->date }} ">
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="time" class="form-label"> Hora marcada : {{date('H:i', strtotime($consults->hour))}}</label>
                        </div>
                        <div class="d-flex">
                            <label for="time" class="form-label" title="Nova hora da consulta"> Hora </label>
                            <input type="time" class="form-control ms-2" id="time" aria-describedby="emailHelp"
                                name="hour" value="{{$consults->hour }} ">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-1">
                    <button type="submit" class="botaoGeral px-3"> Editar </button>
                    <a href="{{ route('dashboard') }} " class="botaoGeral px-4 p-1"
                        title="Voltar a pagina de Administração"> Voltar </a>
                </div>
        </div>

        </form>
    </div>
    </div>
@endsection
