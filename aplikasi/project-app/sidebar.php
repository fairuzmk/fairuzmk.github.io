<!-- Main Sidebar Container -->
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Default halaman adalah 'dashboard'

$biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0];

?>


<!-- Font sidebar cari disini : https://www.w3schools.com/icons/fontawesome5_intro.asp-->


<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="dist/img/MILKio-white.png" alt="Milk-io Logo" class="brand-image-xl" style="opacity:">
        <span class="brand-text">MILK.io</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional)
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo strtok($_SESSION['nama'], ' ') . ' | ' . $_SESSION['level']; ?></a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item mt-3 <?php echo $page === 'dashboard' || $page === 'cv-generator' || $page === 'data-diri' || $page === 'data-pendidikan'|| $page === 'data-kti' || $page === 'data-work' || $page === 'data-pelatihan' ? 'menu-open' : ''; ?>">
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
                        
                      
                        <li class="nav-item <?php echo $page === 'cv-generator' || $page === 'data-diri' || $page === 'data-pendidikan'|| $page === 'data-kti' || $page === 'data-work' || $page === 'data-pelatihan' ? 'menu-open' : ''; ?>">
                            <a href="#" class="nav-link <?php echo $page === 'data-diri' || $page === 'data-pendidikan'|| $page === 'data-kti' || $page === 'data-work' || $page === 'data-pelatihan' ? 'active' : ''; ?>">
                                <i class="far fa-address-card nav-icon"></i>
                                <p>CV Generator
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?page=cv-generator" class="nav-link <?php echo $page === 'cv-generator' ? 'active' : ''; ?>">
                                        <i class="far fa-id-badge nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=data-diri" class="nav-link <?php echo $page === 'data-diri' ? 'active' : ''; ?>">
                                        <i class="fas fa-edit nav-icon"></i>
                                        <p>Data Diri</p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="index.php?page=data-pendidikan" class="nav-link <?php echo $page === 'data-pendidikan' ? 'active' : ''; ?>">
                                        <i class="fas fa-edit nav-icon"></i>
                                        <p>Pendidikan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=data-kti" class="nav-link <?php echo $page === 'data-kti' ? 'active' : ''; ?>">
                                        <i class="fas fa-edit nav-icon"></i>
                                        <p>Karya Tulis Ilmiah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=data-work" class="nav-link <?php echo $page === 'data-work' ? 'active' : ''; ?>">
                                        <i class="fas fa-edit nav-icon"></i>
                                        <p>Pengalaman Pekerjaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=data-pelatihan" class="nav-link <?php echo $page === 'data-pelatihan' ? 'active' : ''; ?>">
                                        <i class="fas fa-edit nav-icon"></i>
                                        <p>Pelatihan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Widgets -->
                <li class="nav-item">
                    <a href="index.php?page=widget-app" class="nav-link <?php echo $page === 'widget-app' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Widgets</p>
                    </a>
                </li>

                <!-- Aplikasi -->
                <li class="nav-item <?php echo  $page === 'app-konversi' || $page === 'tabel-periodik'  || $page === 'indeks-sf'? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Sciencetific App
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
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

                <!-- Trading -->
                <li class="nav-item <?php echo $page === 'trading-dashboard' || $page === 'trading-diary' || $page === 'pips-calculator'  || $page === 'chart-tradingview'? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            Trading App
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?page=trading-dashboard" class="nav-link <?php echo $page === 'trading-dashboard' ? 'active' : ''; ?>">
                                <i class="fas fa-chart-pie nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=trading-diary" class="nav-link <?php echo $page === 'trading-diary' ? 'active' : ''; ?>">
                                <i class="	fas fa-tasks nav-icon"></i>
                                <p>Trading Diary</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=pips-calculator" class="nav-link <?php echo $page === 'pips-calculator' ? 'active' : ''; ?>">
                                <i class="fas fa-calculator nav-icon"></i>
                                <p>Pips Calculator</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=chart-tradingview" class="nav-link <?php echo $page === 'chart-tradingview' ? 'active' : ''; ?>">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <p>Tradingview</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Project IoT -->
                <li class="nav-item">
                    <a href="index.php?page=project-iot" class="nav-link <?php echo $page === 'project-iot' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>Project IoT</p>
                    </a>
                </li>

                <!-- Project AI -->
                <li class="nav-item">
                    <a href="index.php?page=project-ai" class="nav-link <?php echo $page === 'project-ai' ? 'active' : ''; ?>">
                        <i class="nav-icon 	fas fa-brain" style="color:green;"></i>
                        <p>Project AI</p>
                    </a>
                </li>

                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


  