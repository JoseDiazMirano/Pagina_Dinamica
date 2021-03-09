<div class="modal fade" id="modalEliminar-{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hola {{ Auth::user()->name }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Estas seguro que quieres eliminar a este Cliente ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Error mio..</button>
                    {!! Form::open(['action' => ['ClientesController@destroy', $cliente->id],'method' => 'delete']) !!}
                    {{ Form::token() }}
                <button type="submit" class="btn btn-primary">Eliminar Cliente</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>