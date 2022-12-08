<button type="button" class="botaoGeral mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
