<?php
$activeUrl = $_GET['url'] ?? ''; // Get the current URL parameter or default to 'home'
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Direktori UMKM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class -->
                <li class="nav-header">Content</li>
                <li class="nav-item">
                    <a href="./?url=umkm" class="nav-link <?php echo $activeUrl === 'umkm' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-clipboard-check"></i> <!-- Updated Icon for Umkm -->
                        <p>UMKM</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=pembina" class="nav-link <?php echo $activeUrl === 'pembina' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Pembina</p>
                    </a>
                </li>


                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="./?url=provinsi" class="nav-link <?php echo $activeUrl === 'provinsi' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-map"></i>
                        <p>Provinsi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=kabkota" class="nav-link <?php echo $activeUrl === 'kabkota' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Kabupaten / Kota</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=kategoriumkm" class="nav-link <?php echo $activeUrl === 'kategoriumkm' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tags"></i> <!-- Icon for Kategori UMKM -->
                        <p>Kategori UMKM</p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>