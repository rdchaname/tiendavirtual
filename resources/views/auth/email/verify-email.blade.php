@extends('layouts.app')

@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Verificar email</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Verificar email</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <div>
                <h3>
                    <i class="fas fa-exclamation-triangle text-warning"></i> Oops! Aún no ha verificado su correo
                    electrónico.
                </h3>
                <p>
                    {{ '¡Gracias por registrarse! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibió el correo electrónico, con gusto le enviaremos otro.' }}
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                    @endif
                </p>
                <form class="search-form" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" name="submit"
                        class="btn btn-warning">{{ __('Resend Verification Email') }}</i>
                    </button>
                    <!-- /.input-group -->
                </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('titulo')
Admin | Tienda Virtual
@endsection