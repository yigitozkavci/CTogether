<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>C2ogether - Workspace</title>

    <!-- Bootstrap core CSS -->
    <link href="/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/libs/sumoselect/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>
    <body>
        <nav class="header">

        </nav>
        <nav class="sidebar hidden" data-open="true">
            <div class="sidebar-heading">
                <div class="close-icon"><i class="fa fa-times"></i></div>
                <div class="sidebar-logo">C<sup>2</sup>ogether</div>
            </div>
            <div class="clearfix"></div>
            <h2 class="rooms-heading">Rooms</h2>
            <div class="rooms">
                <div class="room border-red">
                    <span>Math</span>
                    <div class="people-online-in-room">
                        <i class="fa fa-user"></i> 233
                    </div>
                </div>
                <div class="room border-blue">
                    <span>Electronics</span>
                    <div class="people-online-in-room">
                        <i class="fa fa-user"></i> 13
                    </div>
                </div>
                <div class="room border-green">
                    <span>Chemistry</span>
                    <div class="people-online-in-room">
                        <i class="fa fa-user"></i> 81
                    </div>
                </div>
                <div class="room border-yellow">
                    <span>Boun EE210</span>
                    <div class="people-online-in-room">
                        <i class="fa fa-user"></i> 134
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
                @yield('content')
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    </body>
</html>
