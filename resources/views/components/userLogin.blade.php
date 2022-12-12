<div>
    @if (Route::has('login'))
        <div>
            @auth
                <div class="dropdown mx-2">
                    <button class=" dropdown-toggle botaoGeral" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div>{{ Auth::user()->name }}</div>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="dropdown-item text-center"> <a href="{{ url('/dashboard') }}"class="text-decoration-none text-success"> {{ Auth::user()->name }} </a> </div>
                        </li>
                        <li>
                            <div class="dropdown-item text-center">{{ Auth::user()->email }}</div>
                        </li>
                        <li class="d-flex justify-content-center align-items-center mt-2">

                            <!-- Authentication -->
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item botaoGeral" type="submit">Sair</button>
                            </form>

                        </li>
                    </ul>
                </div>
            @else
                <div class="d-flex justify-content-between mx-2">
                    <a href="{{ route('login') }}" class="botaoGeral mx-2 p-1 px-2">Log in</a>
                                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="botaoGeral mx-2 p-1 px-2">Register</a>
                </div>
            @endif
            @endauth
        </div>

    @endif

</div>
