@extends('layouts.app_admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Data Ruangan</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a href="{{route('ruangan.create')}}" class="btn"><i class="fa fa-plus"></i> create</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Nama Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tbody>
                            @forelse ($ruangan as $ruang)
                            <tr>
                                <td>{{ $ruang->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('ruangan.edit', $ruang->id)}}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" id="{{ $ruang->id }}" class="btn btn-danger btn-sm hapusRuangan"><i
                                            class="fa fa-trash"></i></a>
                                    {{-- <form action="{{ route('ruangan.destroy', $ruang->id)}}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form> --}}
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.hapusRuangan', function (e) {
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
                        url: '{{ route('admin.deleteRuangan') }}',
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
                            );
                            window.location.reload();
                        }
                    });
                }
            });
        });
</script>
@endsection('content')
