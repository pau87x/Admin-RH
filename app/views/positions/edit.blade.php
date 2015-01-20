@extends('layouts')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Editar Vacante</h1>

            {{ Form::model($position, ['route' => array('update_position', $position->id), 'method' => 'PUT', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('name') }}

            {{ Field::textarea('description') }}

            {{ Field::select('job_type', $job_types) }}

            {{ Field::text('salary') }}

            {{ Field::text('city') }}

            {{ Field::select('state_id', $states) }}

            {{ Field::text('website_url') }}

            <p>
                <input type="submit" value="Guardar" class="btn btn-success">
            </p>

            {{ Form::close() }}

        </div>
    </div>
</div>

@endsection


@section('extra-js')
@endsection