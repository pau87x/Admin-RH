@extends('layouts')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Editar Centro</h1>

            {{ Form::model($title, ['route' => array('save_update_title', $title->id), 'method' => 'PUT', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('name') }}

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