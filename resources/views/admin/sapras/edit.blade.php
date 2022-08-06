@extends('layouts.app_admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data sapras</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('sapras.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
                <br>
                <div class="card-body">
                <form action="{{ route('sapras.update', $sapra->id)}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="ruangan">Pilih Ruangan</label>
                            <select class="form-control select2" name="ruangan_id" required>
                            <option selected disabled>Pilih Ruangan</option>
                            @foreach ($ruangan as $item)
                                @if ( $sapra->ruangan->id == $item->id )
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="kode">Kode SAPRAS</label>
                            <input type="text" name="kode" class="form-control" value="{{$sapra->kode}}" id="text" placeholder="Enter Kode SAPRAS" required>
                        </div>

                        <div class="form-group">
                            <label for="namasapras">Nama SAPRAS</label>
                            <input type="text" name="namasapras" class="form-control" value="{{$sapra->namasapras}}" id="text" placeholder="Enter Nama SAPRAS" required>
                        </div>

                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="text" name="qty" class="form-control" value="{{$sapra->qty}}" id="text" placeholder="Enter Qty" required>
                        </div>

                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" name="satuan" class="form-control" value="{{$sapra->satuan}}" id="text" placeholder="Enter Satuan" required>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <div><img src="/image/{{ $sapra->gambar }}" width="100px"></div>
                            <input type="file" name="gambar" class="form-control" id="text" placeholder="Enter Gambar">
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
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection('content')