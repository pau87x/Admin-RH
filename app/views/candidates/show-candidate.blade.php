@extends('layout')

@section('content')

<h2 class="page-header"> {{ $candidate->full_name }} </h2>

<div>
        <h4>Vacante</h4>
        {{ $candidate->position_name }}

        @if($candidate->cv!='')
            <a href="{{ url('/cvs/'.$candidate->cv) }}" class="btn btn-info btn-sm pull-right glyphicon glyphicon-list-alt" target="_blank"> Curriculum </a>
        @else
            <a class="btn btn-warning glyphicon glyphicon-list-alt pull-right" href="@{{ route('add_cv', [$candidate->id]) }}" role="button"> Agregar Curriculum</a>
        @endif

        <h4>Contacto</h4>
        <strong>Celular</strong> {{ $candidate->cell_phone }}
        <strong>Correo Electrónico</strong> {{ $candidate->email }}

        <h4>Lugar de residencia</h4>
        {{ $candidate->place }}

        <h4>Fecha de Nacimiento</h4>
        {{ $candidate->fecha_nac }}

        <br/>

        <h3>Educación
          <a class="btn btn-info glyphicon glyphicon-book pull-right" href="{{ route('add_education', [$candidate->id]) }}" role="button"> Agregar</a>
        </h3>

        <table class="table" id="education-table">
            <thead>
              <tr>
                <th>Institución</th>
                <th>Titulo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($education as $school)
                <tr>
                  <td> {{ $school->school }} </td>
                  <td> {{ $school->degree }} </td>
                  <td> {{ $school->start }} </td>
                  <td> {{ $school->end }} </td>
                  <td>
                      <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('edit_education', [$school->id]) }}" role="button"></a>
                      <a class="btn btn-danger glyphicon glyphicon-remove ajax-modal-dialog" href="{{ route('delete_education', [$school->id]) }}" role="button"></a> 
                  </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <br/>

        <h3>Experiencia
          <a class="btn btn-info glyphicon glyphicon-briefcase pull-right" href="{{ route('add_experience', [$candidate->id]) }}" role="button"> Agregar</a>
        </h3>

      <table class="table" id="experiences-table">
          <thead>
            <tr>
              <th>Compañia</th>
              <th>Puesto</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($experiences as $experience)
              <tr>
                <td> {{ $experience->company }} </td>
                <td> {{ $experience->title }} </td>
                <td> {{ $experience->start }} </td>
                <td> {{ $experience->end }} </td>
                <td>
                    <a class="btn btn-success glyphicon glyphicon-edit" href="{{ route('edit_experience', [$experience->id]) }}" role="button"></a>
                    <a class="btn btn-danger glyphicon glyphicon-remove ajax-modal-dialog" href="{{ route('delete_experience', [$experience->id]) }}" role="button"></a> 
                </td>

              </tr>
              @endforeach
          </tbody>
      </table>
      
</div>
@stop