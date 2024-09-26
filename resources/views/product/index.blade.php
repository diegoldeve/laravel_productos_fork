@extends('layouts.app')

@section('template_title')
    Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Productos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Añadir Producto') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Artículo</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Imagen</th> <!-- Nueva columna para la imagen -->
                                        <th>Pieza Única</th> <!-- Nueva columna para el estado de pieza única -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->description }}" style="width: 50px; height: auto;">
                                                @else
                                                    No disponible
                                                @endif
                                            </td>
                                            <td>
                                                {{ $product->is_unique == true ? 'Sí' : 'No' }} <!-- Mostrar si es pieza única -->
                                            </td>

                                            <td>
                                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('products.show',$product->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE') <!-- Corrige aquí para usar el método DELETE -->
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const preview = document.getElementById('preview');

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Asignar la URL del archivo leído a la imagen
                    imagePreview.style.display = 'block'; // Mostrar el contenedor de previsualización
                }
                reader.readAsDataURL(file); // Leer el archivo como una URL de datos
            } else {
                imagePreview.style.display = 'none'; // Ocultar si no hay archivo
            }
        }
    </script>
@endsection
