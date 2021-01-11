<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrarse</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="{{ asset('dist/css/estilos.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('inicio') }}"><b>Tienda</b>Virtual</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{ route('register') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="apellido_paterno" id="apellido_paterno" type="text"
                                    value="{{ old('apellido_paterno') }}"
                                    class="form-control @error('apellido_paterno') is-invalid @enderror"
                                    placeholder="Apellido paterno">
                                @error('apellido_paterno')
                                <span class="invalid-feedback order-last ">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="apellido_materno" type="text"
                                    value="{{ old('apellido_materno') }}"
                                    class="form-control @error('apellido_materno') is-invalid @enderror"
                                    placeholder="Apellido materno">
                                @error('apellido_materno')
                                <span class="invalid-feedback order-last ">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="nombres" type="text" value="{{ old('nombres') }}"
                                    class="form-control @error('nombres') is-invalid @enderror" placeholder="Nombres">
                                @error('nombres')
                                <span class="invalid-feedback order-last">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="input-group mb-3">
                                <select class="form-control @error('tipo_documento_id') is-invalid @enderror"
                                    name="tipo_documento_id" id="tipo_documento_id">
                                    @foreach($combo_tipo_documentos as $tipo)
                                    <option @if($tipo->id === (int)old('tipo_documento_id')) selected @endif
                                        value="{{ $tipo->id }}">{{ $tipo->nombre_corto }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_documento_id')
                                <span class="invalid-feedback order-last">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="documento" type="text" value="{{ old('documento') }}"
                                    class="form-control @error('documento') is-invalid @enderror"
                                    placeholder="Documento">
                                @error('documento')
                                <span class="invalid-feedback order-last">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="celular" type="text" value="{{ old('celular') }}"
                                    class="form-control @error('celular') is-invalid @enderror" placeholder="Celular">
                                @error('celular')
                                <span class="invalid-feedback order-last">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="direccion" type="text" value="{{ old('direccion') }}"
                                    class="form-control @error('direccion') is-invalid @enderror"
                                    placeholder="Dirección">
                                @error('direccion')
                                <span class="invalid-feedback order-last">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="email" type="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback order-last">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Contraseña">
                                @error('password')
                                <span class="invalid-feedback order-last">{{ $message }}</span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input required name="password_confirmation" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Confirmar contraseña">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <a href="{{ route('login') }}" class="btn btn-block btn-outline-primary">Ya tengo una
                                cuenta</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>