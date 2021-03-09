@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Productos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Productos</a></li>
                    <li class="breadcrumb-item"><a href="#">Editar</a></li>
                    <li class="breadcrumb-item active">{{$producto->name}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

{!! Form::open(['action' => ['ProductoController@update', $producto->id],'method' => 'PATCH','files'=>'true']) !!}
{{ Form::token() }}

<div class="card text-center mx-auto" style="width: 550px;">
    <div class="card-header">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control"  value="{{ $producto->name }}">
    </div> 
    <div class="card-header">
        <label for="extract">Sub titulo</label>
        <input type="text" name="extract" class="form-control" value="{{ $producto->extract }}">
    </div>
    <div class="card-body">
        <textarea name="descriptions"  class="form-control"  rows="6" value="{{ $producto->descriptions }}">
            {{ $producto->descriptions }}
        </textarea>
    </div>
    <div class="card-header">
        <label for="price">Precio</label>
        <input type="number" step="any" name="price" class="form-control"  value="{{ $producto->price }}">
    </div>
    <div class="form-group cold-md-6">
        <label for="image">Imagen</label><br>
            {{Form::file('image')}}
            @if($producto->image != "")
                <img src="{{asset('/img/productos/'.$producto->image)}}" alt="{{$producto->image}}" height="250px" width="50px" class="card-img-top">
            @endif
    </div>
    <div class="card-header">
        <label for="visible">Estatus:</label>
        <input type="checkbox" name="visible" {{ $producto->visible == 1 ? "checked='checked'" : ''}}> 
    </div>
    <div class="card-footer text-muted small">
        {{ $producto->updated_at }}
        <a href="{{URL::action('ProductoController@edit',$producto->id)}}">
            <button type="submit" class="btn btn-info  ">
            <i class="far fa-save"></i>
            </button> 
        </a>
        <a href="{{URL::action('ProductoController@index')}}">
            <button type="button" class="btn btn-danger  float-right mr-1 ">
                <i class="far fa-window-close"></i>
            </button> 
        </a>
    </div>
</div>
{!! Form::close() !!}
@endsection