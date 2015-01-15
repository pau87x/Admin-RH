@extends('layouts')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Editar Cambio</h1>

            {{ Form::model($change, ['route' => array('update_change', $change->id), 'method' => 'PUT', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('date', null, ['id' => 'date', 'class'=>'datepicker','maxlength' => '10']) }}

            {{ Field::select('title_id', $titles) }}

            {{ Field::select('center_id', $centers, null, ['class'=>'selectpicker', 'data-live-search'=>'true']) }}

            {{ Field::select('supervisor_id', $supervisors, null, ['class'=>'selectpicker', 'data-live-search'=>'true']) }}

            {{ Field::text('salary') }}

            <p>
                <input type="submit" value="Guardar" class="btn btn-success">
            </p>

            {{ Form::close() }}

        </div>
    </div>
</div>

@endsection


@section('extra-js')
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.es.js') }}"></script>
<script src="{{ asset('bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('bootstrap-select/dist/js/i18n/defaults-es_CL.min.js') }}"></script>
<script>
$(document).ready(function(){ 
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: "es",
        startView: 1,
        todayHighlight: true,
        todayBtn: true,
        autoclose: true
    });
    $('.selectpicker').selectpicker();
});
</script>
@endsection