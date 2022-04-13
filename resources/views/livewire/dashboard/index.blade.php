@section('title','dashboard')

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Index</a></div>
            </div>
        </div>
        @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalAdmin }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Barang Masuk</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalBarangMasuk }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Barang Keluar</h4>
                  </div>
                  <div class="card-body">
                    {{ $totalBarangKeluar }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-warehouse"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Barang</h4></h4>
                  </div>
                  <div class="card-body">
                    {{ $totalBarang }}
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>