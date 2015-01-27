@extends('layout')

@section('content')

<h2 class="page-header">Reporte de Personal</h2>

<div class="col-sm-6 col-md-6">

            {{ Form::open(['route' => 'report_search', 'method' => 'GET', 'role' => 'form', 'novalidate']) }}

            {{ Field::select('title', $titles) }}
         
            <p>
                <input type="submit" value="Buscar" class="btn btn-success">
            </p>

            {{ Form::close() }}

</div>
@stop