<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ambulance | Dispatch') }}</title>

        <!-- DataTables -->
        <link href="{{ asset('vendor/assets/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/assets/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>


        <link href="{{ asset('vendor/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/assets/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="ex-page-content text-center">
                <h1 class="text-dark">404!</h1>
                <h2 class="text-dark-50">Sorry, page not found</h2><br>

                <a class="btn btn-primary waves-effect waves-light" href="{{ route('supervisor.index') }}">Back to Dashboard</a>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('vendor/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/detect.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/waves.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('vendor/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Datatables-->
        <script src="{{ asset('vendor/assets/plugins/datatables/dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/assets/pages/datatables.init.js') }}"></script>

        <script src="{{ asset('vendor/assets/pages/dashborad.js') }}"></script>

        <script src="{{ asset('vendor/assets/js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        @yield('scripts')

    </body>
</html>






