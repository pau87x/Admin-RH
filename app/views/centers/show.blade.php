@extends('layouts')

@section('content')

<h2 class="page-header">Centros de servicio
  @if (is_admin())
  <a class="btn btn-success pull-right" href="{{ route('new_center') }}" role="button">Nuevo</a>
  @endif
</h2>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        @if (is_admin())
        <th>Acciones</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($centers as $center)
      <tr>
        <td>{{ $center->id }}</td>
        <td>{{ $center->name }}</td>
        @if (is_admin())
        <td>
          <a class="btn btn-success" href="{{ route('edit_center', [$center->id]) }}" role="button">Editar</a>
          <a class="btn btn-danger ajax-modal-dialog" href="{{ route('delete_center', [$center->id]) }}" role="button">Eliminar</a>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop