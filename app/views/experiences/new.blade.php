@extends('layouts')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Agregar Experiencia</h1>

            {{ Form::open(['route' => array('register_experience',$candidate->id), 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('company') }}

            {{ Field::text('title') }}

            {{ Field::textarea('summary') }}
            
            {{ Field::text('start', null, ['id' => 'start', 'class'=>'datepicker']) }}

            {{ Field::text('end', null, ['id' => 'end', 'class'=>'datepicker']) }}

            {{ Field::checkbox('current') }}

            <p>
                <input type="submit" value="Agregar" class="btn btn-success">
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