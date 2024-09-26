@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex align-items-center" style="background: linear-gradient(to right, #d1a54c, #cd5d5c); min-height: 80vh;">
    <div class="row w-100">
    
        <div class="col-md-6 d-flex flex-column align-items-center">
           
            <div class="mb-3">
                <img src="{{ asset('images/Cocomi_logo.png') }}" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">
            </div>

            <div class="text-center">
                <img src="{{ asset('images/Cocomi_letras_blancas.png') }}" alt="Descripción de la imagen" style="max-width: 60%; height: auto;">
            </div>
        </div>

        <!-- Columna derecha: Caja de inicio de sesión -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="card w-100" style="background-color: rgba(255, 255, 255, 0.3); padding: 20px;">
                <div class="card-header text-center" style="font-family: 'Roboto', sans-serif; font-weight: 700; color: white;">{{ __('INICIAR SESIÓN') }}</div> <!-- Cambié la fuente aquí -->

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Campos de correo y contraseña -->
                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                 <button type="submit" class="btn btn-qstom">
                                    {{ __('Iniciar sesión') }}
                                </button>

                          @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                 {{ __('¿Olvidaste tu contraseña?') }}
                             </a>
                         @endif
                      </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
