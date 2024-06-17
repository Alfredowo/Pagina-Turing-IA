
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Artículos Electrónicos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

  <!-- Encabezado -->
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"> 
    <div class="container">
      <a class="navbar-brand" >ShopTech</a>
      <a class="navbar-brand" >Bienvenido {{Auth::user()->nombre}} </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#about">Acerca de Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#products">Artículos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contáctanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#plans">Planes</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3" text-end>
        <a href="{{route('logout')}}">
          <button type="button" class="btn btn-outline-primary me-2" >
            Cerrar sesion
          </button>
        </a>
      </div>
    </div>
  </nav>
</header>

<br><br><br>

  <!-- Acerca de Nosotros -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>Acerca de Nosotros</h2>
          <p>Somos una tienda dedicada a ofrecer lo mejor en tecnología y electrónica para satisfacer tus necesidades.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Artículos existentes -->
  <section id="products" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Artículos Existentes</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($productos as $producto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('path/to/your/image.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{ $producto->nombre }}</h5>
                            <small class="text-muted" style="font-size: 1.0rem;">{{ $producto->precio }} USD</small>
                        </div>
                        <p class="card-text mt-2">{{ $producto->descripcion }}</p>
                        <form id="comprar-form-{{ $producto->id }}" action="{{ route('comprar', $producto->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="cantidad-{{ $producto->id }}" class="form-label">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad-{{ $producto->id }}" min="1" value="1" class="form-control mb-2">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" onclick="showAlert();">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>


  <script>
    function showAlert() {
      alert('¡Compra realizada correctamente!');
    }
  </script>

  <!-- Contáctanos -->
  <section id="contact" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>Contáctanos</h2>
          <p>Estamos aquí para ayudarte. Contáctanos si tienes alguna pregunta o comentario.</p>
          <p>Correo: correo@gmail.com.</p>
          <p>Direccion: avenida 5 demayo, Mexico</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Planes -->
<section id="plans" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h2>Planes</h2>
      </div>
    </div>
    <div class="row">
      <!-- Plan Gratis -->
      <div class="col-md-4">
        <div class="card plan-card plan-gratis">
          <div class="card-header">
            <h5 class="card-title">Plan Gratis</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item ">Acceso limitado a productos</li>
              <li class="list-group-item">Soporte básico por correo electrónico</li>
              <li class="list-group-item">Sin costos mensuales</li>
            </ul>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-block">Elegir Gratis</a>
          </div>
        </div>
      </div>
      <!-- Plan Medio -->
      <div class="col-md-4">
        <div class="card plan-card plan-medio">
          <div class="card-header">
            <h5 class="card-title">Plan Medio</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Acceso completo a todos los productos</li>
              <li class="list-group-item">Soporte prioritario por correo electrónico y teléfono</li>
              <li class="list-group-item">Costo mensual moderado</li>
            </ul>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-block">Elegir Medio</a>
          </div>
        </div>
      </div>
      <!-- Plan Premium -->
      <div class="col-md-4">
        <div class="card plan-card plan-premium">
          <div class="card-header">
            <h5 class="card-title">Plan Premium</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Acceso exclusivo a productos premium</li>
              <li class="list-group-item">Soporte prioritario 24/7 por varios canales</li>
              <li class="list-group-item">Costo mensual alto, pero con beneficios adicionales</li>
            </ul>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-block">Elegir Premium</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Pie de página -->
  <footer class="py-4">
    <div class="container text-center">
      <p>&copy; 2024 ShopTech. Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- Bootstrap JS y scripts opcionales (jQuery) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-Fs5vQR+SQyGpSTYQv1vMv8LCIf/xXdou1akjOKPD/aVp7TwXuhu0kr1kFt4PbpM4" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+2nVNBa5AxpB/K4v2rjyBZpKvu6zUh2hM1P" crossorigin="anonymous"></script>
</body>
</html>
