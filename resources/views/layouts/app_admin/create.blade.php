@extends('layouts.app_admin.app')

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data" class="form-horizontal form-material">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Nama Barang</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input name="nama_barang" type="text" placeholder="Isi nama barang..."
                                class="form-control p-0 border-0"> </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Harga</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input name="harga" type="text" placeholder="Isi harga..."
                                class="form-control p-0 border-0">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Keterangan Barang</label>
                        <div class="col-md-12 border-bottom p-0">
                            <textarea name="keterangan" rows="2" class="form-control p-0 border-0"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Gambar</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input name="gambar" type="file"
                                class="form-control p-0 border-0">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                                <i class="fas fa-save"></i>
                            </button>
                            <a href="{{ route('barang.index') }}" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white">
                                    <span class="text">Batal</span>
                                    <i class="fas fa-window-close"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection