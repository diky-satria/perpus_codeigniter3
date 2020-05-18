<h4 class="mt-4 mb-3">Ubah password</h4>
<div class="row">
	<div class="col-md-5">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo base_url() ?>mahasiswa/ubah_password" method="post">
					<div class="form-group">
						<label>Password anda</label>
						<input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('password'); ?></small>
					</div>
					<div class="form-group">
						<label>Password baru</label>
						<input type="password" name="password_baru" class="form-control" value="<?php echo set_value('password_baru'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('password_baru'); ?></small>
					</div>
					<div class="form-group">
						<label>Konfirmasi password baru</label>
						<input type="password" name="konfirmasi_password" class="form-control">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('konfirmasi_password'); ?></small>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
				</form>
			</div>
		</div>
	</div>
</div>
