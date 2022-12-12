<style>
    /* .dropdown:hover .dropdown-menu {
    display: block;
    position: absolute;
}
.dropdown {
    display: inline-block;
    list-style: none;
} */
</style>

<nav class="nav navbar navbar-expand-lg divNavbar">
    <span class="title">
        <a href="/">Consultas</a>
    </span>
    @if (isset($especialidades))
    <div class="d-flex justify-content-around align-items-center w-100 mx-5 bg-success bg-opacity-25 rounded h-100 py-2">
    @else
    <div class="d-flex justify-content-end align-items-center w-100 mx-5 rounded h-100 py-2">
    @endif

        @yield('creates')

        @if (isset($especialidades))
            <div class="dropdown mx-2">
                <button class="botaoGeral dropdown-toggle p-1 px-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorias
                </button>
                <ul class="dropdown-menu">
                    @foreach ($especialidades as $especialidade)
                        <li> <a class="dropdown-item"
                                href="{{ route('dashboardDoctor', ['search' => $especialidade->id]) }}">
                                {{ $especialidade->name }} </a> </li>
                    @endforeach
                </ul>
            </div>
        @else

        @endif

        {{-- forms de pesquisa --}}

        @include('components.userLogin')
    </div>
    </div>
    </div>
</nav>
