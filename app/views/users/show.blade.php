@extends('layouts')

@section('content')

<h1 class="page-header">Usuarios
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
<a class="btn btn-success" href="{{ route('sign_up') }}" role="button">Nuevo</a>

</h1>
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
            @if (is_admin())
            <a class="btn btn-danger glyphicon glyphicon-remove ajax-modal-dialog"  href="@{{ route('delete_user', [$employee->id]) }}" role="button"></a> 
            @endif
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
      {{ $users->links() }}
  </div>

</div>
@stop