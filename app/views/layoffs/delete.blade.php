@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Reactivar</h4>
        </div>
        
        {{ Form::open(['route' => array('destroy_layoff', $employee->id), 'method' => 'delete', 'role' => 'form', 'novalidate']) }}
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                  El puesto anterior se reactivará.
                </div>
                ¿Desea reactivar a este empleado <strong>{{ $employee->full_name }}</strong>?
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