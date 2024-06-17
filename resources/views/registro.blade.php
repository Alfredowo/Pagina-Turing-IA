<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ElectroShop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="login-form">
        <form method="POST" action="{{ route('validar-registro') }}">
            @csrf
            <h2 class="text-center">Registro</h2>
            <div class="form-group">
                <label for="nombre">Nombre de Usuario</label>
                <input id="nombre" type="text" class="form-control" name="nombre" required autocomplete="nombre" autofocus>
            </div>
            <div class="form-group">
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
    </div>

</body>
</html>