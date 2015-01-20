@extends('layouts')

@section('content')

<h1 class="page-header">Reporte de Personal</h1>

            {{ Form::open(['route' => 'report_search', 'method' => 'GET', 'role' => 'form', 'novalidate']) }}

            {{ Field::select('title', $titles) }}
         
            <p>
                <input type="submit" value="Buscar" class="btn btn-success">
            </p>

            {{ Form::close() }}
@stop