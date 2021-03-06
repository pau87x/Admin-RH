@extends('layout')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Nuevo Puesto</h1>

            {{ Form::open(['route' => array('save_new_title'), 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('name') }}

            <p>
                <input type="submit" value="Crear" class="btn btn-success">
            </p>

            {{ Form::close() }}

        </div>
    </div>
</div>

@endsection


@section('extra-js')
@endsection