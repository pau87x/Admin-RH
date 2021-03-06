@extends('layout')

@section('content')

<h2 class="page-header">Personal

  <div class="col-sm-3 col-md-3 pull-right">
    {{ Form::open(['route' => 'search_employee', 'method' => 'GET', 'role' => 'search', 'novalidate']) }}
     <div class="input-group">
         <input type="text" class="form-control" placeholder="Buscar" name="q">
         <div class="input-group-btn">
             <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
         </div>
     </div>
     {{ Form::close() }}
  </div>

  <a class="btn btn-success" href="{{ route('new_employee') }}" role="button">Nuevo</a>

</h2>
<div class="table-responsive">
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
        <td>
            @if ($employee->status_id === 1)
            <span class="label label-danger">{{ $employee->status }}</span>
            @elseif ($employee->status_id === 2)
            <span class="label label-success">{{ $employee->status }}</span>
            @else
             <span class="label label-default">{{ $employee->status }}</span>
            @endif
        </td>
        <td> {{ $employee->title }} </td>
        <td> {{ $employee->center }} </td>
        <td>
          <div class="pull-right">
            <a class="btn btn-default glyphicon glyphicon-eye-open" href="{{ route('show_employee', [$employee->id]) }}" role="button"></a>
            <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('edit_employee', [$employee->id]) }}" role="button"></a>
            <a class="btn btn-primary glyphicon glyphicon-chevron-up" href="{{ route('changes', [$employee->id]) }}" role="button"></a>
            <a class="btn btn-danger glyphicon glyphicon-chevron-down" href="{{ route('layoff', [$employee->id]) }}" role="button"></a> 
            @if (is_admin())
            <a class="btn btn-danger glyphicon glyphicon-remove ajax-modal-dialog"  href="{{ route('delete_employee', [$employee->id]) }}" role="button"></a> 
            @endif
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
      {{ $employees->links() }}
  </div>

</div>
@stop