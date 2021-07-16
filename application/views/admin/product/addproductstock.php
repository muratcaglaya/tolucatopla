<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-8">
		<div class="box box-solid">
			<div class="box-body">
				<form method="post" action="<?php echo base_url('admin/uruncontroller')?>">							
					<div class="form-group">
						<label>Ürün Seçeneklerini Belirleyiniz</label>
						<select class="form-control" name="subcategory">
							<?php foreach($options as $option) { ?>
								<option value="<?=$option->id;?>"><?=$option->name; ?></option>
							<?php } ?>	
						</select>
					</div>		
					<div class="form-group">
						<button name="step1" value="1" type="submit" class="btn btn-block btn-flat btn-success">Ekle</button>
					</div> 
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">3.aşama</h3>
				<div class="box-body">
					<h2 align="center">Ürün Seçenekleri Ve Stok</h2>
				</div>
			</div>
		</div>
	</div>

<?php	$this->load->view('admin/include/footer');?>