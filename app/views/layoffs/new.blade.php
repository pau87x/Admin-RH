@extends('layouts')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Dar Baja</h1>

            {{ Form::open(['route' => array('save_new_layoff', $employee->id), 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('date', null, ['id' => 'date', 'class'=>'datepicker']) }}

            {{ Field::text('reason') }}

            {{ Field::textarea('comments') }}

            <p>
                <input type="submit" value="Dar Baja" class="btn btn-danger">
            </p>

            {{ Form::close() }}

        </div>
    </div>
</div>

@endsection


@section('extra-js')
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.es.js') }}"></script>
<script>
$(document).ready(function(){ 
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: "es",
        startView: 2
    });
});
</script>
@endsection