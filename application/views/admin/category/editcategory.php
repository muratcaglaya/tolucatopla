<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-8">
		<div class="box box-solid">
			<div class="box-body">
				<form method="post" action="<?php echo base_url('admin/kategoriduzenle/'.$category->id)?>">
					<div class="form-group">
						<label>Kategori Adı</label>
						<input type="text" name="category" value="<?=$category->name;?>" required class="form-control"/>
					</div>
					<div class="form-group">
						<label>Üst Kategori</label>
						<select name="topcategory" class="form-control">
							<option <?php if($category->topcategory==1) echo " selected "; ?>value="1">Erkek</option>
							<option <?php if($category->topcategory==2) echo " selected "; ?>value="2">Kadın</option>
							<option <?php if($category->topcategory==3) echo " selected "; ?>value="3">Çocuk</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-flat btn-success">Güncelle</button>
					</div> 
				</form>
			</div>
		</div>
	</div>


<?php	$this->load->view('admin/include/footer');?>