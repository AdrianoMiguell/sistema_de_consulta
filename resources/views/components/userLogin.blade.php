<div>
    @if (Route::has('login'))
        <div>
            @auth
                <div class="dropdown mx-2">
                    <button class="botaoGeral dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <a href="{{ route('login') }}" class="botaoGeral btn btn-success">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="botaoGeral btn btn-success">Register</a>
                @endif
            @endauth
        </div>

    @endif

</div>
