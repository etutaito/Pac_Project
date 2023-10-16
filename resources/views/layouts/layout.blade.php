<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pacific Dictionary Translate</title>
        <!-- Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/favicon-16x16.png') }}">
        <link rel="manifest" href="{{asset('images/site.webmanifest') }}">
        <link rel="mask-icon" href="{{asset('images/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
      
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/images/P Logo.svg') }}" alt="" height="80px"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dictionary') }}">Dictionary</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/translation') }}">Translation</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                            <li class="nav-item">
                                <form action="/logout" class="inline" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-box-arrow-right"> Logout</i>
                                    </button>
                                </form>
                            </li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- View Output --}}
            
            @yield('content')

              <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Pacific Dictionary Translate 2023</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="{{ url('/privacy') }}">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="{{ url('/terms') }}">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="{{ url('/contact') }}">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        {{-- <script src="js/scripts.js"></script> --}}
        @if(session()->has('message'))
        <div class="alert alert-success position-absolute top-50 start-50" role="alert">
          <p>
            {{session('message')}}
          </p>
        </div>
        @endif
        <script type="text/javascript">
            setTimeout(function () {
    
                // Closing the alert
                $('.alert').alert('close');
            }, 5000);
        </script>
    </body>
</html>