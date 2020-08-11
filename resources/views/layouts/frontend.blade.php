<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Time</title>
    <!-- plugin css for this page -->
    <link
        rel="stylesheet"
        href="{{ asset('./assets/vendors/mdi/css/materialdesignicons.min.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/dist/aos.css/aos.css') }}" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
</head>

<body>

    @yield('content')

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('assets/vendors/aos/dist/aos.js/aos.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('./assets/js/demo.js') }}"></script>
    <script src="{{ asset('./assets/js/jquery.easeScroll.js') }}"></script>
    <!-- End custom js for this page-->
</body>
</html>
