<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">LAUNDRY</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        
</span>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        
        
        <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="upload/profil/<?php echo $_SESSION['FOTO']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['USERNAME']; ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
                <a class="dropdown-item d-flex align-items-center" href="profil.php">
                <i class="bi bi-gear"></i>
                <span>Setting Akun</span>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>


            <li>
                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
                </a>
            </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
<?php 
    // Get current page name
    $current_page = basename($_SERVER['PHP_SELF']); 
?>
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed text-center" href="profil.php">
                <span><img src="upload/profil/<?php echo $_SESSION['FOTO']; ?>" style="width:50%;border-radius:50%;margin:auto;"></span>
            </a>
        </li><!-- End Profile Nav -->
        <li class="nav-item">
            <a class="nav-link <?php echo $current_page == 'index.php' ? '' : 'collapsed'; ?>" href="index.php">
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link <?php echo $current_page == 'layanan.php' ? '' : 'collapsed'; ?>" href="layanan.php">
                <span>Data Layanan</span>
            </a>
        </li><!-- End Data Menu Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo $current_page == 'transaksi.php' ? '' : 'collapsed'; ?>" href="transaksi.php">
                <span>Data transaksi</span>
            </a>
        </li><!-- End Data User Nav -->
        
        <?php if($_SESSION['ROLE']=='Admin'){?>
        <li class="nav-item">
            
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo in_array($current_page, ['barang.php', 'pelanggan.php', 'user.php']) ? '' : 'collapsed'; ?>" data-bs-target="#import-nav" data-bs-toggle="collapse" href="#">
                <span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="import-nav" class="nav-content collapse <?php echo in_array($current_page, ['barang.php', 'pelanggan.php', 'user.php']) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link <?php echo $current_page == 'barang.php' ? '' : 'collapsed'; ?>" href="barang.php">
                        <span>Data Stok Barang</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?php echo $current_page == 'pelanggan.php' ? '' : 'collapsed'; ?>" href="pelanggan.php">
                        <span>Data Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?php echo $current_page == 'user.php' ? '' : 'collapsed'; ?>" href="user.php">
                        <span>Data User</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <?php }?>
    </ul>
    
</aside><!-- End Sidebar -->
