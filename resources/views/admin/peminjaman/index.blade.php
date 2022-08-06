@extends('layouts.app_admin')
@section('content')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Peminjaman</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <a href="{{route('peminjaman.create')}}" class="btn"><i class="fa fa-plus"></i> create</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name Peminjam</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Sapras</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
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
                                        <a href="/sapras_pinjam/{{$pinjam->id}}" class="btn btn-primary btn-sm">
                                            Data Barang
                                        </a>
                                    </td>
                                    <td>{{ $pinjam->status }}</td>
                                    <td class="text-center">
                                        <!-- <a href="{{ route('peminjaman.edit', $pinjam->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->

                                        <form action="{{ route('peminjaman.destroy', $pinjam->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        </form>
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
@endsection('content')

