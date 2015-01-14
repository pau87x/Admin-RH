@extends('layouts')

@section('content')

<h1 class="page-header">Lista de Asistencia {{ date('d/m/Y') }}</h1>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre Completo</th>
        <th>Puesto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee)
      <tr>
        <td>{{ $employee->code }}</td>
        <td>@{{ $employee->full_name }}</td>
        <td> @{{ $employee->title }} </td>
        <td>
          @if ($employee->assistance === 'ok')
          <div class="pull-right">
            <a class="btn btn-success glyphicon" href="{{ route('attendance', [$employee->id]) }}" role="button">Ok</a>
          </div>
          @else
          <div class="pull-right">
            <a class="btn btn-default glyphicon" href="{{ route('attendance', [$employee->id]) }}" role="button">Asistio</a>
          </div>
          @endif
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
      @{{ $employees->links() }}
  </div>

</div>

@stop