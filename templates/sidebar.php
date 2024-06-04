<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-user-shield fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Administrasi Security</div>
    </a>

    <br>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - MASTER DATA -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterData" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-wrench"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseMasterData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data :</h6>
                <a class="collapse-item" href="data_karyawan.php">Senior Staff</a>
                <a class="collapse-item" href="data_cctv.php">CCTV</a>
                <a class="collapse-item" href="data_keyroom.php">Kunci Ruangan</a>
                <a class="collapse-item" href="data_key_vehicle.php">Kunci Kendaraan</a>
                <a class="collapse-item" href="data_barang_inventaris_shift_3.php">Barang Inventaris Pos</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Jenis Register
    </div>

    <!-- Nav Item - AKTIVITAS KARYAWAN -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-users"></i>
            <span>Aktivitas Karyawan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administrasi :</h6>
                <a class="collapse-item" href="absensi.php">Absensi</a>
                <a class="collapse-item" href="#">Kejadian & Pelanggaran</a>
                <a class="collapse-item" href="#">Orientasi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - MUTASI -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-book"></i>
            <span>Mutasi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administrasi :</h6>
                <a class="collapse-item" href="cek_mutasi_shift_3.php">Mutasi Malam</a>
                <a class="collapse-item" href="#">Mutasi GS</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - PATROLI -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie" aria-expanded="true" aria-controls="collapseUtilitie">
            <i class="fa-solid fa-building-circle-check"></i>
            <span>Patroli & Facility</span>
        </a>
        <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administrasi :</h6>
                <a class="collapse-item" href="#">Keamanan</a>
                <a class="collapse-item" href="#">Fasilitas</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - STORE -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie1" aria-expanded="true" aria-controls="collapseUtilitie1">
            <i class="fa-solid fa-store"></i>
            <span>Store</span>
        </a>
        <div id="collapseUtilitie1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administrasi :</h6>
                <a class="collapse-item" href="#">Bongkar</a>
                <a class="collapse-item" href="#">Loading</a>
                <a class="collapse-item" href="#">Administrasi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - TAMU -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie2" aria-expanded="true" aria-controls="collapseUtilitie2">
            <i class="fa-solid fa-address-card"></i>
            <span>Pos Induk</span>
        </a>
        <div id="collapseUtilitie2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administrasi :</h6>
                <a class="collapse-item" href="#">Fasilitas</a>
                <a class="collapse-item" href="data_tamu.php">Tamu</a>
                <a class="collapse-item" href="data_register_kendaraan.php">Kendaraan</a>
                <a class="collapse-item" href="cek_cctv.php">CCTV Check</a>
                <a class="collapse-item" href="cek_keyroom.php">Kunci Ruangan Check</a>
                <a class="collapse-item" href="cek_key_vehicle.php">Kunci Kendaraan Check</a>
                <a class="collapse-item" href="cek_register_surat_dan_transit.php">Surat dan Transit Paket</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - TRANSFER -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie3" aria-expanded="true" aria-controls="collapseUtilitie3">
            <i class="fa-solid fa-truck"></i>
            <span>Transfer</span>
        </a>
        <div id="collapseUtilitie3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administrasi :</h6>
                <a class="collapse-item" href="#">Gatepass</a>
                <a class="collapse-item" href="#">Kartu Shipment</a>
                <a class="collapse-item" href="#">Transfer Barang</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->