<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - ElectroShop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="login-form">
    <form action="{{ route('inicia-sesion') }}" method="post">
        @csrf
        <h2 class="text-center">Iniciar Sesión</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre de Usuario" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Contraseña" required="required" name="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
        </div>
    </form>
    <p class="text-center"><a href="{{ route('register') }}">Crear una cuenta</a></p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
