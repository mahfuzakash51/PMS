<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
        @yield('title')
        </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        @yield('css')
    </head>
    <body class="sb-nav-fixed">
        @include('admin.layouts.header')
        <div id="layoutSidenav">
            @include('admin.layouts.sidebar')
            <div id="layoutSidenav_content">
                <main class="p-4">
                    {{-- //alert --}}
                    @if (\Session::has('success'))
                        <div class="alert alert-primary" role="alert">
                            {!! \Session::get('success') !!}
                        </div> 
                    @endif
                    

                    @if (auth()->user()->role === 'MANAGER')
                        @yield('content')   
                    @else
                        <div class="card p-4 my-5 text-center text-danger">
                            <b>Please login as manager</b>
                        </div>   
                        
                        <div class="d-none">
                            @yield('content') 
                        </div>
                    @endif
                  
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            {{-- <div class="text-muted">Copyright &copy; Your Website 2023</div> --}}
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        @yield('js')

        <script>
            $(".alert").delay(4000).slideUp(200, function() {
                $(this).alert('close');
            });
        </script>
    </body>
</html>
