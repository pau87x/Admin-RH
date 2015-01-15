@extends('layouts')

@section('content')

<h1 class="page-header">Centros de servicio
  <a class="btn btn-success pull-right" href="{{ route('new_center') }}" role="button">Nuevo</a>
</h1>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($centers as $center)
      <tr>
        <td>{{ $center->id }}</td>
        <td>{{ $center->name }}</td>
        <td><a class="btn btn-success" href="{{ route('edit_center', [$center->id]) }}" role="button">Editar</a>
          <a class="btn btn-danger" href="#" role="button">Eliminar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop