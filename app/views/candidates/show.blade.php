@extends('layouts')

@section('extra-css')
<script src="{{ asset('excellentexport/excellentexport.min.js') }}"></script>
@endsection

@section('content')

<h2 class="page-header">Candidatos
  
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

</h2>

<div class="table-responsive">
  <table class="table table-striped" id="candidates-table">
    <thead>
      <tr>
        <th>Nombre Completo</th>
        <th>Puesto</th>
        <th>Correo Electrónico</th>
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
            <a class="btn btn-primary glyphicon glyphicon-ok" href="{{ route('reclute_candidate', [$candidate->id]) }}" role="button"></a>
            <a class="btn btn-danger glyphicon glyphicon-remove" href="@{{ route('layoff', [$candidate->id]) }}" role="button"></a> 
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-center">
      {{ $candidates->links() }}
  </div>
  <div class="text-center">
        <a class="btn btn-primary text-center" href="{{ route('all_candidates') }}" >Ver todos</a>
        <a class="btn btn-success text-center" download="candidatos.xls" href="#" onclick="return ExcellentExport.excel(this, 'candidates-table', 'Candidatos');">Exportar a excel</a>
  </div>
</div>
@stop

@section('extra-js')
@endsection