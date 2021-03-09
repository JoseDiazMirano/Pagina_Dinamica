@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                    <li class="breadcrumb-item"><a href="#">Index</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <h3>CREAR NUEVO USUARIO</h3>
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
    </div>

    <form action="{{ url('usuarios') }}" method="POST" enctype="multipart/form-data"> 
        @csrf
            <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">NOMBRE</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingrese su Nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-MAIL</label>
                        <input type="email" name="email" class="form-control"  placeholder="Ingrese su E-mail">
                    </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="rol">ROL</label>
                        <select name="rol" class="form-control">
                            <option selected disabled>Elige un rol para este usuario</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id}}">{{$role->name}}</option>
                                @endforeach
                        </select>
                </div>  
                <div class="form-group col-md-6">
                    <label for="celular">CELULAR</label>
                    <input type="number" class="form-control" name="celular" required autocomplete="off" placeholder="Ingrese su celular">
                </div>    
            </div> 
            <div class="row">
                    <div class="form-group col-md-6">
                        <label>CONTRASEÑA</label>
                        <input type="password"  name="password" class="form-control" placeholder="Ingrese su Contraseña">
                    </div>
                    <div class="form-group col-md-6">
                        <label>CONFIRME CONTRASEÑA</label>
                        <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirme su Contraseña">
                    </div>
            </div>
            <div class="row"> 
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-danger">Borrar todo</button>
                </div>
                
            </div>
    </form>
</div>
@endsection