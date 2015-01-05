@extends('layouts')

@section('content')

<h1 class="page-header">Puestos
  <a class="btn btn-success pull-right" href="{{ route('new_title') }}" role="button">Nuevo</a>
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
      @foreach ($titles as $title)
      <tr>
        <td>{{ $title->id }}</td>
        <td>{{ $title->name }}</td>
        <td><a class="btn btn-success" href="{{ route('update_title', [$title->id]) }}" role="button">Editar</a>
          <a class="btn btn-danger" href="#" role="button">Eliminar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop