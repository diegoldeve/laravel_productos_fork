@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Product
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header" style="background-color: #cd5d5c;">
                        <span class="card-title" style="color: white;">{{ __('Crear') }} Producto</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('products.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('product.form') <!-- Asegúrate de que esta ruta sea correcta -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
