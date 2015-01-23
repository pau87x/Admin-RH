@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Eliminar Estudio</h4>
        </div>
        
        {{ Form::open(['route' => array('destroy_education', $education->id), 'method' => 'delete', 'role' => 'form', 'novalidate']) }}
            <div class="modal-body">
                ¿ Desea eliminar el estudio <strong>{{ $education->degree }} en {{ $education->school }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection