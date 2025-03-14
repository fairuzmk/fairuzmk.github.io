<!-- Navbar -->
<?php $biodata = query("SELECT * from tb_personal WHERE nama = '$nama' ")[0]; ?>
<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?page=dashboard" class="nav-link">Home</a>
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

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="nav-profile" data-toggle="dropdown" href="#">
            <div class="image">
                <img src="img/<?= $biodata["foto"]; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="sapaan">
                <a href="#" class="d-block"><strong>Hai</strong>,</a>
            </div>
            <span><?php echo strtok($_SESSION['nama'], ' '); ?></span>
        </div>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="user-box">
          
            <div class="avatar-lg"><img src="img/<?= $biodata["foto"]; ?>" alt="image profile" class="avatar-img rounded"></div>
            <div class="u-text">
              <h4><?php echo strtok($_SESSION['nama'], ' '). ' | ' . $_SESSION['level']; ?></h4>
              <p class="text-muted"><?= $_SESSION['email'] ?></p><a href="index.php?page=cv-generator" class="btn btn-xs btn-primary btn-sm">View Profile</a>
            </div>
									
           </div>
          <div class="dropdown-divider"></div>
          <a href="index.php?page=data-diri" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>Update Biodata
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i>Ubah Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="../config/logout.php" class="dropdown-item text-danger">
            <i class="fas fa-sign-out-alt nav-icon mr-2"></i>Sign Out     
          </a>
          
        </div>
      </li>
      
      
    </ul>
  </nav>
  <!-- /.navbar -->