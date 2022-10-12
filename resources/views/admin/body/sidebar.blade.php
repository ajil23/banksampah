 <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <img src="{{asset('backend/img/logo2.png')}}" style="height: 40px; width: 40px;" alt="">
         </div>
         <div class="sidebar-brand-text mx-2">Bank Sampah</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Pengguna
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa-solid fa-users"></i>
             <span>Penguna</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Jenis Pengguna:</h6>
                 <a class="collapse-item" href="{{route('dawis.view')}}">Dawis</a>
                 <a class="collapse-item" href="{{route('nasabah.view')}}">Nasabah</a>
                 <a class="collapse-item" href="{{route('petugas.view')}}">Petugas</a>
             </div>
         </div>
     </li>


     <!-- Heading -->

     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Transaksi
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
             <i class='bx bxs-wallet'></i>
             <span>Transaksi</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Transaksi : </h6>
                 <a class="collapse-item" href="{{route('tagihan.view')}}">Tagihan</a>
                 <a class="collapse-item" href="{{route('detagihan.view')}}">Detail Tagihan</a>
             </div>
         </div>
     </li>

     <!-- Divider -->

     
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Tabungan
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{route('tabungan.view')}}" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fa-solid fa-piggy-bank"></i>
             <span>Tabungan</span>
         </a>
     </li>
     
     <!-- Nav Item - Utilities Collapse Menu -->
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
        Sampah
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{route('sampah.view')}}" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fa-solid fa-trash"></i>
             <span>Daftar Sampah</span>
         </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>