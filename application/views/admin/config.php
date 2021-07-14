<?php
	$this->load->view('admin/include/header');
	$this->load->view('admin/include/leftmenu');
?>


<div class="row">
	<div class="col-md-6">
		<div class="box box-solid">
			<div class="box-body">
				<form autocomplete="off" method="post" action="<?php echo base_url('admin/ayarlarpost');?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Site Adı</label>
						<input type="text" name="title" required class="form-control" value="<?=$config->title ?>" />
						<input type="hidden" name="id" required class="form-control" value="<?=$config->id ?>" />						
					</div>
					<div class="form-group">
						<label>Site Mail adresi</label>
						<input type="email" name="mail" required class="form-control" value="<?=$config->mail ?>" />						
					</div>
					<div class="form-group">
						<label>Adres Bilgisi</label>
						<textarea rows="3" name="info" class="form-control" ><?=$config->info ?></textarea>					
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Site Logo</label>
								<input type="file" name="logo" class="form-control">
							</div>
							<div class="col-xs-6">
								<label>Site İcon</label>
								<input type="file" name="icon" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>Facebook Adresi</label>
								<input type="text" name="facebook" class="form-control" value="<?=$config->facebook ?>">
							</div>
							<div class="col-xs-6">
								<label>Twitter Adresi</label>
								<input type="text" name="twitter" class="form-control" value="<?=$config->twitter ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label>İnstagram Adresi</label>
								<input type="text" name="instagram" class="form-control" value="<?=$config->instagram ?>">
							</div>
							<div class="col-xs-6">
								<label>Youtube Adresi</label>
								<input type="text" name="youtube" class="form-control" value="<?=$config->youtube ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-success btn-flat btn-block">Kaydet</button>
					</div>							
				</form>				
			</div>
		</div>
	</div>


<?php
	$this->load->view('admin/include/footer');
?>