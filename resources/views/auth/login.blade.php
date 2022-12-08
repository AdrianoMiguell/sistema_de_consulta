<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h2 class="my-2 mb-3 text-center">
            Login
        </h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input size="45" id="email" class="block form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input size="45" id="password" class="block form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input size="45" id="remember_me" type="checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-4 bg-white bg-opacity-50 rounded">
                <div class="mx-4">
                    <a href="/" class="my-1 text-shadow text-dark">Voltar ao inicio </a>
                </div>
                <div class="d-flex flex-column">
                    @if (Route::has('password.request'))
                        <a class="my-1 text-shadow text-dark" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <a href="register" class="my-1 text-shadow text-dark">
                        Cadastrar-se
                    </a>
                </div>

                <button class="botaoGeral mx-4 p-1 px-3">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
