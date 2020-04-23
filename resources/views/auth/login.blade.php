<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>
<body>
    <div class="container" style="margin-top:70px">
    <div class="card text-center">
  <div class="card-header">
    <h1>Iniciar Sesión</h1>
  </div>
  <div class="card-body text-center">
    <form class="text-center" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
  <div class="form-row">
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                            <label for="email" class="col-md-12 control-label">E-Mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
</div>
                        <div class="form-row">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12">
                            <label for="password" class="col-md-12 control-label">Contraseña</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  </div>
  <div class="form-group">
        <div class="checkbox">
                <label>
                    <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                </label>
            </div>
    </div>


  <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
  </div>
  <div class="card-footer text-muted">
    ¿Aún no tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
  </div>
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>

