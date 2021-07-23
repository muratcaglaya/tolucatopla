<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/back/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
        <li class="header">MENÜLER</li>

        <li class="<?php active('panel');?>"><a href="<?php echo base_url('admin/panel'); ?>"><i class="fa fa-home"></i> <span>Anasayfa</span></a></li>
        <li class="<?php active('urunler');?>"><a href="<?php echo base_url('admin/urunler'); ?>"><i class="fa fa-shopping-bag"></i> <span>Ürünler</span></a></li>
         <li class="<?php active('kategoriler');?>"><a href="<?php echo base_url('admin/kategoriler'); ?>"><i class="fa fa-list"></i> <span>Ürün Kategorileri</span></a></li>
         <li class="<?php active('urunsecenekleri');?>"><a href="<?php echo base_url('admin/urunsecenekleri'); ?>"><i class="fa fa-sort"></i> <span>Ürün Seçenekleri</span></a></li>
        <li class="<?php active('ayarlar');?>"><a href="<?php echo base_url('admin/ayarlar'); ?>"><i class="fa fa-cog"></i> <span>Ayarlar</span></a></li>
        <li><a href="<?php echo base_url('admin/cikis'); ?>"><i class="fa fa-sign-out"></i> <span>Oturum Kapat</span></a></li>
        <li class="header">FONKSİYONLAR</li>
        <li>
          <?php if($this->session->userdata('deletefunction')){ ?>
            <a href="<?php echo base_url('admin/deletefunction');?>" class="btn btn-flat btn-block btn-success"><i class="fa fa-check"></i>Silme Fonksiyonu Açık</a><?php }else{ ?>
             <a href="<?php echo base_url('admin/deletefunction');?>" class="btn btn-flat btn-block btn-danger"><i class="fa fa-exclamation"></i>Silme Fonksiyonu Kapalı</a>
          <?php }?>      
        </li>


      </ul>


    </section>
  </aside>


     <!-- ANA KISIM BAŞLANGIÇ --> 

    <div class="content-wrapper">
    <section class="content-header">
      <h1><?php if(isset($head)){echo $head;} ?></h1>
      

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
    <?php flashread(); ?>
    <?php flashUnSet(); ?>