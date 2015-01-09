@extends('layouts')

@section('content')

<h1 class="page-header">{{ $employee->code }}-{{ $employee->full_name }} 
        @if ($employee->status_id === 1)
        <span class="label label-danger pull-right">{{ $employee->status }}</span>
        @elseif ($employee->status_id === 2)
        <span class="label label-success pull-right">{{ $employee->status }}</span>
        @else
         <span class="label label-default pull-right">{{ $employee->status }}</span>
        @endif
</h1>
<div class="table-responsive">

        <h4>Puesto Actual</h4>
        {{ $employee->center }}- {{ $employee->supervisor }}
        <h4>Contacto</h4>
        <strong>Teléfono</strong> {{ $employee->phone }}
        <strong>Celular</strong> {{ $employee->cell_phone }}
        <strong>Correo Electronico</strong> {{ $employee->email }}
        <h4>Dirección</h4>
        {{ $employee->address }}

        <h4>Fecha de Nacimiento</h4>
        {{ $employee->fecha_nac }}
        <h4>RFC</h4>
        {{ $employee->rfc }}
        <h4>CURP</h4>
        {{ $employee->curp }}
        <h4>Número de Seguro Social</h4>
        {{ $employee->ss_number }}

        <p>
          <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('update_employee', [$employee->id]) }}" role="button">Editar</a>
          @if ($employee->status_id !== 1)
          <a class="btn btn-primary glyphicon glyphicon-chevron-up" href="{{ route('changes', [$employee->id]) }}" role="button">Cambiar Puesto</a>
          <a class="btn btn-danger glyphicon glyphicon-remove" href="{{ route('layoff', [$employee->id]) }}" role="button">Dar baja</a> 
          @endif
          @if (is_admin())
           <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('update_employee', [$employee->id]) }}" role="button">Reasignar</a>
          @endif
        </p>
</div>
@stop