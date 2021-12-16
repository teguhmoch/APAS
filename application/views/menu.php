<?php if($this->session->userdata('hak')=='admin') { ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php
      $user = $this->session->userdata('username');
     $id_petugas = $this->db->get_where('petugas',array('username'=>$user))->row_array();
     ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $id_petugas['nama_petugas']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('index.php/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Lihat Data</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('karyawan'); ?>"><i class="fa fa-circle-o"></i>Karyawan</a></li>
            <li><a href="<?php echo site_url('surat_masuk'); ?>"><i class="fa fa-circle-o"></i>Surat Masuk</a></li>
            <li><a href="<?php echo site_url('surat_keluar'); ?>"><i class="fa fa-circle-o"></i>Surat Keluar</a></li>
            <li><a href="<?php echo site_url('jenis_surat'); ?>"><i class="fa fa-circle-o"></i>Jenis Surat</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-sticky-note-o"></i>
        <span>Disposisi</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span> </a>
            <ul class="treeview-menu">
            <li><a href="<?php echo site_url('disposisi/sudah_ditanggapi'); ?>"><i class="fa fa-circle-o"></i>Sudah Ditanggapi</a></li>
            <li><a href="<?php echo site_url('disposisi/belum_ditanggapi'); ?>"><i class="fa fa-circle-o"></i>Belum Ditanggapi</a></li>
              </ul>
            </li>
            <li class="treeview">
        <a href="#">
        <i class="fa fa-calendar-check-o"></i>
        <span>Agenda</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span> </a>
            <ul class="treeview-menu">
            <li><a href="<?php echo site_url('surat_masuk/agenda'); ?>"><i class="fa fa-circle-o"></i>Surat Masuk</a></li>
            <li><a href="<?php echo site_url('surat_keluar/agenda'); ?>"><i class="fa fa-circle-o"></i>Surat Keluar</a></li>
              </ul>
            </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php }else{?>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php
      $user = $this->session->userdata('username');
     $id_petugas = $this->db->get_where('petugas',array('username'=>$user))->row_array();
     ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $id_petugas['nama_petugas']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('index.php/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Lihat Data</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('karyawan/belum_aktif'); ?>"><i class="fa fa-circle-o"></i>Belum Aktif</a></li>
            <li><a href="<?php echo site_url('karyawan'); ?>"><i class="fa fa-circle-o"></i>Aktif</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-sticky-note-o"></i>
        <span>Disposisi</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span> </a>
            <ul class="treeview-menu">
            <li><a href="<?php echo site_url('disposisi/sudah_ditanggapi'); ?>"><i class="fa fa-circle-o"></i>Sudah Ditanggapi</a></li>
              </ul>
            </li>
            <li class="treeview">
        <a href="#">
        <i class="fa fa-calendar-check-o"></i>
        <span>Agenda</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span> </a>
            <ul class="treeview-menu">
            <li><a href="<?php echo site_url('surat_masuk/agenda'); ?>"><i class="fa fa-circle-o"></i>Surat Masuk</a></li>
            <li><a href="<?php echo site_url('surat_keluar/agenda'); ?>"><i class="fa fa-circle-o"></i>Surat Keluar</a></li>
              </ul>
            </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php } ?>