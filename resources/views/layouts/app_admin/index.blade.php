@extends('layouts.app_admin.app')

@section('content')
<!-- ============================================================== -->
<!-- Three charts -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Barang</h3>
            <ul class="list-inline ms-2 mb-0">
                <li class="ms-auto"><span class="counter text-success"><i class="fas fa-shopping-cart"></i> {{$barangs}}</span></li>
            </ul>
        </div>
    </div>
</div>
@endsection