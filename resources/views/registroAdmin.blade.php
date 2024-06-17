@extends('admin')

@section('content')
    <main class="container mt-5">

        <div class="card-header">Registro</div>

        <form method="POST" action="{{ route('validar-registro-admin') }}">
            @csrf

            <div class="mb-3">
                <label for="nombre">Nombre de Usuario</label>
                <input id="nombre" type="text" class="form-control" name="nombre" required autocomplete="nombre" autofocus>
            </div>

            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </form>
        <p class="text-center"><a href="{{ route('login') }}">Ya tengo una cuenta</a></p>
    </main>
@endsection