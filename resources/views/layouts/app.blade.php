<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title','Support Ticket')</title>
    @livewireStyles
    @powerGridStyles

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Support Ticket</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-link" href="{{route('user')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-link" href="{{route('clients')}}">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-link" href="{{route('tasks')}}">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-link" href="{{route('inwards')}}">Inwards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-link" href="{{route('ridfs')}}">RIDFs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-link" href="{{route('products')}}">products</a>
                </li>
            </ul>
        </div>

    </nav>

    @yield('content')

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- after -->
    @powerGridScripts

  </body>
</html>
