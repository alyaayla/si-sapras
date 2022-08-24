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
                                    <td>{{ $pinjam->user->name }}</td>
                                    <td>{{ $pinjam->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $pinjam->ruangan->name }}</td>
                                    <td>
                                        <a href="#" id="{{ $pinjam->id }}" class="btn btn-primary showSapras btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Data Barang
                                        </a>
                                    </td>
                                    <td>{{ $pinjam->status }}</td>
                                    <td class="text-center">
                                        <a href="/print/{{$pinjam->id}}" class="btn btn-warning btn-sm "><i
                                                class="fa fa-print"></i></a>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="editFile">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datapinjam').DataTable();
    });

    $("#exampleModal").on("hidden.bs.modal", function (e) {
        console.log("Modal hidden");
        $(".editFile").html("");
    });

    $(function () {
        // edit employee ajax request
        $(document).on('click', '.showSapras', function (e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('datapinjam.detail') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    var customHtml = '';
                    $.each(response, function (i, item) {
                        customHtml = customHtml + '<div class="form-group"></div><div class="form-group"><label for="qty" class="col-form-label">Barang:</label><input type="text" value="'+ response[i].sapras.namasapras +'" class="form-control" id="qty"></div><div class="form-group"><label for="qty" class="col-form-label">Jumlah:</label><input type="text" value="'+ response[i].qty +'" class="form-control" id="qty"></div>';
                        });
                    $('.editFile').append(customHtml);
                }
            });
        });
    });

 $(document).on('click', '.hapusPinjam', function (e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: "Kamu yakin?",
                text: "Ingin menghapus data peminjaman!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Kembali!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.deletePinjam') }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function (response) {
                            console.log(response);
                            Swal.fire(
                                'Berhasil!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            fetchAllEmployees();
                        }
                    });
                }
            });
        });
</script>
@endsection('content')
