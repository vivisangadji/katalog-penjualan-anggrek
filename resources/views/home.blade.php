<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Katalog Anggrek</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('template/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
<body>
    
<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4 fw-bold">Toko Katalog Anggrek</span>
    </a>
    </header>

</div>

<section>
<div class="text-center container py-5">
    <h4 class="mt-4 mb-5"><strong>List Bunga Anggrek</strong></h4>

    <div class="row">
        @if($jumlahBarang > 0)
            @foreach($barangs as $key => $value)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="{{ asset($value->gambar) }}"
                        class="w-100" />
                        <a href="#!">
                        <div class="mask">
                            <div class="d-flex justify-content-start align-items-end h-100">
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $value->nama_barang }}</h5>
                        <p>{{ $value->keterangan }}</p>
                        <h6 class="mb-3">Rp. {{ number_format($value->harga) }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h1 class="text-bold">Barang kosong</h1>
        @endif
    </div>
</div>
</section>

<footer class="p-3 text-center text-muted border-top bg-dark">
      &copy; 2022
</footer>

</body>
</html>