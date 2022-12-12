<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/rg-1.3.0/datatables.min.css"/>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <header>
        <div class="w-100 h-50 bg-primary text-center">
            <h1>Teste</h1>
        </div>
    </header>
    <!-- Session Status -->
    <x-auth-session-status class="alert alert-danger my-5" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="alert alert-danger my-5" :errors="$errors" />

    <div class="w-100 d-flex justify-content-center">
        <a href="{{ route('dashboard') }}" class="m-3 text-dark" id="consult"> Consultas </a>
        <a href="{{ route('dashboardDoctor') }}" class="m-3 text-dark fs-2" id="doctor"> Médicos </a>
    </div>

    <div class="container" id="PageConsult">
                  <h3 class="titTable">Consultas cadastradas</h3>

        <table class="myTable">
            <thead>
                <tr>
                    <th>Nome do Médico</th>
                    <th>Especialização</th>
                    <th> imagem </th>
                    <th> Ações </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($consults as $consult)
                        <td> $consult </td>
                    @endforeach
                </tr>
                @forelse ($consults as $key => $consult)
                    <tr>
                        <td > <strong>{{ $consult->title }}</strong> </td>
                        <td > {{ $consult->descrition }} </td>
                        <td> {{ date('d/m/Y', strtotime($consult->date)) }} </td>
                        <td> {{ date('H:i:s', strtotime($consult->hour)) }} </td>
                        <td>
                            <p>{{ $consult->doctor->name }} </p> <img class="styleImgPerfil"
                                src="storage/{{ $consult->doctor->image }}" alt="">
                        </td>
                        <td class="px-2 p-1 col-1">
                            <div class="d-flex flex-column align-items-center">
                                <button class="botaoGeral my-1" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editar_consult">
                                    Editar
                                </button>
                                <form action="{{ route('delete.consult', ['id' => $consult->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="botaoGeral my-1" type="submit">deletar</button>
                                </form>
                                <form action="{{ route('delete.consult', ['id' => $consult->id]) }}" method="POST">
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

        <table id="tabela_id">
            <thead>
                <tr>
                    <th>Coluna 1</th>
                    <th>Coluna 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Linha 1 Dados 1</td>
                    <td>Linha 1 Dados 2</td>
                </tr>
                <tr>
                    <td>Linha 2 Dados 1</td>
                    <td>Linha 2 Dados 2</td>
                </tr>
            </tbody>
        </table>
    </div>
{{--
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/rg-1.3.0/datatables.min.js"></script>
<script> --}}
    <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('.myTable').DataTable();
} );
</script>

</body>
</html>


