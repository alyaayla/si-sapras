<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Appland Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('include.stylepeminjam')

    <!-- =======================================================
  * Template Name: Appland - v4.7.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('include.navbarpeminjam')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- End #main -->
    @yield('content')
    <!-- ======= Footer ======= -->
    @include('include.footerpeminjam')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('include.scriptpeminjam')
    @include('vendor.lara-izitoast.toast')
</body>

</html>
