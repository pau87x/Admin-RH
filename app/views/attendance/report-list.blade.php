@extends('layout')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')

<h2 class="page-header">Reporte de Personal</h2>

<div class="col-sm-3 col-md-3">
            {{ Form::open(['route' => 'report_list_search', 'method' => 'GET', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('date', $today, ['id' => 'date', 'class'=>'datepicker','maxlength' => '10']) }}
            
            <p>
                <input type="submit" value="Buscar" class="btn btn-success">
            </p>

            {{ Form::close() }}
</div>
@stop

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