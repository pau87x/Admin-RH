@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Eliminar Cambio</h4>
        </div>
        
        {{ Form::open(['route' => array('destroy_change', $change->id), 'method' => 'delete', 'role' => 'form', 'novalidate']) }}
            <div class="modal-body">
                @if ($change->current==1)
                <div class="alert alert-info" role="alert">
                  Este puesto es el actual, se actualizará el anterior como actual.
                </div>
                @endif
                ¿Desea eliminar este cambio de puesto a <strong>{{ $change -> title -> name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection


@section('extra-js')
<script>
</script>
@endsection