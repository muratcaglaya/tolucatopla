<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-8">
		<div class="box box-solid">
			<div class="box-body">
				<form method="post" action="<?php echo base_url('admin/urunstokekle/'.$this->uri->segment(3));?>">
					<div class="row">
						<div class="col-xs-12">						
							<div class="form-group">
								<label><?php echo Secenekler::find($type->options)->name;?></label>
								<select class="form-control" name="subcategory">
									<?php foreach($option1 as $option) { ?>
										<option value="<?=$option->id;?>"><?=$option->name; ?></option>
									<?php } ?>	
								</select>
							</div>
						</div>
						<?php if($option2!=null) { ?>
							<div class="col-xs-12">						
								<div class="form-group">
									<label><?php echo Secenekler::find($type->options2)->name;?></label>
									<select class="form-control" name="subcategory2">
										<?php foreach($option2 as $option) { ?>
											<option value="<?=$option->id;?>"><?=$option->name; ?></option>
										<?php } ?>	
									</select>
								</div>
							</div>
						<?php }?>											
					</div>
					<div class="form-group">
							<label>Stok Sayısı</label>
							<input type="number" name="stock" class="form-control" min="1" value="1">
					</div>			
					<div class="form-group">
						<button name="step1" value="1" type="submit" class="btn btn-block btn-flat btn-success">Ekle</button>
					</div> 
				</form>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-body">
				<?php foreach($stocks as $stock) { ?>
					<li><?php 
						echo Secenekler::find($type->options)->name.' : '.AltSecenekler::find($stock->suboption)->name;
						if(Secenekler::find($type->options2))
						{
							echo ' - '.Secenekler::find($type->options2)->name.' : '.AltSecenekler::find($stock->suboption2)->name;
						}
							echo '- Stok : '.$stock->stock;

					?></li>
				<?php } ?>	
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">4.aşama</h3>
				<div class="box-body">
					<h2 align="center">Ürün Seçenekleri Ve Stok</h2>
				</div>
			</div>
		</div>
		<a href="<?php echo base_url('admin/uruncontroller/'.$this->uri->segment(3));?>" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Ürünü Kaydet</a>
	</div>

<?php	$this->load->view('admin/include/footer');?>