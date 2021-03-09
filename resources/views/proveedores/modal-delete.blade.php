<div class="modal fade" id="modalEliminar-{{$proveedore->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hola {{ Auth::user()->name }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Estas seguro que quieres eliminar un proveedor ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Error mio..</button>
                    {!! Form::open(['action' => ['ProveedoresController@destroy', $proveedore->id],'method' => 'delete']) !!}
                    {{ Form::token() }}
                <button type="submit" class="btn btn-primary">Eliminar proveedor</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>