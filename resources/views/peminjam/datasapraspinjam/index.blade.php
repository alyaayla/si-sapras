@extends('layout.app_peminjam')
@section('content')
<section id="hero" class="d-flex align-items-center">

    
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
                        <td>{{ $data->sapras->namasapras }}</td>
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
@endsection('content')
