<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-3">
		<div class="small-box bg-red">
			<div class="inner">
				<h1>Kategori Oluştur</h1>
			</div>
			<div class="icon">
				<i class="fa fa-plus"></i>
			</div>	
			<a href="<?php echo base_url('admin/kategoriekle');?>" class="small-box-footer">Tıkla <i class="fa fa-arrow-circle-right"></i></a>
		</div>		
	</div>
	<div class="col-md-9">
		<div class="box box-solid">
			<div class="box-body">
				<table id="category" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Kategori Adı</th>
							<th>Üst Kategori</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($categories as $category){ ?>
							<tr>
								<td><?=$category->name;?></td>
								<td><?php if($category->topcategory==1){echo "Erkek";}elseif($category->topcategory==2){echo "Kadın";}else{echo "Çocuk";}?></td>
								<td>
									<a href="<?php echo base_url('admin/kategoriduzenle/'.$category->id);?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>Düzenle</a>
									<a class="btn btn-xs btn-danger"><i class="fa fa-edit"></i>Sil</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>


<?php	$this->load->view('admin/include/footer');?>