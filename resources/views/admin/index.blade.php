@extends('layouts.app')

@section('titulo_modulo')
    {{ 'Bienvenido' }}
@endsection

@section('contenido')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <h5 class="card-header">Titulo</h5>
                    <div class="card-body">
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the
                            card's
                            content.
                        </p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('titulo')
Admin | Tienda Virtual
@endsection