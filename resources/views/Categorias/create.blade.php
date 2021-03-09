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
                    <li class="breadcrumb-item">Categoría</li>
                    <li class="breadcrumb-item">Index</li>
                    <li class="breadcrumb-item active"><a href="#">Nuevo</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container ">
    <h1>
        Categorías<small>[Agregar Categoría]</small>
    </h1>

<div class="row text-center">
    <div class="col-md-offset col-md-6">
        <div class="page">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div> 
        {!! Form::open(['route' => 'Categorias.store']) !!}

            <div class="form-group">
                <label for="name">Nombre de la Categoría:</label>
                {!!
                    Form::text(
                        'name',
                        null,
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Ingrese el Nombre'
                        )
                    )    
                !!}
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                {!!
                    Form::textarea(
                        'descripcion',
                        null,
                        array(
                            'class' => 'form-control',
                        )
                    )    
                !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Guardar', array('class' =>'btn btn-outline-primary')) !!}
                <a href="{{ route('Categorias.index')}}" class="btn btn-outline-warning">Cancelar</a>
            </div>
        {!! Form::close()!!}   
        </div>
    </div>
</div>
</div>
@endsection