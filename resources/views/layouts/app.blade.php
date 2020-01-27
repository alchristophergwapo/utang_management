<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Utang Management</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">

    <!-- <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style> -->
</head>

<body id="app-layout">
    <div class="fixed-top">
        <header class="topbar">
            <div class="container">
                <div class="row">
                    <!-- social icon-->
                    <div class="col-sm-12">
                        <ul class="social-network">
                            <li><a class="waves-effect waves-dark" href="#"><i class=" fa fa-facebook"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
            <div class="container">
                <a class="navbar-brand" href="" style="text-transform: uppercase;">Utang Management</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Listahan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#menu1">Tinda</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('search')  }}">
                        <!-- {{ csrf_field() }} -->
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button type="button submit" class="btn btn-outline-success my-2 my-sm-0"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="navbar-nav float-right">
                        <a href="#" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="content">
        @yield('content')
        @yield('modal')
    </div>

    <div class="jumbotron text-center footer" style="margin-bottom:0">
        <div class="footer-copyright text-center py-3">© 2020 Copyright: Christopher Alonzo</div>
    </div>

    <!-- JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
    $(document).ready(function() {
        $('#items').DataTable({
            "paging": false // false to disable pagination (or any other option)
        });
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
</body>

</html>