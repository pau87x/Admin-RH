@extends('layout')

@section('content')

<h2 class="page-header">Historial
   @if ($employee->status_id != 1)
  <a class="btn btn-success pull-right" href="{{ route('new_change', [$employee->id]) }}" role="button">Nuevo</a>
  @endif
</h2>

<h3> {{ $employee->full_name }} </h3>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Puesto</th>
        <th>Centro</th>
        <th>Supervisor</th>
        <th>Salario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($changes as $change)
      <tr>
        <td>{{ $change->date }}</td>
        <td>{{ $change->title->name }}</td>
        <td>{{ $change->center->name }}</td>
        <td>{{ $change->supervisor->full_name}}</td>
        <td>{{ $change->salary }}</td>
        <td><a class="btn btn-success" href="{{ route('edit_change', [$change->id]) }}" role="button">Editar Cambio</a>
          <a class="btn btn-danger ajax-modal-dialog" href="{{ route('delete_change', [$change->id]) }}" role="button">Eliminar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop