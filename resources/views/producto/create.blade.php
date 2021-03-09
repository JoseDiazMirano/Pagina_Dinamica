@extends('layouts.app')
@section('content')
<div class="container ">
    <h1>
        Productos<small>[Agregar Productos]</small>
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
        {!! Form::open(['route' => 'producto.store','files'=>'true']) !!}
        {{Form::token()}} 
        <div class="form-group">
            <label  class="control-label" for="categoria_id">CATEGORÍAS</label>
            {!! Form::select('categoria_id', $categorias,null,['class' => 'form-control','placeholder' => 'Elija una categoria de producto'])!!}
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" required placeholder="Ingrese su Nombre">
            </div>
            <div class="form-group col-md-6">
                <label for="extract">Sub titulo</label>
                <input type="text" name="extract" class="form-control" required placeholder="Ingrese su Sub titulo">
            </div>
        </div>
        <div class="form-group">
            <label for="descriptions">Descripción:</label>
            {{ Form::textarea('descriptions', null, array('class' =>'form-control input',  'required' => 'required', 'maxlength' => "400"))}}
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="price">Precio</label>
                <input type="number" step="any" name="price" class="form-control" required placeholder="Ingrese su Nombre">
            </div>
            <div class="form-group col-md-6">
                <label for="image">Imagen:</label>
                {{ Form::file('image',null,['required' => 'required'])}}
            </div>
        </div>
        <div class="form-group">
            <label for="visible">Estatus:</label>
            {!!
                Form::checkbox('visible',null,array('class' => 'form-check-label'))    !!}
        </div>

          <div class="form-group">
            {!! Form::submit('Guardar', array('class' =>'btn btn-outline-primary')) !!}
            <a href="{{ route('producto.index')}}" class="btn btn-outline-primary">ATRAS</a>
            
        {!! Form::close()!!}   
        </div>
    </div>
</div>
@endsection