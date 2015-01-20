@extends('layouts')

@section('content')

<h1 class="page-header"> {{ $candidate->full_name }} </h1>
<div class="table-responsive">

        <h4>Vacante</h4>
        {{ $candidate->position_name }}

        <h4>Contacto</h4>
        <strong>Celular</strong> {{ $candidate->cell_phone }}
        <strong>Correo Electronico</strong> {{ $candidate->email }}

        <h4>Lugar de residencia</h4>
        {{ $candidate->place }}

        <h4>Fecha de Nacimiento</h4>
        {{ $candidate->fecha_nac }}

        <p>
          <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('edit_candidate', [$candidate->id]) }}" role="button"> Editar</a>
          <a class="btn btn-info glyphicon glyphicon-briefcase" href="@{{ route('edit_candidate', [$candidate->id]) }}" role="button"> Agregar Experiencia</a>
          <a class="btn btn-info glyphicon glyphicon-book" href="@{{ route('edit_candidate', [$candidate->id]) }}" role="button"> Agregar Educación</a>
        </p>
</div>
@stop