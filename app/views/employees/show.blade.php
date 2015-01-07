@extends('layouts')

@section('content')

<h1 class="page-header">Personal
  <a class="btn btn-success pull-right" href="{{ route('new_employee') }}" role="button">Nuevo</a>
</h1>
<!-- <h3 class="sub-header">Personal Activo</h3>
 --><div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre Completo</th>
        <th>Estatus</th>
        <th>Puesto</th>
        <th>Centro</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee)
      <tr>
        <td>{{ $employee->code }}</td>
        <td>{{ $employee->full_name }}</td>
        <td>{{ $employee->status }}</td>
        <td>{{ $employee->last_change->title }}</td>
        <td>{{ $employee->center }}</td>
        <td>
          <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('update_employee', [$employee->id]) }}" role="button"></a>
          <a class="btn btn-primary glyphicon glyphicon-chevron-up" href="{{ route('changes', [$employee->id]) }}" role="button"></a>
          <a class="btn btn-danger glyphicon glyphicon-remove" href="{{ route('layoff', [$employee->id]) }}" role="button"></a> 
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop