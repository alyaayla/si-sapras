@extends('layout.app_peminjam')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <!-- Page Heading -->
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> -->
        <!-- DataTales Example -->
        <div class="card shadow my-2">
            <div class="card-body">
                <h1 class="h3 mb-4 text-gray-800">Tabel Data Peminjaman</h1>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datapinjam" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name Peminjam</th>
                                <th>Tanggal</th>
                                <th>Ruangan</th>
                                <th>Sapras</th>
                                <th>Status</th>
                                <th>Cetak</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tbody>
                                @forelse ($peminjaman as $pinjam)
                                <tr>
                                    <td>{{ $pinjam->nama_peminjam }}</td>
                                    <td>{{ $pinjam->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $pinjam->ruangan->name }}</td>
                                    <td>
                                        <a href="/datasapraspinjam/{{$pinjam->id}}" class="btn btn-primary btn-sm">
                                            Data Barang
                                        </a>
                                    </td>
                                    <td>{{ $pinjam->status }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('peminjaman.edit', $pinjam->id)}}"
                                            class="btn btn-warning btn-sm "><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#datapinjam').DataTable();
} );
</script>
@endsection('content')
