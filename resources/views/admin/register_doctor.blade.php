<button type="button" class="botaoGeral mx-2" data-bs-toggle="modal" data-bs-target="#register_medico">
    + médico
</button>
<!-- Modal -->
<div class="modal fade" id="register_medico" tabindex="-1" aria-labelledby="register_medicoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="register_medicoLabel"> Registrar novo médico </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register.doctor') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-between align-items-top my-2 mb-4">
                        <div>
                            <label for="name" class="form-label"> Nome do médico </label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" size="25">
                        </div>
                        <div class="px-2">
                            <label for="especialidade"> Especialidade </label>
                            <br>
                            <select name="especialidade_id" id="especialidade" title="especialidade" class="botaoGeral p-1 px-2 m-2">
                                @forelse ($especialidades as $key => $especialidade)
                                    <option value="{{ $key + 1 }}">{{ $especialidade->name }}</option>
                                @empty
                                    <option value="0" disabled>Nenhum especialisata cadastrado</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="my-1 mb-4">
                        <label for="image" class="form-label" title="imagem opcional"> Foto do médico :
                        </label>
                        <br>
                        <input type="file" class="form-control-file" id="image" aria-describedby="emailHelp" name="image">
                    </div>
                    <button type="submit" class="botaoGeral px-2 p-1 my-3"> Registrar </button>
                </form>
            </div>
        </div>
    </div>
</div>
