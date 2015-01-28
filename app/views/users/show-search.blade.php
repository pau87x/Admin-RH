@extends('layout')

@section('content')

<h2 class="page-header">Usuarios

  <div class="col-sm-3 col-md-3 pull-right">
    {{ Form::open(['route' => 'search_users', 'method' => 'GET', 'role' => 'search', 'novalidate']) }}
     <div class="input-group">
         <input type="text" class="form-control" placeholder="Buscar" name="q">
         <div class="input-group-btn">
             <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
         </div>
     </div>
    {{ Form::close() }}
  </div>

  <a class="btn btn-success" href="{{ route('sign_up') }}" role="button">Nuevo</a>

</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->full_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->type }}</td>
        <td>
          <div class="pull-right">
            <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('edit_user', [$user->id]) }}" role="button"></a>
            <a class="btn btn-danger glyphicon glyphicon-remove ajax-modal-dialog"  href="@{{ route('delete_user', [$user->id]) }}" role="button"></a> 
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop