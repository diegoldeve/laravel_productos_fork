@extends('layouts.app')
<link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card gradient-background"> <!-- Añadir la clase aquí -->
                <div class="card-header">{{ __('¡FELICIDADES!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                
                        <div class="center-text">
                             {{ __('Cocomi es una red de artistas donde pueden ofrecer su trabajo para encontrar clientes reales con un contacto cercano y poco tiempo de espera.') }}
                            <br>
                            {{ __('Si eres un artista, un apasionado por el arte o buscas un regalo único este es tu lugar.') }}
                             <br>
                            <br>
                            {{ __('¡En Cocomi siempre buscamos la mejor experiencia para todxs!.') }}
                            </div>
                     </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ url('/products') }}" class="btn btn-lg btn-black" style="background-color: #cd5d5c; color: white; font-size: 24px; padding: 15px 30px;">
                    ! EXPLORA AHORA ¡
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
