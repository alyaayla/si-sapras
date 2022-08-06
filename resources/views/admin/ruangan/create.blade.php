@extends('layouts.app_admin')
@section('content')
<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text primary">Tambah Data Ruangan</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <a href="{{ route('ruangan.index') }}" class="btn btn-warning btn-sm ml-auto">Kembali</a>
        <br>
        <div class="card-body">
            <form method="post" action="{{ route('ruangan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                            <label for="name">Nama Ruangan</label>
                            <input type="text" name="name" class="form-control" id="text" placeholder="Enter Nama Ruangan" required>
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
<!-- /.container-fluid -->
@endsection('content')