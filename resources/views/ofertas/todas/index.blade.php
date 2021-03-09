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
                    <li class="breadcrumb-item"><a href="#">Ofertas</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@include('ofertas.todas.modal') 

<div class="mt-3 row-cols-1 card-columns ">
    @foreach($ofertas as $oferta)
        @include('ofertas.todas.modal-delete') 
        <div class="card mb-3 " style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('/img/ofertas/'.$oferta->image)}}" alt="{{$oferta->image}}" class="card-img-top" height="250" >
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">{{$oferta->titulo}}</h1><br><hr>
                        <h5 class="card-title">{{$oferta->texto}}</h5><br><hr>
                        <p class="card-text"><small class="text-muted">Fecha Ingreso:{{ $oferta->created_at}}</small></p>
                        <p class="card-text"><small class="text-muted">Fecha Actualizado:{{ $oferta->updated_at}}</small></p>
                        <!--<h5 class="card-title">Usuarios que lo publico:{{$oferta->user_id}}</h5><br>-->
                    </div>
                </div>
            </div> 
            <div class="card-footer border-info">
                <a href="{{URL::action('PublicofertController@edit',$oferta->id)}}">
                    <button type="button" class="btn btn-info btn-sm ">
                        <i class="far fa-edit"></i>
                    </button> 
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar-{{$oferta->id}}">
                    <i class="far fa-trash-alt"></i>
                </button> 
            </div>
        </div>
    @endforeach  
        </div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Hola {{ Auth::user()->name }}</h4>
            <p>Si vas a publicar una Imagen de oferta del dia porfavor sigue esta recomedación:<br>
                1-Para que el usuario tenga una mayor satisfaccion al ver 
                la imagen porfavor que sus dimensiones sean de <strong>"720 x 1280"</strong>.<br>
                2-Que la imagen tenga un formato <strong>".jpg"</strong>.<br>
                3-Respete los caracteres de los campos solicitados.
            </p>
            <hr>
            <p class="mb-0">Que tengas un hermoso dia Atte: JLDIAZ</p>
        </div>
</div>
@endsection