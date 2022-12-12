<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

          {{-- arquivos css --}}
    <link rel="stylesheet" href="/css/navigation.css">
    <link rel="stylesheet" href="/css/gerals.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="/css/gerals.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        @if (isset($doctors))
            <img src="sistemImages/boa_consulta_medica2.jpg" alt="" class="position-absolute col-12 h-100"  style="filter: brightness(50%);">
        @else
               <img src="sistemImages/result-consult.jpg" alt="" class="position-absolute col-12 h-100">
        @endif
        {{-- <img src="sistemImages/marcar-consult.webp" alt="" class="position-absolute col-12 h-100"> --}}
        @if (!isset($doctors))
            <div class="position-absolute col-12 h-100 d-flex justify-content-center">
                {{ $slot }}
            </div>
        @else
            @yield('edit')
        @endif

        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
