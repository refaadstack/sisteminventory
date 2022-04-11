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
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
              <li><a class="nav-link" href="{{ route('barang.index') }}">Produk</a></li>
              <li><a class="nav-link" href="{{ route('barangIn.index') }}">Barang Masuk</a></li>
              <li><a class="nav-link" href="{{ route('barangOut.index') }}">Barang Keluar</a></li>
              <li><a class="nav-link" href="{{ route('supplier.index') }}">Supplier</a></li>
              <li><a class="nav-link" href="{{ route('penjualan.index') }}">Penjualan</a></li>
            </ul>
          </li>
        </ul>
    </aside>
  </div>