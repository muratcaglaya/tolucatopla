<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-3">
		<div class="small-box bg-red">
			<div class="inner">
				<h4>Ürün Alt Seçenekleri Oluştur</h4>
			</div>
			<div class="icon">
				<i class="fa fa-plus"></i>
			</div>	
			<a href="<?php echo base_url('admin/altsecenekekle/'.$option->id);?>" class="small-box-footer">Tıkla <i class="fa fa-arrow-circle-right"></i></a>
		</div>		
	</div>
	<div class="col-md-9">
		<div class="box box-solid">
			<div class="box-body">
				<table id="category" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Alt Şeçenek Adı</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($suboptions as $suboption){ ?>
							<tr>
								<td><?=$suboption->name;?></td>
								<td>
									<a href="<?php echo base_url('admin/altsecenekduzenle/'.$suboption->id); ?>"  class="btn btn-xs btn-default"><i class="fa fa-edit"></i>Düzenle</a>
									<?php deletebutton('suboption',$suboption->id);?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>


<?php	$this->load->view('admin/include/footer');?>