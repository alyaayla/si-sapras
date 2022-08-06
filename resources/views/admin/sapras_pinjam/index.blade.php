@extends('layouts.app_admin')
@section('content')
<div class="container-fluid">

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

