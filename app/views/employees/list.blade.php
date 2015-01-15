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
          <div id="navigation">
            @if ($employee->assistance)
              <a class="btn btn-default glyphicon glyphicon-unchecked ajax-check hide" id="{{$employee->id}}check" href="" role="button"> Marcar</a>
              <a class="btn btn-success glyphicon glyphicon-ok ajax-uncheck" id="{{$employee->id}}uncheck" href="{{ route('delete_attendance',[$employee->assistance,$employee->id]) }}" role="button"> Asistió</a>
            @else
              <a class="btn btn-default glyphicon glyphicon-unchecked ajax-check" id="{{$employee->id}}check" href="{{ route('attendance', [$employee->id]) }}" role="button"> Marcar</a>
              <a class="btn btn-success glyphicon glyphicon-ok ajax-uncheck hide" id="{{$employee->id}}check" href="" role="button"> Asistió</a>
            @endif
          </div>
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
         var id = $(link).attr('id');
         var i =  parseInt(id);
         $('#'+i+'uncheck').attr('href', data);
         $('#'+i+'uncheck').removeClass('hide');
         $(link).toggleClass('hide');
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
         console.log($(link));
         var id = $(link).attr('id');
         var i =  parseInt(id);
         $('#'+i+'check').attr('href', data);
         $('#'+i+'check').removeClass('hide');
         $(link).toggleClass('hide');
    }
  });
  return false;
});
</script>
@stop
