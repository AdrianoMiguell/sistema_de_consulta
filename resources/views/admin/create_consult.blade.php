<button type="button" class="botaoGeral mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    + Consulta
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Criar nova consulta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('create.consult') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label"> Titulo da consulta </label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                            name="title">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"> Descrição </label>
                        <textarea class="form-control" id="name" aria-describedby="emailHelp"
                            name="description" rows="3"></textarea>
                    </div>
                    <div class="d-flex flex-column my-3">
                            <label for="especialidade" class="form-label"> Doutor (Especialidade)</label>
                            <select name="doctor_id" id="especialidade" title="especialidade"
                                class="botaoGeral mx-5 p-1 px-2">
                                @forelse ($doctors as $key => $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->especialidade->name }})</option>
                                @empty
                                    <option value="0" disabled> Nenhum especialisata cadastrado</option>
                                @endforelse
                            </select>
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
                    <button type="submit" class="botaoGeral p-1 px-5"> Criar </button>
                </form>
            </div>
        </div>
    </div>
</div>
