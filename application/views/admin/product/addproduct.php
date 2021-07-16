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
						<label>Ürün adı</label>
						<input type="text" name="title" placeholder="Ürün Adını Giriniz." required class="form-control"/>
					</div>
					<div class="form-group">
						<label>Ürün Kategorisi</label>
						<select class="form-control" name="category">
							<option value="1">Erkek</option>
							<option value="2">Kadın</option>
							<option value="3">Çocuk</option>							
						</select>
					</div>
					<div class="form-group">
						<label>Ürün Alt Kategorisi</label>
						<select class="form-control" name="subcategory">
							<?php foreach($subcategory as $category) { ?>
								<option value="<?=$category->id;?>"><?=$category->name; ?></option>
							<?php } ?>	
						</select>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Ürün Fiyatı</label>
								<input type="text" class="form-control" name="price" />
							</div>
							<div class="col-xs-6">
								<label>İndirimli Fiyatı</label>
								<input type="text" class="form-control" name="discount">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ürün Tag</label>
						<input type="text" name="tag" placeholder="Ürün Tag Giriniz." required class="form-control"/>
					</div>
					<div class="form-group">
						<label>Ürün Açıklaması</label>
						<textarea class="form-control" rows="3" name="desc"></textarea>
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
				<h3 class="box-title">1.aşama</h3>
				<div class="box-body">
					<h2 align="center">Ürün Bilgileri</h2>
				</div>
			</div>
		</div>
	</div>

<?php	$this->load->view('admin/include/footer');?>