@extends('layouts')

@section('content')

<h1 class="page-header">Personal</h1>

<h3 class="sub-header">Personal Activo</h3>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre Completo</th>
        <th>Género</th>
        <th>Teléfono</th>
        <th>Dirección</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee)
      <tr>
        <td>{{ $employee->code }}</td>
        <td>{{ $employee->full_name }}</td>
        <td>{{ $employee->genre_title }}</td>
        <td>{{ $employee->phone }}</td>
        <td>{{ $employee->address }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop