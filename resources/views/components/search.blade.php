<div class="divSearch">
    <img src="storage/boa_consulta_medica.jpg" alt="">
    <h3> Pesquisar Consultas </h3>
    <form class="mt-4 d-flex justify-content-around" role="search" action="{{ route('dashboard') }}" method="GET">
        <input class="form-control me-2" type="search" aria-label="Search" name="search"
            size="40" placeholder="search" value="{{ request()->get('search') }}">
            {{-- https://vencerocancer.org.br/wp-content/uploads/2014/02/ivoc-medico-consulta-Syda_Productions-822x469.jpg --}}
        <button class="botaoGeral" type="submit">Search</button>
    </form>
</div>
