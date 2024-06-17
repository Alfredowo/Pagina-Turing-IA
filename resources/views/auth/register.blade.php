<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse - ElectroShop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="login-form">
    <form action="{{ route('register.post') }}" method="post">
        @csrf
        <h2 class="text-center">Registrarse</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre de Usuario" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Contraseña" required="required" name="password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Repetir Contraseña" required="required" name="confirm_password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </div>
    </form>
    <p class="text-center"><a href="{{ route('login') }}">Iniciar Sesión</a></p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
