@extends('layout')

@section('extra-css')
<link href="{{ asset('bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Dar Baja</h1>

            @include('employees.header-employee-title')

            @if ($employee->status_id == 1)
            <div class="alert alert-danger" role="alert">
              <span> Este empleado ya está dado de baja.</span>
            </div>

            @elseif ($job == 0)
            <div class="alert alert-danger" role="alert">
              <span> Este empleado debe ser eliminado por el administrador.</span>
            </div>

            @elseif ($personal > 0)
            <div class="alert alert-danger" role="alert">
              <span> Este empleado tiene personal a su cargo, no puede ser dado de baja.</span>
            </div>

            @else

            {{ Form::open(['route' => array('save_new_layoff', $employee->id), 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

            {{ Field::text('date', $today, ['id' => 'date', 'class'=>'datepicker']) }}

            {{ Field::text('reason') }}

            {{ Field::textarea('comments') }}

            <p>
                <input type="submit" value="Dar Baja" class="btn btn-danger">
            </p>

            {{ Form::close() }}
            @endif

        </div>
    </div>
</div>

@endsection


@section('extra-js')
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.es.js') }}"></script>
<script>
$(document).ready(function(){ 
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: "es",
        startView: 1,
        todayHighlight: true,
        todayBtn: true,
        autoclose: true
    });
});
</script>
@endsection