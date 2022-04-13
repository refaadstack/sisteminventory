<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">SimIn</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SM</a>
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
              <li><a class="nav-link" href="{{ route('barang.index') }}">Produk</a></li>
              <li><a class="nav-link" href="{{ route('barangIn.index') }}">Barang Masuk</a></li>
              <li><a class="nav-link" href="{{ route('barangOut.index') }}">Barang Keluar</a></li>
              <li><a class="nav-link" href="{{ route('supplier.index') }}">Supplier</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class=" nav-link has-dropdown"><i class="fas fa-money-check-alt"></i><span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a href="" class="nav-link">Produk</a></li>
                <li><a href="" class="nav-link">Supplier</a></li>
                <li><a href="" class="nav-link">Barang Masuk</a></li>
                <li><a href="" class="nav-link">Barang Keluar</a></li>
              </ul>
            </li>
          </li>
        </ul>
    </aside>
  </div>