<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">KLIKIT TOYS</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">KT</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="{{ route('home.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              {{-- <li><a class="nav-link" href="{{ route('penjualan.index') }}">Penjualan</a></li> --}}
            </ul>
            <li class="nav-item dropdown">
              <a href="#" class=" nav-link has-dropdown"><i class="fas fa-store"></i><span>Master Data</span></a>
              <ul class="dropdown-menu">
                @if (Auth::user()->role == 'superAdmin')
                <li><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
                @endif
              <li><a class="nav-link" href="{{ route('barang.index') }}">Barang</a></li>
              <li><a class="nav-link" href="{{ route('barangIn.index') }}">Barang Masuk</a></li>
              <li><a class="nav-link" href="{{ route('barangOut.index') }}">Barang Keluar</a></li>
              <li><a class="nav-link" href="{{ route('supplier.index') }}">Supplier</a></li>
              <li><a class="nav-link" href="{{ route('penjualan.index') }}">Penjualan</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class=" nav-link has-dropdown"><i class="fas fa-money-check-alt"></i><span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('export.barang') }}" target="_blank" class="nav-link">Barang</a></li>
                <li><a href="{{ route('export.supplier') }}" target="_blank" class="nav-link">Supplier</a></li>
                <li><a href="{{ route('export.barangIn') }}" target="_blank" class="nav-link">Barang Masuk</a></li>
                <li><a href="{{ route('export.barangOut') }}" target="_blank" class="nav-link">Barang Keluar</a></li>
              </ul>
            </li>
          </li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-user"></i> {{ Auth::user()->role }}
          </a>
        </div>
    </aside>
  </div>