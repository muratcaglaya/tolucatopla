    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/upload/');?>config/logo1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Uygulama Alanı</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="color: white;">MENÜLER</li>
        <li class="<?php active('panel') ?>">
          <a href="<?php echo base_url('admin/panel');?>"><i class="fa fa-home"></i> <span>Anasayfa</span></a>
        </li>
        <li class="<?php active('config') ?>">
          <a href="<?php echo base_url('admin/config');?>"><i class="fa fa-cog"></i> <span>Site Ayarları</span></a>
        </li>
        <li class="<?php active('logout') ?>">
          <a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out"></i> <span>Çıkış</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

   <!-- Anamenü başlangıç -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->