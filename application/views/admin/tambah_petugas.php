<div class="row mt-4 mb-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/petugas" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Tambah Petugas
			</div>
			<div class="card-body">
				<form action="<?php echo base_url() ?>admin/tambah_pengguna" method="post">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
					</div>
					<div class="form-group">
						<label>Hak access</label>
						<select name="role" class="form-control">
							<option disabled selected>-- Pilih --</option>
							<option value="1">Admin</option>
							<option value="2">Petugas</option>
						</select>
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('role'); ?></small>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('password'); ?></small>
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" name="konfirmasi_password" class="form-control">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('konfirmasi_password'); ?></small>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>
