<!-- Main Sidebar Container -->
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Default halaman adalah 'dashboard'
?>


<!-- Font sidebar cari disini : https://www.w3schools.com/icons/fontawesome5_intro.asp-->


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/milk-io.png" alt="Milk-io Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Milk.io</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['nama'] . ' | ' . $_SESSION['level']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item <?php echo $page === 'dashboard' || $page === 'data-diri' || $page === 'data-pendidikan'|| $page === 'data-kti' || $page === 'data-work' || $page === 'data-pelatihan' ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?page=dashboard" class="nav-link <?php echo $page === 'dashboard' ? 'active' : ''; ?>">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                      
                        <li class="nav-item <?php echo $page === 'data-diri' || $page === 'data-pendidikan'|| $page === 'data-kti' || $page === 'data-work' || $page === 'data-pelatihan' ? 'menu-open' : ''; ?>">
                            <a href="#" class="nav-link <?php echo $page === 'data-diri' || $page === 'data-pendidikan'|| $page === 'data-kti' || $page === 'data-work' || $page === 'data-pelatihan' ? 'active' : ''; ?>">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>Update Biodata
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?page=data-diri" class="nav-link <?php echo $page === 'data-diri' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Diri</p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="index.php?page=data-pendidikan" class="nav-link <?php echo $page === 'data-pendidikan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pendidikan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=data-kti" class="nav-link <?php echo $page === 'data-kti' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Karya Tulis Ilmiah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=data-work" class="nav-link <?php echo $page === 'data-work' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengalaman Pekerjaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=data-pelatihan" class="nav-link <?php echo $page === 'data-pelatihan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pelatihan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Widgets -->
                <li class="nav-item">
                    <a href="index.php?page=widget" class="nav-link <?php echo $page === 'widget' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Widgets</p>
                    </a>
                </li>

                <!-- Aplikasi -->
                <li class="nav-item <?php echo $page === 'cv-generator' || $page === 'app-konversi' || $page === 'tabel-periodik'  || $page === 'indeks-sf'? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Aplikasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?page=cv-generator" class="nav-link <?php echo $page === 'cv-generator' ? 'active' : ''; ?>">
                                <i class="far fa-id-badge nav-icon"></i>
                                <p>CV Generator</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=app-konversi" class="nav-link <?php echo $page === 'app-konversi' ? 'active' : ''; ?>">
                                <i class="fas fa-calculator nav-icon"></i>
                                <p>Aplikasi Konversi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=tabel-periodik" class="nav-link <?php echo $page === 'tabel-periodik' ? 'active' : ''; ?>">
                                <i class="fas fa-flask nav-icon"></i>
                                <p>Tabel Peridoik</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=indeks-sf" class="nav-link <?php echo $page === 'indeks-sf' ? 'active' : ''; ?>">
                                <i class="fas fa-code nav-icon"></i>
                                <p>Indeks Slagging Fouling</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Sign Out -->
                <li class="nav-item">
                    <a href="../config/logout.php" class="nav-link text-danger">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


  