@extends('admin')

@section('content')
    <div class="container w-25 border p-4 mt-4">
    <h1 class="my-4">Editar Producto</h1>
        <form action="{{ route('productos.update', ['id' => $producto->id]) }}" method="post">
            @csrf
            @method('patch')

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }} </h6>  
            @endif

            @error('nombre')
                <h6 class="alert alert-danger">{{ $message }} </h6>
            @enderror

            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $producto->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
@endsection
