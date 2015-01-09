@extends('layouts')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Nuevo Empleado</h1>

            {{ Form::open(['route' => 'save_new_employee', 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('code') }}

            {{ Field::text('first_name') }}

            {{ Field::text('middle_name') }}

            {{ Field::text('third_name') }}

            {{ Field::text('last_name') }}

            {{ Field::text('maiden_name') }}

            {{ Field::text('birthdate', null, ['id' => 'birthdate', 'class'=>'datepicker','maxlength' => '10']) }}

            {{ Field::select('genre', $genres) }}

            <h3>Contacto </h3>

            {{ Field::text('phone', null, ['maxlength' => '10']) }}

            {{ Field::text('cell_phone', null, ['maxlength' => '10']) }}

            {{ Field::email('email') }}

            <h3>Datos </h3>

            {{ Field::text('rfc') }}

            {{ Field::text('curp') }}

            {{ Field::text('ss_number') }}

            <h3>Dirección</h3>

            {{ Field::text('street') }}

            {{ Field::text('no_ext') }}

            {{ Field::text('no_int') }}

            {{ Field::text('extra_address') }}

            {{ Field::text('zip_code') }}

            {{ Field::text('city') }}

            {{ Field::select('state_id', $states) }}


            <p>
                <input type="submit" value="Registrar" class="btn btn-success">
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
        endDate: '-18y',
        language: "es",
        startView: 2
    });
});
</script>
@endsection