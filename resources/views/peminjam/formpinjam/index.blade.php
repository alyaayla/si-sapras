@extends('layout.app_peminjam')
@section('content')
<section id="hero" class="d-flex align-items-center">

    <div class="container">

        <div class="card shadow mb-4">
                
        
        <div class="card-body">
            
            <div class="table-responsive">
                
                <div class="card-body">
                    <h1 class="mb-2">Form Peminjaman</h1>
                    <form method="post" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                        @csrf
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="text" placeholder="Enter Tanggal" required>
                                </div>
        
                                <div class="form-group">
                                    <label for="ruangan">Pilih Ruangan</label>
                                    <select class="form-control select2" id="ruangan_id" name="ruangan_id" required>
                                    {{-- <option selected disabled>Pilih Ruangan</option>
                                    @foreach ($ruangan as $item)
                                        @if ( old('ruangan_id') == $item->id )
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach --}}
                                    </select>
                                </div>
        
                                <div class="mb-3">
                                    <label for="namasapras" class="form-label">Nama Sapras</label>
                                    <div class="nama_sapras"></div>
                                </div>
        
                                <div class="form-group">
                                    <label for="nama_peminjam">Nama Peminjam</label>
                                    <input type="text" name="nama_peminjam" class="form-control" id="text" placeholder="Enter Nama Peminjam" required>
                                </div>
            
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                    <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        
        </div>

@endsection('content')
