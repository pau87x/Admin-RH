@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Eliminar Puesto</h4>
        </div>
        
        {{ Form::open(['route' => array('destroy_title', $title->id), 'method' => 'delete', 'role' => 'form', 'novalidate']) }}
            <div class="modal-body">
                ¿Desea eliminar el puesto <strong>{{ $title->name }}</strong>?
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