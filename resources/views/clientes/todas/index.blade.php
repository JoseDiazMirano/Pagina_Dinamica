@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Cliente</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@include('clientes.todas.modal') 
<div class="mt-3 row-cols-1 card-columns ">
    @foreach($clientes as $cliente)
        @include('clientes.todas.modal-delete') 
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('/img/clientes/'.$cliente->image)}}" alt="{{$cliente->image}}" class="card-img-top">
                        </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{$cliente->nombre}}</h3><br><hr>
                            <p class="card-text"><small class="text-muted">Fecha Ingreso:{{ $cliente->created_at}}</small></p>
                            <p class="card-text"><small class="text-muted">Fecha Actualizado:{{ $cliente->updated_at}}</small></p>
                            <!--<h5 class="card-title">Usuarios que lo publico:{{$cliente->user_id}}</h5><br>-->
                        </div>
                    </div>
                </div> 
                    <div class="card-footer  border-success">
                    <a href="{{URL::action('ClientesController@edit',$cliente->id)}}">
                        <button type="button" class="btn btn-info btn-sm ">
                            <i class="far fa-edit"></i>
                        </button> 
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$cliente->id}}">
                        <i class="far fa-trash-alt"></i>
                    </button>   
                    </div>
            </div>
            @endforeach  
        </div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Hola {{ Auth::user()->name }}</h4>
            <p>Si vas a publicar una Imagen de un cliente porfavor sigue esta recomedación:<br>
                1-Para que el usuario tenga una mayor satisfaccion al ver 
                la imagen porfavor que sus dimensiones sean de <strong>"195 x 100"</strong>.<br>
                2-Que la imagen tenga un formato <strong>".jpg"</strong>.<br>
                3-Respete los caracteres de los campos solicitados.
            </p>
            <hr>
            <p class="mb-0">Que tengas un hermoso día Atte: JLDIAZ</p>
        </div>
@endsection