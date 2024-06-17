@extends('admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
            <div class="container border p-4">
                <h1 class="my-4">Lista de Ventas</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->usuario }}</td>
                            <td>{{ $venta->producto }}</td>
                            <td>{{ $venta->cantidad }}</td>
                            <td>{{ $venta->fecha }}</td>
                            <td>{{ $venta->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
