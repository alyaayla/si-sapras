<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Si-Sapras An-Nadhir</title>
        @include('include.stylepeminjam')
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-lower">SI-SAPRAS</span>
                <span class="site-heading-upper text-primary mb-3">Sistem Peminjaman Sarana dan Prasarana</span>
                <span class="site-heading-upper text-primary mb-3">Yayasan Pendidikan An-Nadhir</span>
            </h1>
        </header>
        <!-- Navigation-->
        @include('include.navbarpeminjam')
        @yield('content')
        
        @include('include.footerpeminjam')

        @include('include.scriptpeminjam')
    </body>
</html>
