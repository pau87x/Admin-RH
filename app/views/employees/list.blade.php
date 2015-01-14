@extends('layouts')

@section('content')

<h1 class="page-header">Lista de Asistencia {{ date('d/m/Y') }}</h1>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <!-- <th>Nombre Completo</th> -->
        <!-- <th>Puesto</th> -->
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee)
      <tr>
        <td>{{ $employee->code }}</td>
<!--         <td>@{{ $employee->full_name }}</td>
        <td> @{{ $employee->title }} </td> -->
        <td>
          {{ $employee->assistance }}  
          <!--- route('delete_attendance', [$employee->id,$employee->assistance]) }} -->
          @if ($employee->assistance)
          <div class="pull-right">
            <a class="btn btn-success glyphicon glyphicon-ok ajax-uncheck" href="{{ route('delete_attendance',[$employee->assistance,$employee->id]) }}" role="button"> Asistió</a>
          </div>
          @else
          <div class="pull-right">
            <a class="btn btn-default glyphicon glyphicon-unchecked ajax-check" href="{{ route('attendance', [$employee->id]) }}" role="button"> Marcar</a>
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

@section('extra-js')
<script type="text/javascript">
$(".ajax-check").click (function () {
    var href = $(this).attr("href");
    console.log("clicked");
   var link = $(this);
  $.ajax({
    type: "GET",
    url: href,
    success: function(data){
         console.log($(link));
         $(link).removeClass('btn-default');
         $(link).addClass('btn-success');
         $(link).text(' Asistió');
         $(link).removeClass('glyphicon-unchecked');
         $(link).addClass('glyphicon-ok');
         $(link).attr("href", data);
         $(link).removeClass('ajax-check');
         $(link).addClass('ajax-uncheck');
         //console.log(data);
    }
  });
  return false;
});

$(".ajax-uncheck").click (function () {
    var href = $(this).attr("href");
    console.log("uncheck");
    var link = $(this);
  $.ajax({
    type: "GET",
    url: href,
    success: function(data){
         $(link).removeClass('btn-success');
         $(link).addClass('btn-default');
         $(link).text(' Marcar');
         $(link).addClass('glyphicon-unchecked');
         $(link).removeClass('glyphicon-ok');
         $(link).attr("href", data);
         $(link).addClass('ajax-check');
         $(link).removeClass('ajax-uncheck');
         //console.log(data);
    }
  });
  return false;
});
</script>
@stop
