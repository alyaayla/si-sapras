@extends('layouts.app_admin')
@section('content')
<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text primary">Tambah Data Peminjaman</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <a href="{{ route('peminjaman.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
        <br>
        <div class="card-body">
            <form method="post" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="text" placeholder="Enter Tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="ruangan">Pilih Ruangan</label>
                            <select class="form-control select2" id="ruangan_id" name="ruangan_id" required>
                            <option selected disabled>Pilih Ruangan</option>
                            @foreach ($ruangan as $item)
                                @if ( old('ruangan_id') == $item->id )
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
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


<!-- <script>
$( document ).ready(function() {    
    // console.log( "Halo Alya!" );
});
</script> -->
<!-- /.container-fluid -->

<script>
    $(document).ready(function() {
    $('#ruangan_id').on('change', function() {
        var categoryID = $(this).val();
        if(categoryID) {
            $.ajax({
                url: '/getSarpas/'+categoryID,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                    var costumHtml = '';
                    $.each(data, function(key, ruangan){
                        costumHtml = costumHtml + '<div class="d-flex flex-row ml-4"><input class="form-check-input" name="sapras_id[]" type="checkbox" value="'+ ruangan.id +'" id="flexCheckDefault"><label class="form-check-label text-capitalize" for="flexCheckDefault">' + ruangan.namasapras+ ' <input type="text" name="qty[]" class="form-control" id="text" placeholder="Enter Qty" ></label></div>';
                        // $('select[name="sapras_id"]').append('<option value="'+ ruangan.id +'">' + ruangan.namasapras+ '</option>');
                    });
                    $('.nama_sapras').append(costumHtml);
                }else{
                    $('#course').empty();
                }
                }
            });
        }else{  
            $('#course').empty();
        }
    });
    });
</script>
@endsection('content')