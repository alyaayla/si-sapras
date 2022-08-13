@extends('layout.app_peminjam')
@section('content')
<section id="hero" class="d-flex align-items-center">

    <div class="container">

        <!-- Page Heading -->
       
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <h1 class="mb-2 ">Tabel Data Sarana dan Prasarana</h1>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="60%" cellspacing="0">
                        
                            <tr>
                                
                                <th>Kode</th>
                                <th>Nama Sapras</th>
                                <th>Ruangan</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Gambar</th>
                                {{-- <th>Tanggal</th> --}}
                                {{-- <th>Action</th> --}}
                            </tr>
                       
                        <tfoot>
                       <tbody>
                       @forelse ($saprass as $sapras)
                    <tr>
                        <td>{{ $sapras->kode }}</td>
                        <td>{{ $sapras->namasapras }}</td>
                        <td>{{ $sapras->ruangan->name }}</td>
                        <td>{{ $sapras->qty }}</td>
                        <td>{{ $sapras->satuan }}</td>
                        <td><img src="/image/{{ $sapras->gambar }}" width="100px"></td>
                        {{-- <td>{{ $sapras->created_at->format('d-m-Y') }}</td> --}}
                        {{-- <td class="text-center">
                            <a href="{{ route('sapras.edit', $sapras->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <form action="{{ route('sapras.destroy', $sapras->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                            </form>
                        </td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">Data post tidak tersedia</td>
                    </tr>
                    @endforelse
                        </tbody> 
                        </tfoot> 
                    </table>
                </div>
            </div>
        </div>



@endsection('content')
