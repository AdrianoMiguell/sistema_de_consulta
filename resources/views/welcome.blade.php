@extends('layouts.home')

@section('header')
    @extends('layouts.navigation')
@section('navbar')
    <div>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="botaoGeral btn btn-success">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="botaoGeral btn btn-success">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="botaoGeral btn btn-success">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
@endsection
@endsection

@section('home')
<style>

</style>

<section class="w-100 h-100">
    <img src="sistemImages/boa_consulta_medica2.jpg" alt="" style="width: 100%; height: 75vh; margin:0;">
</section>
<section class="my-5 py-3 w-100 d-flex justify-content-center align-items-center bg-dark">
    <div id="carouselExampleIndicators" class="carousel slide col-8 d-flex justify-content-center" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-around rounded bg-white">
                    <img src="https://img.freepik.com/fotos-premium/grupo-de-medicos-mostrando-sinal-de-aprovacao-ou-aprovacao-com-o-polegar-para-cima-servico-medico-de-alto-nivel-e-qualidade-melhor-tratamento-e-conceito-de-atendimento-ao-paciente_665183-6706.jpg?w=2000"
                        alt="First slide" class="imagemCaroussel rounded" alt="...">
                    <p class="text-dark m-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam quo
                        itaque
                        assumenda cupiditate, nostrum aliquid. Animi ipsa repellat est aliquam cumque voluptatum
                        nobis
                        dolorem laudantium quisquam, cum modi quis doloribus.</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-around rounded bg-white">
                    <img src="https://blog.kenlo.com.br/wp-content/uploads/2021/01/original-a153bbddfdfe232468efb67d6bad9f54.jpg"
                        alt="First slide" class="imagemCaroussel rounded" alt="...">
                    <p class="text-dark m-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam quo
                        itaque
                        assumenda cupiditate, nostrum aliquid. Animi ipsa repellat est aliquam cumque voluptatum
                        nobis
                        dolorem laudantium quisquam, cum modi quis doloribus.</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-around rounded bg-white">
                    <img src="https://blog.imedicina.com.br/wp-content/uploads/2021/05/iStock-1271897799-1.jpg"
                        class="imagemCaroussel rounded" alt="...">
                    <p class="text-dark m-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                class="bi bi-arrow-left-circle rounded-circle bg-dark" viewBox="0 0 16 16" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                class="bi bi-arrow-right-circle rounded-circle bg-dark" viewBox="0 0 16 16" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
            </svg>
        </button>
    </div>
    </div>
</section>

<section class="d-flex flex-column my-2 py-1">
    <div class="container d-flex justify-content-around p-5 my-1">
        <div>
            <img class="rounded border border-1 shadow" width="250px" height="225px"
                src="sistemImages/consulta-medica-psicoterapia.webp" alt="">
        </div>
        <div>
            <img class="rounded border border-1 shadow" width="250px" height="225px"
                src="sistemImages/jovem-medico-traumatologista.webp" alt="">
        </div>
        <div>
            <img class="rounded border border-1 shadow" width="250px" height="225px"
                src="sistemImages/marcar-consult-idosos.jpg" alt="">
        </div>
    </div>
    <div class="container d-flex justify-content-around p-5 my-1">
        <div>
            <img class="rounded border border-1 shadow" width="250px" height="225px"
                src="sistemImages/consulta-medica-psicoterapia.webp" alt="">
        </div>
        <div>
            <img class="rounded border border-1 shadow" width="250px" height="225px"
                src="sistemImages/jovem-medico-traumatologista.webp" alt="">
        </div>
        <div>
            <img class="rounded border border-1 shadow" width="250px" height="225px"
                src="sistemImages/marcar-consult-idosos.jpg" alt="">
        </div>
    </div>
</section>


{{--
{{--
@forelse ($consults as $key => $consult)
<td  style="background: {{ $consult->color }};">
    <h3> {{ $consult->name }} </h3>
    <div class="d-flex justify-content-around align-items-center my-3">
        <div class="mx-2 d-flex flex-column align-items-between m-2">
            <h3>Especialidade</h3>
            <h4> {{ $consult->especialidade }} </h4>
        </div>
        <div class="mx-2 d-flex flex-column m-2">
            <h3>Urg??ncia</h3>
            <h4> {{ $consult->urgencia }} </h4>
        </div>
    </div>
    <h5> Data :  {{ $consult->date }} </h5>
    <h5> Hora :  {{ $consult->hour }} </h5>
    <div class="d-flex justify-content-around align-items-center my-3">
        <button class="btn btn-success">editar</button>
        <button class="btn btn-success">excluir</button>
    </div>
</td>
@if ($consult->id > 3)
</tr>
<tr>
@endif
@empty
<div class="alert alert-danger my-5">
    Nenhuma consulta cadastrada!
</div>
@endforelse --}}
@endsection

@section('footer')
<footer class="bg-dark w-100 d-flex justify-content-center align-items-center" style="height: 25vh;">
    <h1 class="text-white text-shadow fs-1"> Obrigado! </h1>
</footer>
@endsection
