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
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <h3>Vas a editar al Usuario: {{$user->name}}</h3>
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
        
    <form action="{{route('usuarios.update', $user->id)}}" method="POST"  autocomplete="off">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label>NOMBRE</label>
                <input type="text" name="name" class="form-control" required value="{{ $user->name }}" placeholder="Ingrese su Nombre">
            </div>
            <div class="form-group col-md-6">
                <label>E-MAIL</label>
                <input type="email" name="email" class="form-control" required value="{{ $user->email }}"placeholder="Ingrese su E-mail">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="rol">ROL</label>
                    <select name="rol" class="form-control">
                        <option selected disabled>Elige un rol para este usuario</option>
                            @foreach($roles as $role)
                            @if($role->name == str_replace(array('["', '"]'),'', $user->tieneRol()))
                                <option value="{{ $role->id}}" selected>{{$role->name}}</option>
                            @else
                                <option value="{{ $role->id}}">{{$role->name}}</option>
                            @endif
                            @endforeach
                    </select>
            </div>  
            <div class="form-group col-md-6">
                <label for="celular">Celular:</label>
                <input type="number" class="form-control" name="celular" required value="{{$user->celular}}" autocomplete="off" placeholder="Ingrese su celular">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>CONTRASEÑA<span class="small">(Opcional)</span></label>
                <input type="password"  name="password" class="form-control" placeholder="Ingrese su Contraseña">
            </div>
            <div class="form-group col-md-6">
                <label>CONFIRME CONTRASEÑA<span class="small">(Opcional)</span></label>
                <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirme su Contraseña">
            </div>
        </div>
        <div class="row"> 
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </form>
</div>
@endsection