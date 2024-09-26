<div class="row padding-1 p-1" style="padding: 20px;">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('description') is-invalid @enderror" value="{{ old('name', $product?->name) }}" id="name" placeholder="Inserta el nombre" required>
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Precio') }}</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product?->price) }}" id="price" placeholder="Precio">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="is_unique" class="form-label">{{ __('Pieza única') }}</label>
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" id="is_unique" name="is_unique" onchange="toggleStock(this)">
                <label class="form-check-label" for="is_unique">{{ __('') }}</label>
            </div>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Cantidad (De 1 a 100)') }}</label>
            <input type="range" name="stock" class="form-control-range @error('stock') is-invalid @enderror" id="stock" value="{{ old('stock', $product?->stock) }}" min="1" max="10" oninput="updateStockValue(this.value)">
            <span id="stockValue" class="form-text">{{ old('stock', $product?->stock) }}</span>
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imagen') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" style="width: 300px;"> <!-- Cambiar el ancho aquí -->
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Finalizar') }}</button>
    </div>
</div>

<style>

    .form-check-input:checked {
        background-color: #cf92cd;
        border-color: #cf92cd;
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .form-check-input {
        width: 40px;
        height: 20px;
    }
</style>

<script>
    function updateStockValue(value) {
        document.getElementById('stockValue').innerText = value;
    }

    function toggleStock(checkbox) {
        const stockInput = document.getElementById('stock');
        if (checkbox.checked) {
            stockInput.value = 1; // Fijar a 1 si es único
            stockInput.setAttribute('max', 1); // Limitar el rango a 1
        } else {
            stockInput.removeAttribute('max'); // Quitar la restricción
        }
        updateStockValue(stockInput.value); // Actualizar el valor mostrado
    }
</script>
