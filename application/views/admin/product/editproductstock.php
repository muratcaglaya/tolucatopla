<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>

<div class="row">
	<div class="col-md-8">
		<div class="box box-solid">
			<div class="box-body">
				<form method="post" action="<?php echo base_url('admin/urunstokguncelle/'.$this->uri->segment(3));?>">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<a href="<?php echo base_url('admin/urunduzenle/'.$stock->product);?>" class="btn btn-sm btn-default"><i class="fa fa-left"></i>Ürüne geri dön</a>								
							</div>						
							<div class="form-group">
								<label><?php echo Secenekler::find($type->options)->name;?></label>
								<select class="form-control" name="subcategory">
									<?php foreach($option1 as $option) { ?>
										<option value="<?=$option->id;?>" <?php if($option->id==$stock->suboption){echo "selected";} ?>><?=$option->name; ?></option>
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
											<option value="<?=$option->id;?>" <?php if($option->id==$stock->suboption2){echo "selected";} ?>><?=$option->name; ?></option>
										<?php } ?>	
									</select>
								</div>
							</div>
						<?php }?>											
					</div>
					<div class="form-group">
							<label>Stok Sayısı</label>
							<input type="number" name="stock" class="form-control" min="1" value="<?=$stock->stock;?>">
					</div>			
					<div class="form-group">
						<button name="step1" value="1" type="submit" class="btn btn-block btn-flat btn-success">Güncelle</button>
					</div> 
				</form>
			</div>
		</div>		
	</div>

<?php	$this->load->view('admin/include/footer');?>