<?php
  @session_start();
  include "../config/config.php";

   $nama_user = @$_SESSION['nama_user'];
   $level = @$_SESSION['level'];

  if(@$_SESSION['status'] != "login") {
    header("location:../index.php");
  }
 ?>

     <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SI Klinik</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images/users.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $nama_user ?></a>
          <span class="brand-text font-weight-light" style="color: white;"><?= $level ?></span>
        </div>
      </div>

         <!-- /.sidebar-menu -->
         <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($level=='admin') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pegawai.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tindakan.php" class="nav-link">
                  <i class="far fa-heart nav-icon"></i>
                  <p>Tindakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="obat.php" class="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>Obat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pasien.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="rekmed.php" class="nav-link">
              <i class="nav-icon fas fa-syringe"></i>
              <p>
                Data Rekam Medis
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="laporan.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
    <?php } else { ?>
      <li class="nav-item">
            <a href="pasien.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Pasien
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="rekmed.php" class="nav-link">
              <i class="nav-icon fas fa-syringe"></i>
              <p>
                Data Rekam Medis
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="laporan.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
       <?php } ?>
    </ul>
    </div>

    <div class="sidebar-custom">
      <a href="../index.php" class="btn btn-link"><i class="fas fa-sign-out-alt"></i>
      <span class="brand-text font-weight-light" style="color: white;">Keluar</span>
      </a>
    </div>
    <!-- /.sidebar -->