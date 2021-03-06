@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Eliminar Candidato</h4>
        </div>
        
        {{ Form::open(['route' => array('destroy_candidate', $candidate->id), 'method' => 'delete', 'role' => 'form', 'novalidate']) }}
            <div class="modal-body">
                ¿ Desea eliminar al candidato <strong>{{ $candidate -> full_name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection