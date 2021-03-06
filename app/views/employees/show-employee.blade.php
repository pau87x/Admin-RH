@extends('layout')

@section('content')

@include('employees.header-employee-status')

<div>

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
          <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('edit_employee', [$employee->id]) }}" role="button"> Editar</a>
          @if ($employee->status_id !== 1)
          <a class="btn btn-primary glyphicon glyphicon-chevron-up" href="{{ route('changes', [$employee->id]) }}" role="button"> Cambiar Puesto</a>
          <a class="btn btn-danger glyphicon glyphicon-remove" href="{{ route('layoff', [$employee->id]) }}" role="button"> Dar baja</a> 
          @endif
          @if (is_admin() && $employee->status_id === 1)
           <a class="btn btn-warning glyphicon glyphicon-refresh ajax-modal-dialog" href="{{ route('delete_layoff', [$employee->id]) }}" role="button"> Reasignar</a>
          @endif
        </p>
</div>
@stop