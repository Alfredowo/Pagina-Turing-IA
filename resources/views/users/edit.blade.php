@extends('admin')

@section('content')
    <div class="container w-50 border p-4 mt-4">
        <h1 class="my-4">Editar Usuario</h1>
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
            @csrf
            @method('put')

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="passwrod" class="form-control" id="password" name="password" value="{{ $user->pass }}" required>
            </div>
            <div class="form-group">
                <label for="permisos">Permisos</label>
                <input type="text" class="form-control" id="permisos" name="permisos" value="{{ $user->permisos }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
@endsection
