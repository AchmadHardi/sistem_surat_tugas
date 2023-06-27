<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Perjalanan Dinas</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   
    <li class="nav-item">
        <a class="nav-link" href="{{ route('employee') }}">
            <i class="fas fa-users"></i>
            <span>Manajemen Karyawan</span>
        </a>
    </li>

    <li class="nav-item">
         <a class="nav-link" href="{{ route('pembelian') }}">
            <i class="fas fa-ticket-alt"></i>
            <span>Pembelian Tiket</span>
        </a>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="{{ route('tiket') }}">
        <i class="fas fa-ticket-alt"></i>
        <span>Manajemen Tiket</span>
    </a>

    </li>
      
     @if (Auth::user()->isAdmin())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('surat_tugas') }}">
            <i class="fas fa-newspaper"></i>
            <span>Surat Tugas</span>
        </a>
    </li>
    @endif
    
</ul>
