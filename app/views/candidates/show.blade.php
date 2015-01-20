@extends('layouts')

@section('content')

<h1 class="page-header">Candidatos
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
<a class="btn btn-success" href="{{ route('new_candidate') }}" role="button">Nuevo</a>

</h1>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre Completo</th>
        <th>Correo Electrónico</th>
        <th>Puesto</th>
        <th>Celular</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($candidates as $candidate)
      <tr>
        <td> {{ $candidate->full_name }} </td>
        <td> {{ $candidate->position_name }} </td>
        <td> {{ $candidate->email }} </td>
        <td> {{ $candidate->cell_phone }} </td>
        <td>
          <div class="pull-right">
            <a class="btn btn-default glyphicon glyphicon-eye-open" href="{{ route('show_candidate', [$candidate->id]) }}" role="button"></a>
            <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('edit_candidate', [$candidate->id]) }}" role="button"></a>
            <a class="btn btn-danger glyphicon glyphicon-chevron-down" href="@{{ route('layoff', [$candidate->id]) }}" role="button"></a> 
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
      {{ $candidates->links() }}
  </div>

</div>
@stop