<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-3">
		<div class="small-box bg-red">
			<div class="inner">
				<h1>Ürün Oluştur</h1>
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
							<th>Ürün adı</th>
							<th>Ürün Kategorisi</th>
							<th>Ürün Alt Kategorisi</th>
							<th>Ürün Fiyat</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($products as $product){ ?>
							<tr>
								<td><?=$product->title;?></td>
								<td><?php if($product->category==1){echo "Erkek";}elseif($product->category==2){echo "Kadın";}else{echo "Çocuk";}?></td>
								<td><?php echo Kategori::find($product->subcategory)->name ;?></td>
							<td><?php if($product->discount!=null){ echo "<del class='text-red'>".$product->price." TL</del>"." / ".$product->discount." TL"; }else {echo $product->price." TL";} ?></td>
								<td>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>


<?php	$this->load->view('admin/include/footer');?>