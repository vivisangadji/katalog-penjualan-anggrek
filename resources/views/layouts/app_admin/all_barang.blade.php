@extends('layouts.app_admin.app')

@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-sm-12">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif
        <h3 class="box-title">Table Barang</h3>
        <div class="white-box">
            <a href="{{ route('barang.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-square"></i>
                Tambah Barang
            </a>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Nama Barang</th>
                            <th class="border-top-0">Keterangan</th>
                            <th class="border-top-0">Harga</th>
                            <th class="border-top-0">Gambar</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allBarang as $key => $value)
                        <tr>
                            <td></td>
                            <td>{{ $value->nama_barang }}</td>
                            <td>{{ $value->keterangan }}</td>
                            <td>Rp. {{ number_format($value->harga) }}</td>
                            <td>
                                <img src="{{ asset($value->gambar) }}" alt="{{ $value->nama_barang }}" width="100">
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('barang.edit', $value->id) }}" class="btn btn-info btn-circle btn-sm text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('barang.destroy', $value->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@endsection