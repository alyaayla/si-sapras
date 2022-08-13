<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Appland Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets1/img/favicon.png" rel="icon">
    <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets1/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets1/css/style.css" rel="stylesheet">
    <link href="{{ asset('../css/iziToast.css') }}" rel="stylesheet">
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">



    <!-- =======================================================
  * Template Name: Appland - v4.7.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="peminjam">SI-SAPRAS</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets1/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="datasapras">Data SAPRAS</a></li>
                    <li><a class="nav-link scrollto active" href="formpinjam">Form Peminjaman</a></li>
                    <li><a class="nav-link scrollto active" href="datapinjam">Data Peminjaman</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
              <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
              <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="#">Drop Down 1</a></li>
                  <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="#">Deep Drop Down 1</a></li>
                      <li><a href="#">Deep Drop Down 2</a></li>
                      <li><a href="#">Deep Drop Down 3</a></li>
                      <li><a href="#">Deep Drop Down 4</a></li>
                      <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Drop Down 2</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
                </ul>
              </li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                    <li><a class="getstarted scrollto" href="{{ url('/logout') }}">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- End #main -->
    {{-- <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <!-- Page Heading -->
            <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> -->
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabel Data Barang yang Dipinjam</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Jumlah Pinjam</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tbody>
                                    @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $data->qty }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Data tidak tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <!-- <div class="footer-top">
          <div class="container">
            <div class="row">
    
             <div class="col-lg-5 col-md-7 footer-contact">
                <h3>Appland</h3>
                <p>
                  A108 Adam Street, New York, NY 535022, United States<br>
                  <strong>Phone:</strong> +1 5589 55488 55<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>
              </div> 
    
              
    
              
    
            </div>
          </div>
        </div> -->

        {{-- <div class="container py-4">
          <div class="copyright">
            &copy; Copyright <strong><span>Appland</span></strong>. All Rights Reserved
          </div>
          
        </div> --}}
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets1/vendor/aos/aos.js"></script>
    <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets1/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets1/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets1/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets1/js/main.js"></script>
    <script src="{{ asset('../js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
</body>

</html>
