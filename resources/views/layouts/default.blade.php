<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>IMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico" >
        <link rel="icon" href="animated_favicon.gif" type="image/gif" >
        <!-- Styles -->

    </head>
    <body>
<!--        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Innovi</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Page 1</a></li>
              <li><a href="#">Page 2</a></li>
              <li><a href="#">Page 3</a></li>
            </ul>
          </div>
        </nav>
          
        <div class="container">
          <center><h1>Innovi Management System</h1></center>
          <center><h4>ukku mukku chukku</h4></center>
        </div>
        @yield('content') -->

        <!-- ---------------------------- -->


        <div class="container">
        <div class="row">
            @if (Auth::guest())
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="pull-left" href="#"><img src="/img/logo.png"></a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                            </ul> 
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/auth/register">Register</a></li>
                                <li><a href="/auth/login">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            @endif
        </div>
        @yield('menu')
        <div class="row centered" id="content">
            @yield('content')
        </div>
    </div>
    <div class="footer" id="footer">
        <div class="navbar-inner">
            <div class="container text-center">
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="/">© INNOVI</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>