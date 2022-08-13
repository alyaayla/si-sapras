@extends('layout.app_peminjam')
@section('content')
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="card-body">
                        <h1 class="mb-2">Form Peminjaman</h1>
                        <form method="post" action="{{ route('form.peminjam.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="tanggal" class="py-1">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="text"
                                    placeholder="Enter Tanggal" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ruangan" class="py-1">Pilih Ruangan</label>
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
                            <div class="form-group mb-3">
                                <label for="namasapras" class="form-label py-1">Nama Sapras</label>
                                <div class="nama_sapras"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_peminjam" class="py-1">Nama Peminjam</label>
                                <input type="text" name="nama_peminjam" class="form-control" id="text"
                                    placeholder="Enter Nama Peminjam" required>
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
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#ruangan_id').on('change', function () {
            var categoryID = $(this).val();
            if (categoryID) {
                $.ajax({
                    url: '/getSarpas/' + categoryID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $('.nama_sapras').empty();
                            var costumHtml = '';
                            $.each(data, function (key, ruangan) {
                                costumHtml = costumHtml +
                                    '<div class="d-flex flex-row ml-4"><input class="form-check-input" name="sapras_id[]" type="checkbox" value="' +
                                    ruangan.id +
                                    '" id="flexCheckDefault"><label class="form-check-label text-capitalize" for="flexCheckDefault">' +
                                    ruangan.namasapras +
                                    ' <input type="text" name="qty[]" class="form-control" id="text" placeholder="Enter Qty" ></label></div>';
                                // $('select[name="sapras_id"]').append('<option value="'+ ruangan.id +'">' + ruangan.namasapras+ '</option>');
                            });
                            $('.nama_sapras').append(costumHtml);
                        } else {
                            $('.nama_sapras').empty();
                        }
                    }
                });
            } else {
                $('#course').empty();
            }
        });
    });

</script>

@endsection('content')
