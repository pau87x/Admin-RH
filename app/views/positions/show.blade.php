@extends('layouts')

@section('content')

<h1 class="page-header">Vacantes
  @if (is_admin())
  <a class="btn btn-success pull-right" href="{{ route('new_position') }}" role="button">Nuevo</a>
  @endif
</h1>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Salario</th>
        <th>Lugar</th>
        @if (is_admin())
        <th>Acciones</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($positions as $position)
      <tr>
        <td>{{ $position->id }}</td>
        <td>{{ $position->name }}</td>
        <td>{{ $position->job_type_title }}</td>
        <td>{{ $position->salary }}</td>
        <td>{{ $position->place }}</td>
        @if (is_admin())
        <td><a class="btn btn-success" href="{{ route('edit_position', [$position->id]) }}" role="button">Editar</a>
          <a class="btn btn-danger ajax-modal-dialog" href="{{ route('delete_position', [$position->id]) }}" role="button">Eliminar</a>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop