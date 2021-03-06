<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('image/favicon.ico') }}">

    <title>AdminRH</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('dashboard.css') }}" rel="stylesheet">
    @yield('extra-css')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AdminRH</a>
        </div>
        <div class="navbar-collapse collapse">
        @if (Auth::check())
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="icon icon-wh i-profile"></span> {{ Auth::user()->full_name }}  <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('account') }}">Editar usuario</a></li>
                        <li><a href="{{ route('logout') }}">Salir</a></li>
                    </ul>
                </li>
            </ul>
        @else
            {{ Form::open(['route' => 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-right']) }}
                @if (Session::has('login_error'))
                    <span class="label label-danger">Credenciales no válidas</span>
                @endif
                <div class="form-group">
                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) }}
                </div>
                <div class="checkbox">
                    <label style="color:white">
                        {{ Form::checkbox('remember') }} Recordarme
                    </label>
                </div>
                <button type="submit" class="btn btn-success">Iniciar sesión</button>
            {{ Form::close() }}
        @endif
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
            @if (is_admin())
               <li><a href="{{ route('users') }}">Usuarios</a></li>
            @endif
            <li><a href="{{ route('positions') }}">     Vacantes    </a></li>
            <li><a href="{{ route('candidates') }}">    Candidatos  </a></li>
            <li><a href="{{ route('employees') }}">     Empleados   </a></li>
            <li><a href="{{ route('titles') }}">        Puestos     </a></li>
            <li><a href="{{ route('centers') }}">       Centros de Servicio </a></li>
            <li><a href="{{ route('report') }}">        Reporte de Empleados</a></li>
            <li><a href="{{ route('list') }}">          Lista de asistencia </a></li>
            <li><a href="{{ route('report_list') }}">   Reporte de asistencia</a></li>
          </ul>
        </div>
        <div class="modal fade" id="modal-dialog" role="dialog" data-backdrop="static" data-keyboard="false"></div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <div class="alert alert-{{ $msg }}">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('alert-' . $msg) }}</div>
          @endif
        @endforeach
        </div>

         @yield('content')
       </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
    $(document).on('click', 'a.ajax-modal-dialog', function(e) {
        e.preventDefault();
        console.log("clicked");
        url = $(this).attr('href');
        $('#modal-dialog').load(url);
        $('#modal-dialog').modal('show');
    });
    </script>
    @yield('extra-js')
  </body>
</html>