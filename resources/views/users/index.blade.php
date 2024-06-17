@extends('admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container border p-4 mt-4">
                    <h1 class="my-4">Lista de Usuarios</h1>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Permisos</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nombre }}</td>
                                        <td>{{ $user->pass }}</td>
                                        <td>{{ $user->permisos }}</td>
                                        <td>
                                            <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="get" class="d-inline">
                                                <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                                            </form>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $user->id }}">Eliminar</button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Usuario</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Está seguro de eliminar al usuario <strong>{{ $user->name }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <form method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
