@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Actualizar Curriculum</h4>
        </div>

        {{ Form::model($candidate, ['route' => array('save_cv', $candidate->id), 'method' => 'PUT', 'files' => true, 'role' => 'form', 'novalidate']) }}
            <div class="modal-body">
                {{ Field::file('cv') }}

                <strong>Nota: Se reemplazará el archivo anterior.</strong>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection