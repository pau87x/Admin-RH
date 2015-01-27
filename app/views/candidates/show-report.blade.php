@extends('layout')

@section('content')

<h2 class="page-header">Candidatos</h2>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre Completo</th>
        <th>Puesto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($candidates as $candidate)
      <tr>
        <td> {{ $candidate->code }} </td>
        <td> {{ $candidate->full_name }} </td>
        <td> {{ $candidate->title }} </td>
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

</div>
@stop