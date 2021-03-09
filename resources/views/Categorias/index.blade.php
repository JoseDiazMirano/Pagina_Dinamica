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
                    <li class="breadcrumb-item"><a href="#">Categorías</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container mt-5">
    <h2>LISTA DE CATEGORÍAS DE LOS PRODUCTOS
    <a href="{{ route('Categorias.create')}}" class="btn btn-outline-info">
            <i class="fa fa-plus-circle"> Categorías</i>
        </a>
    </h2>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
            </tr>
        </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>
                        <a href="{{route('Categorias.edit',$categoria->id)}}" class="btn btn-outline-success">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['action' => ['CategoriasController@destroy', $categoria->id],'method' => 'DELETE']) !!}
                        {{ Form::token() }}
                            <button class="btn btn-outline-danger" onclick="return confirm('Eliminar Registro?')">
                                <i class="fas fa-eraser"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                    <td>{{$categoria->name}}</td>
                    <td>{{$categoria->descripcion}}</td>
                </tr>
                @endforeach
            </tbody>
    </table> 
</div>  
</div><br><br>
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Hola {{ Auth::user()->name }}</h4>
    <h4>Si vas a Eliminar una <strong>"categoría "</strong>tener en cuenta estas recomendaciones:<br>
        1-Al momento de eliminar una categoría se va a realizar la eliminación de "</strong>.todos los productos que poseen esa categoría"</strong>.<br>
        2-Es Mejor actualizar y cambiar los datos que eliminar una categoría. <br>
        3-No Elimine una categoría a no se por motivos mayores.
    </h4>
    <hr>
    <p class="mb-0">Que tengas un hermoso dia Atte: JLDIAZ</p>
</div>
@endsection