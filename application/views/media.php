<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include "Library/head_library.php";
      include "Library/generalValue.php"; 
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- NAVIGATION BAR (NAVBAR) -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- LEFT NAVBAR LINKS -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url()?>media?modul=home" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- RIGHT NAVBAR LINKS -->
        <ul class="navbar-nav ml-auto">
          <!-- MESSAGE DROPDOWN MENU -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="<?php echo base_url();?>assets/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="<?php echo base_url();?>assets/AdminLTE/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li> -->

          <!-- NOTIFICATION DROPDOWN MENU -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li> -->

          <!-- CUSTOMIZE -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li> -->

          <!-- LOGOUT -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Login/logout" role="button">
            <i class='fas fa-sign-out-alt'></i>
            </a>
          </li>
        </ul>

      </nav>

      <!-- MAIN SIDEBAR CONTAINER -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- BRAND LOGO & USERNAME -->
        <a href="<?php echo base_url()?>media?modul=home" class="brand-link">
          <img src="<?php echo base_url();?>assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">
            <?php echo $this->session->userdata('loggedIn')['userName']?>
          </span>
        </a>

        <!-- SIDEBAR -->
        <div class="sidebar">
          <!-- SIDEBAR USER PANEL -->
          <!--
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?php echo base_url();?>assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $this->session->userdata('loggedIn')['userName']?></a>
            </div>
          </div> -->

          <!-- SidebarSearch Form -->
          <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div> -->

          <!-- SIDEBAR MENU -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                  <a href="<?php echo base_url()?>media?modul=home" class="nav-link">
                    <i class="fas fa-home nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                
                <li class="nav-header">MAIN MENU</li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Master
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>Karyawan?modul=masterKaryawan&act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Karyawan</p>
                      </a>
                    </li>
                    <!--
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>biaya?modul=masterBiaya&act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Biaya</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>biayadetail?modul=masterBiayaDetail&act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Biaya Detail</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>mahasiswa?modul=mahasiswa" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mahasiswa</p>
                      </a>
                    </li>-->
                  </ul>
                </li>
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Registrasi
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>registrasi/FormulirRegistrasi/PAUD?act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>PAUD</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>registrasi/FormulirRegistrasi/SDIQ?act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>SDIQ</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>registrasi/FormulirRegistrasi/SMP?act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>SMP</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>registrasi/FormulirRegistrasi/SMA?act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>SMA</p>
                      </a>
                    </li>
                  </ul>
                </li> -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Finance
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url()?>Payroll?modul=financePayroll&act=Tambah" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Payroll</p>
                      </a>
                    </li>
                  </ul>
                </li>
            </ul>
          </nav>

        </div>
      </aside>

      <!-- PAGE CONTENT -->
      <div class="content-wrapper">
        <?php include "content.php";?>
      </div>

      <!-- FOOTER -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2020 <a href="http://arrisalahlubuklinggau.com/">Arrisalah Lubuklinggau</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0-pre
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      
    </div>
    <!-- ./wrapper -->
    <?php
      include "Library/script_library.php";
      include "Library/script_custom.php";
    ?>

  </body>
</html>
