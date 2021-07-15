<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-8">
		<div class="box box-solid">
			<div class="box-body">
				<form method="post" action="<?php echo base_url('admin/kategoriekle')?>">
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
						<label>Alt Ürün Kategorisi</label>
						<select class="form-control" name="subcategory">
							<?php foreach($subcategory as $category) { ?>
								<option><?=$category->name; ?></option>
							<?php } ?>	
						</select>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Ürün Fiyatı</label>
								<input type="number" class="form-control" name="price" />
							</div>
							<div class="col-xs-6">
								<label>İndirimli Fiyatı</label>
								<input type="number" class="form-control" name="discount">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ürün Tag</label>
						<input type="text" name="tag" placeholder="Ürün Adını Giriniz." required class="form-control"/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-flat btn-success">Ekle</button>
					</div> 
				</form>
			</div>
		</div>
	</div>


<?php	$this->load->view('admin/include/footer');?>