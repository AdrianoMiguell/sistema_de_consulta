<x-guest-layout>
    <x-auth-card>
                <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h2 class="my-2 mb-3 text-center">
            Cadastro
        </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
            <div>
                <x-label class="form-label" for="name" :value="__('Name')" class="form-label" />

                <x-input size="45" id="name" class="block form-control " type="text" name="name" :value="old('name')" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-1">
                <x-label class="form-label" for="email" :value="__('Email')" />

                <x-input size="45" id="email" class="block form-control " type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-1">
                <x-label class="form-label" for="password" :value="__('Password')" />

                <x-input size="45" id="password" class="block form-control "
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-1">
                <x-label class="form-label" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input size="45" id="password_confirmation" class="block form-control"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="d-flex align-items-center justify-content-between mt-4 bg-white bg-opacity-50 rounded">
                <div class="mx-4">
                    <a href="/" class="my-1 text-shadow text-dark">Voltar ao inicio </a>
                </div>
                <div class="d-flex flex-column me-3">
                    <a class="my-1 text-shadow text-dark" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>


                    <a href="login" class="my-1 text-shadow text-dark">
                        Logar-se
                    </a>
                </div>
                <button class="m-4 botaoGeral p-1 px-3">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        </x-auth-card>
</x-guest-layout>
