<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Simatra</title>
        <meta content="Simatra adalah aplikasi terpadu pda PT Denpasar untuk bagian kepaniteraan" name="description" />
        <meta content="PT Denpasar" name="author" />
        <link rel="shortcut icon" href="{{ asset('template_assets') }}/images/favicon.ico">

        <link rel="stylesheet" href="{{ asset('template_assets') }}/plugins/morris/morris.css">

        <link href="{{ asset('template_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('template_assets') }}/css/icons.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('template_assets') }}/css/style.css" rel="stylesheet" type="text/css">
        @stack('header')
            
    </head>

    <body>

        <!-- Navigation Bar-->
       <x-layout.navbar />
        <!-- End Navigation Bar-->

        <!-- page wrapper start -->
        <div class="wrapper">
            <div class="page-title-box">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="state-information d-none d-sm-block">
                                {{-- <div class="state-graph">
                                    <div id="header-chart-1"></div>
                                    <div class="info">Balance $ 2,317</div>
                                </div>
                                <div class="state-graph">
                                    <div id="header-chart-2"></div>
                                    <div class="info">Item Sold 1230</div>
                                </div> --}}
                            </div>
                           
                            <h4 class="page-title">{{ $page_title }}</h4>
                            <ol class="breadcrumb">
                                
                                <x-partial.breadcrumbs :breadcrumbs="$breadcrumbList" />
                            </ol>

                        </div>
                    </div>
                </div>
                <!-- end container-fluid -->
            
            </div>
            <!-- page-title-box -->

            {{ $slot }}
            <!-- end page content-->

        </div>
        <!-- page wrapper end -->

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        2024 © Simatra <span class="d-none d-sm-inline-block"> - PT Denpasar</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <!-- jQuery  -->
        <script src="{{ asset('template_assets') }}/js/jquery.min.js"></script>
        <script src="{{ asset('template_assets') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('template_assets') }}/js/jquery.slimscroll.js"></script>
        <script src="{{ asset('template_assets') }}/js/waves.min.js"></script>

        <script src="{{ asset('template_assets') }}/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        
        @stack('footer')

      
        <!-- App js -->
        <script src="{{ asset('template_assets') }}/js/app.js"></script>
        @include('sweetalert::alert')

    </body>

</html>