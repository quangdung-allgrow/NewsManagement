<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- vex --}}
    <link href="{{ asset('plugins/vex/css/vex.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/vex/css/vex-theme-os.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('app/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('app/css/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('style')
</head>

<body>
    @include('partials.nav-top')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                @include('partials.nav-sidebar')
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/notification-growl/jquery.bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('plugins/vex/js/vex.combined.min.js') }}"></script>
    <script src="{{ asset('app/js/loading.js') }}"></script>
    <script>vex.defaultOptions.className = 'vex-theme-os'</script>
    {{-- show error --}}
    @include('partials.error-messages')
    @include('partials.messages')
    @yield('script')
</body>

</html>