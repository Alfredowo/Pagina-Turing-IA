@extends('admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="container border p-4 mt-4">
                    <h1 class="my-4">Agregar Producto</h1>
                    <form action="{{ route('productos.store') }}" method="post">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="form-group">
                            <label for="nombre">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Categoría del Producto</label>
                            <select name="fkcategoria" class="form-select">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"> {{ $categoria->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Producto</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="container border p-4 mt-4">
                    <h1 class="my-4">Lista de Productos</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>
                                        <form action="{{ route('productos.edit', ['id' => $producto->id]) }}" method="get" class="d-inline">
                                            <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                                        </form>
                                        <form action="{{ route('productos.destroy', ['id' => $producto->id]) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
