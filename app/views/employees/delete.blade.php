@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Eliminar Usuario</h4>
        </div>
        
        {{ Form::open(['route' => array('ejecute_delete_employee', $employee->id), 'method' => 'delete', 'role' => 'form', 'novalidate']) }}
            <div class="modal-body">
                Desea eliminar al usuario {{ $employee -> full_name }}?
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
    $(document).ready(function() {
        var CSRF_TOKEN = "@{{ csrf_token }}";
        $('select.select2').select2();

        $('.route-form').validate({
            ignore: [],
            highlight: function(element) {
                $(element).parents('.form-group').addClass("has-error");
            },
            unhighlight: function(element) {
                console.log($(element));
                $(element).parents('.form-group').removeClass("has-error");
            }
        });
</script>
@endsection