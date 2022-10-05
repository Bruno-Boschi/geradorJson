<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title')</title>

    <!-- Bootstrap core CSS -->
    {{-- <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ URL('assets/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/estilos.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    {{-- <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet"> --}}
</head>

<body style="max-height:800px;
overflow-y:auto;">

    @yield('content')

    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

</body>

</html>
