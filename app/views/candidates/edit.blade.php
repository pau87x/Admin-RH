@extends('layout')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Editar Candidato</h1>

            {{ Form::model($candidate, ['route' => array('update_candidate', $candidate->id), 'method' => 'PUT', 'files' => true, 'role' => 'form', 'novalidate']) }}

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

            {{ Field::text('salary') }}

            @if($candidate->cv!='')
                <a href="{{ url('/cvs/'.$candidate->cv) }}" class="btn btn-info btn-sm" target="_blank">Curriculum </a>
            @endif

            {{ Field::textarea('comment') }}

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