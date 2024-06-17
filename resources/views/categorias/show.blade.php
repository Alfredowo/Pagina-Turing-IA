@extends('admin')

@section('content')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
        <h1 class="my-4">Agregar Categoria</h1>
            <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="post">
                @method('patch')
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }} </h6>  
                @endif

                @error('nombre')
                    <h6 class="alert alert-danger">{{ $message }} </h6>
                @enderror

                <div class="form-group">
                    <label for="nombre">Nombre de la Categoria</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Categoria</button>
            </form>
            <div>
              <h3>Productos</h3>
              @if ($categoria->productos->count() > 0)
                @foreach ($categoria->productos as $producto)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('productos.edit', ['id' => $producto->id]) }}">{{ $producto->nombre }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('productos.destroy', [$producto->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
                @endforeach
                
                @else
                  No hay productos para esta categoria
                @endif
              </ul>
            </div>
        </div>
    </div>
@endsection
