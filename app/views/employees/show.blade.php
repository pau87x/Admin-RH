@extends('layouts')

@section('content')

<h1 class="page-header">Personal
<div class="col-sm-3 col-md-3 pull-right">
  <form class="navbar-form" role="search">
   <div class="input-group">
       <input type="text" class="form-control" placeholder="Buscar" name="q">
       <div class="input-group-btn">
           <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
       </div>
   </div>
  </form>
</div>
<a class="btn btn-success" href="{{ route('new_employee') }}" role="button">Nuevo</a>

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
        <td>
            @if ($employee->status_id === 1)
            <span class="label label-danger">{{ $employee->status }}</span>
            @elseif ($employee->status_id === 2)
            <span class="label label-success">{{ $employee->status }}</span>
            @else
             <span class="label label-default">{{ $employee->status }}</span>
            @endif
        </td>
        <td>{{ $employee->supervisor }}</td>
        <td>{{ $employee->center }}</td>
        <td>
          <div class="pull-right">
            <a class="btn btn-default glyphicon glyphicon-eye-open" href="{{ route('show_employee', [$employee->id]) }}" role="button"></a>
            <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('update_employee', [$employee->id]) }}" role="button"></a>
            <a class="btn btn-primary glyphicon glyphicon-chevron-up" href="{{ route('changes', [$employee->id]) }}" role="button"></a>
            <a class="btn btn-danger glyphicon glyphicon-remove" href="{{ route('layoff', [$employee->id]) }}" role="button"></a> 
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop