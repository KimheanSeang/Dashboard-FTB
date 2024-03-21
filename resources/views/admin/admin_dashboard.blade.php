<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
    {{-- link styles for setting --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/setting/setting.css') }}"> --}}
    {{-- end link styles for setting --}}
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->


    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/alert/alert-type.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for this page -->

    <style>
        .table> :not(caption)>*>* {
            padding: 0.2rem 0.85rem;
        }

        .modal-backdrop.show {
            backdrop-filter: blur(5px);
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/css/animation/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/profile/profile.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

</head>


<body>

    <div class="main-wrapper">

        @include('admin.body.sidebar')

        @include('setting.setting')


        <div class="page-wrapper">

            @include('admin.body.header')

            <div class=" animate__animated animate__fadeInDown">
                @yield('admin')

            </div>
            {{-- @yield('admin') --}}


            @include('admin.body.footer')
        </div>

    </div>

    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <script src="{{ asset('assets/js/chat.js') }}"></script>


    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->


    {{-- active for sidebar --}}
    <script src="{{ asset('assets/js/active.js') }}"></script>
    {{-- end active for sidebar --}}


    <!-- Custom js for this page -->


    <script src="{{ asset('assets/js/jquery.flot-light.js') }}"></script>
    <!-- End custom js for this page -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    {{-- <script src="{{ asset('assets/js/sweet-alert.js') }}"></script> --}}

    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/code/code.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <!-- End custom js for this page -->
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.categories.js') }}"></script>


    <script src="{{ asset('assets/js/dashboard-light.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs-light.js') }}"></script>
    <script src="{{ asset('assets/js/morrisjs-light.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts-light-rtl.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts-light.js') }}"></script>
    <script src="{{ asset('assets/js/sortablejs-light.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
</body>

</html>
