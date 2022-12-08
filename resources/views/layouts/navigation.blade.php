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
        <a href="{{ Route('home') }}">Consultas</a>
    </span>
    <div class="d-flex justify-content-around w-100 mx-5  bg-success bg-opacity-50 rounded h-100 py-3">
        @yield('creates')

        <div class="dropdown mx-2">
            <button class="botaoGeral dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        {{-- forms de pesquisa --}}

        @include('components.userLogin')
    </div>
    </div>
    </div>
</nav>
