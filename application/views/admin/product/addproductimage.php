<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-8">
		<div class="box box-solid">
			<div class="box-body">
				<form class="dropzone" action="<?php echo base_url('admin/urunresimekle/'.$this->uri->segment(3).'');?>" enctype="multipart/form-data" method="post"></form>
			</div>
			<div class="form-group">
				<a href="<?php echo base_url('admin/urunstokekle/'.$this->uri->segment(3).'');?>" class="btn btn-success btn-flat btn-block">Ürün Seçekleri ve Stok Bilgilerini Ekle</a>				
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">2.aşama</h3>
				<div class="box-body">
					<h2 align="center">Ürün Resimleri</h2>
				</div>
			</div>
		</div>
	</div>

<?php	$this->load->view('admin/include/footer');?>