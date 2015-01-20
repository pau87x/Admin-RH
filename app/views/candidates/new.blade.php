@extends('layouts')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Nuevo Candidato</h1>

            {{ Form::open(['route' => 'save_new_candidate', 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('first_name') }}

            {{ Field::text('middle_name') }}

            {{ Field::text('last_name') }}

            {{ Field::text('maiden_name') }}

            {{ Field::text('birthdate', null, ['id' => 'birthdate', 'class'=>'datepicker','maxlength' => '10']) }}

            {{ Field::select('genre', $genres) }}

            <h3>Contacto </h3>

            {{ Field::text('cell_phone', null, ['maxlength' => '10']) }}

            {{ Field::email('email') }}

            <h3>Lugar de residencia</h3>

            {{ Field::text('city') }}

            {{ Field::select('state_id', $states) }}

            <h3>Vacante</h3>
            
            {{ Field::select('position_id', $positions) }}



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