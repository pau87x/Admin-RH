@extends('layouts')

@section('content')

<h1 class="page-header">Lista de Asistencia {{ Input::get('date') }}</h1>

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
        <td>{{ $employee->full_name }}</td>
        <td>{{ $employee->title }} </td>
        <td>
          <div id="navigation">
            @if ($employee->assistance)
              <a class="btn btn-success glyphicon glyphicon-ok ajax-uncheck" id="{{$employee->id}}uncheck" href="" role="button"></a>
            @else
              <a class="btn btn-default glyphicon glyphicon-unchecked ajax-check" id="{{$employee->id}}check" href="" role="button"></a>
            @endif
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
  </div>
</div>

@stop
